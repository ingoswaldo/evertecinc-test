<?php

namespace App\Http\Controllers;

use App\Helpers\StatsHelper;
use App\Http\Requests\ShowCartRequest;
use Illuminate\Support\Collection;
use Src\Ecommerce\State\Application\UseCases\SearchEcommerceStateUseCase;
use Src\Ecommerce\State\Infrastructure\EcommerceEloquentStateRepository;

class CartController extends Controller
{

    public function show(ShowCartRequest $request, EcommerceEloquentStateRepository $repository)
    {
        $data[ 'productName' ] = ucfirst($request->get('product_name'));
        $data[ 'productPrice' ] = $request->get('product_price');
        $data[ 'productQuantity' ] = $request->get('product_quantity');
        $data[ 'productCurrency' ] = $request->get('product_currency');
        $data[ 'total' ] = StatsHelper::getTotalPrice($data[ 'productPrice' ], $data[ 'productQuantity' ]);
        $data[ 'customer' ] = $request->user();
        $data[ 'states' ] = $this->getStatesSelectOptions($repository);
        $data[ 'user' ] = $request->user();

        return view('cart.show', $data);
    }

    private function getStatesSelectOptions(EcommerceEloquentStateRepository $repository): Collection
    {
        $useCase = new SearchEcommerceStateUseCase($repository);
        $response = $useCase->execute('country_id', '47');

        return collect($response->getStates())
            ->map(function ($item) {
                return $item->toArray();
            })
            ->pluck('name', 'id')
            ->prepend('Seleccionar...', '');
    }
}
