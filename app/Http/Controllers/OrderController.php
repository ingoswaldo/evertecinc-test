<?php

namespace App\Http\Controllers;

use App\Helpers\StatsHelper;
use App\Http\Requests\OrderRequest;
use Src\Ecommerce\Order\Application\UseCases\CreateEcommerceOrderUseCase;
use Src\Ecommerce\Order\Infrastructure\EcommerceEloquentOrderRepository;

class OrderController extends Controller
{

    public function store(OrderRequest $request, EcommerceEloquentOrderRepository $repository)
    {
        $subtotal = StatsHelper::getTotalPrice($request->get('product_price'), $request->get('product_quantity'));
        $useCase = new CreateEcommerceOrderUseCase($repository);
        $response = $useCase->execute(
            $request->get('name'),
            $request->get('email'),
            $request->get('mobile'),
            'CREATED',
            $subtotal,
            $request->get('product_currency'));

        $data = $response->toArray();

        return view('orders.checkout', $data);
    }
}
