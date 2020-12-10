<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use Dnetix\Redirection\Exceptions\PlacetoPayException;
use Src\Ecommerce\Transaction\Application\UseCases\CreateEcommerceTransactionUseCase;
use Src\Ecommerce\Transaction\Application\UseCases\PayEcommerceTransactionUseCase;
use Src\Ecommerce\Transaction\Application\UseCases\UpdateEcommerceTransactionUseCase;
use Src\Ecommerce\Transaction\Infrastructure\EcommerceEloquentTransactionRepository;

class TransactionController extends Controller
{

    /**
     * @param  TransactionRequest                      $request
     * @param  EcommerceEloquentTransactionRepository  $repository
     * @throws PlacetoPayException
     */
    public function store(TransactionRequest $request, EcommerceEloquentTransactionRepository $repository)
    {
        $transactionUseCase = new CreateEcommerceTransactionUseCase($repository);
        $responseTransaction = $transactionUseCase->execute(
            $request->get('order_id'),
            $request->get('subtotal'),
            $request->get('transaction_cost'),
            $request->get('total'),
            now()->addHour(),
            $request->ip(),
            'pending'
        );

        $transaction = $responseTransaction->toArray();

        $payUseCase = new PayEcommerceTransactionUseCase();
        $responsePay = $payUseCase->execute(
            config('gateway.place_to_pay.login'),
            config('gateway.place_to_pay.tran_key'),
            config('gateway.place_to_pay.url'),
            config('gateway.place_to_pay.rest.timeout'),
            config('gateway.place_to_pay.rest.connect_timeout'),
            $request->get('reference'),
            'payment of my product',
            $transaction['total'],
            $request->get('currency'),
            $transaction['expiration_date'],
            config('gateway.place_to_pay.return_url')
        );

        if ($responsePay->isSuccessful()){
            $updateTransactionUseCase = new UpdateEcommerceTransactionUseCase($repository);
            $updateTransactionUseCase->execute(
                $transaction['id'],
                $transaction['order_id'],
                $transaction['subtotal'],
                $transaction['transaction_cost'],
                $transaction['total'],
                $transaction['expiration_date'],
                $transaction['ip_address'],
                $transaction['status'],
                $responsePay->requestId(),
                $responsePay->processUrl()
            );

            return redirect($responsePay->processUrl());
        }

        dd($responsePay->status()->message());
        //abort(500, $responsePay->status()->message());
    }
}
