<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use Carbon\Carbon;
use Dnetix\Redirection\Exceptions\PlacetoPayException;
use Dnetix\Redirection\Message\RedirectResponse;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Routing\Redirector;
use Src\Ecommerce\Transaction\Application\UseCases\CreateEcommerceTransactionUseCase;
use Src\Ecommerce\Transaction\Application\UseCases\PayEcommerceTransactionUseCase;
use Src\Ecommerce\Transaction\Application\UseCases\UpdateEcommerceTransactionUseCase;
use Src\Ecommerce\Transaction\Infrastructure\EcommerceEloquentTransactionRepository;
use Src\Shared\Application\Response;

class TransactionController extends Controller
{

    /**
     * @param  TransactionRequest                      $request
     * @param  EcommerceEloquentTransactionRepository  $repository
     * @return Application|\Illuminate\Http\RedirectResponse|Redirector|void
     * @throws PlacetoPayException
     */
    public function store(TransactionRequest $request, EcommerceEloquentTransactionRepository $repository)
    {
        $responseTransaction = $this->createTransaction($request, $repository);
        $transaction = $responseTransaction->toArray();
        $responsePay = $this->createPayRequest($request, $transaction);

        if ($responsePay->isSuccessful()) {
            $this->updateTransaction($responsePay, $transaction, $repository);

            return redirect($responsePay->processUrl());
        }

        abort($responsePay->status()->reason(), $responsePay->status()->message());
    }

    /**
     * @param  TransactionRequest                      $request
     * @param  EcommerceEloquentTransactionRepository  $repository
     * @return Response
     */
    private function createTransaction(TransactionRequest $request,
        EcommerceEloquentTransactionRepository $repository
    ): Response {
        $transactionUseCase = new CreateEcommerceTransactionUseCase($repository);

        return $transactionUseCase->execute(
            $request->get('order_id'),
            $request->get('subtotal'),
            $request->get('transaction_cost'),
            $request->get('total'),
            now()->addHour(),
            $request->ip(),
            'pending'
        );
    }

    /**
     * @param  TransactionRequest  $request
     * @param  array               $transaction
     * @return RedirectResponse
     * @throws PlacetoPayException
     */
    private function createPayRequest(TransactionRequest $request, array $transaction): RedirectResponse
    {
        $returnUrl = route('payments.response', $transaction[ 'order_id' ]);
        $payUseCase = new PayEcommerceTransactionUseCase();
        $expirationDate = Carbon::create($transaction['expiration_date'])->format('c');

        return $payUseCase->execute(
            $request->get('reference'),
            'payment of my product',
            $transaction[ 'total' ],
            $request->get('currency'),
            $expirationDate,
            $returnUrl
        );
    }

    /**
     * @param  RedirectResponse                        $responsePay
     * @param  array                                   $transaction
     * @param  EcommerceEloquentTransactionRepository  $repository
     * @return Response
     */
    private function updateTransaction(RedirectResponse $responsePay,
        array $transaction,
        EcommerceEloquentTransactionRepository $repository
    ): Response {
        $updateTransactionUseCase = new UpdateEcommerceTransactionUseCase($repository);

        return $updateTransactionUseCase->execute(
            $transaction[ 'id' ],
            $transaction[ 'order_id' ],
            $transaction[ 'subtotal' ],
            $transaction[ 'transaction_cost' ],
            $transaction[ 'total' ],
            $transaction[ 'expiration_date' ],
            $transaction[ 'ip_address' ],
            $transaction[ 'status' ],
            $responsePay->requestId(),
            $responsePay->processUrl()
        );
    }
}
