<?php

namespace App\Http\Controllers;

use App\Helpers\StatsHelper;
use App\Http\Requests\OrderRequest;
use Src\Ecommerce\Customer\Application\UseCases\CreateEcommerceCustomerUseCase;
use Src\Ecommerce\Customer\Application\UseCases\FindByEmailEcommerceCustomerUseCase;
use Src\Ecommerce\Customer\Domain\Exceptions\EcommerceCustomerNotExists;
use Src\Ecommerce\Customer\Infrastructure\EcommerceEloquentCustomerRepository;
use Src\Ecommerce\Order\Application\UseCases\CreateEcommerceOrderUseCase;
use Src\Ecommerce\Order\Infrastructure\EcommerceEloquentOrderRepository;
use Src\Shared\Application\Response;

class OrderController extends Controller
{

    public function store(OrderRequest $request,
        EcommerceEloquentCustomerRepository $customerRepository,
        EcommerceEloquentOrderRepository $orderRepository
    ) {
        if ($this->canCreateUser($request, $customerRepository)) {
            $this->createCustomer($request, $customerRepository);
        }

        $subtotal = StatsHelper::getTotalPrice($request->get('product_price'), $request->get('product_quantity'));
        $data = $this->createOrder($request, $orderRepository, $subtotal)
            ->toArray();

        return view('orders.checkout', $data);
    }

    /**
     * @param  OrderRequest                         $request
     * @param  EcommerceEloquentCustomerRepository  $repository
     * @return bool
     */
    private function canCreateUser(OrderRequest $request, EcommerceEloquentCustomerRepository $repository): bool
    {
        $useCase = new FindByEmailEcommerceCustomerUseCase($repository);

        try {
            $useCase->execute('email', $request->get('email'));
        } catch (EcommerceCustomerNotExists $exception){
            return true;
        }

        return false;
    }

    /**
     * @param  OrderRequest                         $request
     * @param  EcommerceEloquentCustomerRepository  $repository
     * @return Response
     */
    private function createCustomer(OrderRequest $request, EcommerceEloquentCustomerRepository $repository): Response
    {
        $useCase = new CreateEcommerceCustomerUseCase($repository);

        return $useCase->execute(
            $request->get('name'),
            $request->get('email'),
            bcrypt($request->get('password')),
            $request->get('mobile'),
            $request->get('state_id'),
            $request->get('city'),
            $request->get('address'),
            $request->get('postal_code')
        );
    }

    /**
     * @param  OrderRequest                      $request
     * @param  EcommerceEloquentOrderRepository  $repository
     * @param  float                             $subtotal
     * @return Response
     */
    private function createOrder(OrderRequest $request,
        EcommerceEloquentOrderRepository $repository,
        float $subtotal
    ): Response {
        $useCase = new CreateEcommerceOrderUseCase($repository);

        return $useCase->execute(
            $request->get('name'),
            $request->get('email'),
            $request->get('mobile'),
            'CREATED',
            $subtotal,
            $request->get('product_currency'));
    }
}
