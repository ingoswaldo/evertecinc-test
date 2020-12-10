<?php

namespace App\Http\Controllers;

use App\Helpers\StatsHelper;
use App\Http\Requests\ShowCartRequest;

class CartController extends Controller
{

    public function show(ShowCartRequest $request)
    {
        $data[ 'productName' ] = ucfirst($request->get('product_name'));
        $data[ 'productPrice' ] = number_format($request->get('product_price'), 2);
        $data[ 'productQuantity' ] = $request->get('product_quantity');
        $data[ 'total' ] = number_format(StatsHelper::getTotalPrice($data[ 'productPrice' ], $data[ 'productQuantity' ]));
        $data[ 'customer' ] = $request->user();

        return view('cart.show', $data);
    }
}
