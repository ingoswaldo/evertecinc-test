<?php

namespace App\Http\Controllers;

use App\Helpers\StatsHelper;
use App\Http\Requests\ShowCartRequest;

class CartController extends Controller
{

    public function show(ShowCartRequest $request)
    {
        $data[ 'productName' ] = ucfirst($request->get('product_name'));
        $data[ 'productPrice' ] = $request->get('product_price');
        $data[ 'productQuantity' ] = $request->get('product_quantity');
        $data[ 'productCurrency' ] = $request->get('product_currency');
        $data[ 'total' ] = StatsHelper::getTotalPrice($data[ 'productPrice' ], $data[ 'productQuantity' ]);
        $data[ 'customer' ] = $request->user();

        return view('cart.show', $data);
    }
}
