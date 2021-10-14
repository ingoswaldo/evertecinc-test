<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Src\Ecommerce\Order\Application\UseCases\UpdateEcommerceOrderUseCase;
use Src\Ecommerce\Order\Infrastructure\EcommerceEloquentOrderRepository;
use Src\Ecommerce\Transaction\Application\UseCases\FindPaymentEcommerceTransactionUseCase;
use Src\Shared\Application\Response;

class PaymentController extends Controller
{

    public function response(Order $order, EcommerceEloquentOrderRepository $repository)
    {
        $order->load('transaction');
        $data['order'] = $order;

        if ($this->hasRequestId($order->transaction->request_id)){

            $findPaymentUseCase = new FindPaymentEcommerceTransactionUseCase();
            $response = $findPaymentUseCase->execute((int) $order->transaction->request_id);

            if ($response->isSuccessful()){

                if ($response->isApproved()){
                    $this->changeStatusOrderTo('PAYED', $order, $repository);
                }

                if ($response->status()->isRejected()){
                    $this->changeStatusOrderTo('REJECTED', $order, $repository);
                }
            }

            $data['order'] = $order->refresh();
        }

        return view('transactions.response', $data);
    }

    public function declined(Order $order, EcommerceEloquentOrderRepository $repository)
    {
        $order->load('transaction');

        $this->changeStatusOrderTo('REJECTED', $order, $repository);

        $data['order'] = $order->refresh();

        return view('transactions.declined', $data);
    }

    /**
     * @param  string|null  $requestId
     * @return bool
     */
    private function hasRequestId(?string $requestId): bool
    {
        return isset($requestId);
    }

    /**
     * @param  string                            $status
     * @param  Order                             $order
     * @param  EcommerceEloquentOrderRepository  $repository
     * @return Response
     */
    private function changeStatusOrderTo(string $status, Order $order, EcommerceEloquentOrderRepository $repository): Response
    {
        $updateOrderUseCase = new UpdateEcommerceOrderUseCase($repository);

        return $updateOrderUseCase->execute(
            $order->id,
            $order->customer_name,
            $order->customer_email,
            $order->customer_mobile,
            $status,
            $order->total,
            $order->currency,
            $order->reference,
        );
    }
}
