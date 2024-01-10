<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index()
    {
        //How to pass data to view ?

        //C1: using compact(multiple parameters)
        $title = 'Laravel Course from Dinomanh';
        $x = 1;
        $y = 2;
        // return view('products.index', compact('title', 'x', 'y'));
        //C2: using with(key,value)(one parameter)
        // return view('products.index')->with('title', $title);
        //C3: pass associative array 
        $profile = [
            'name' => 'Dinomanh',
            'age' => 24,
            'address' => 'HN',
        ];
        // return view('products.index', compact('profile'));
        //C4: Send directly to view
        return view('products.index', ['profile' => $profile]);
    }


    public function detail($productName)
    {
        $phone = [
            'iphone15' => 'iphone15',
            'samsung' => 'samsung',
        ];

        return view('products.index', [
            'product' => $phone[$productName] ?? 'unknown product'
        ]);
    }
}
