<?php

namespace App\Http\Controllers;

use App\Helpers\StatusHelper;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Src\Ecommerce\Order\Application\UseCases\SearchAllEcommerceOrderUseCase;
use Src\Ecommerce\Order\Application\UseCases\SearchEcommerceOrderUseCase;
use Src\Ecommerce\Order\Infrastructure\EcommerceEloquentOrderRepository;

class DashboardController extends Controller
{

    /**
     * Handle the incoming request.
     *
     * @param  Request                           $request
     * @param  EcommerceEloquentOrderRepository  $repository
     * @return Application|Factory|View|Response
     */
    public function __invoke(Request $request, EcommerceEloquentOrderRepository $repository)
    {
        $data['orders'] = $this->getOrders($request, $repository);

        return view('dashboard', $data);
    }

    /**
     * @param  Request                           $request
     * @param  EcommerceEloquentOrderRepository  $repository
     * @return Collection
     */
    private function getOrders(Request $request, EcommerceEloquentOrderRepository $repository): Collection
    {
        $user = $request->user();

        if ($user->isAdmin()){
            $useCase = new SearchAllEcommerceOrderUseCase($repository);
            $response = $useCase->execute();
        } else {
            $useCase = new SearchEcommerceOrderUseCase($repository);
            $response = $useCase->execute('customer_email', $user->email);
        }

        return $this->mapOrderResponseToArray($response->getOrders());
    }

    /**
     * @param  array  $orderResponse
     * @return Collection
     */
    private function mapOrderResponseToArray(array $orderResponse): Collection
    {
        return collect($orderResponse)
            ->map(function ($item) {
                $array = $item->toArray();
                $array['status'] = StatusHelper::translate($array['status']);

                return $array;
            });
    }
}
