<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return 'Danh sach san pham';
    }

    /**
     * Show the form for creating a new product. (GET)
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created product in storage. (POST)
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified product. (GET)
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified product. (GET)
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified product in storage. (PUT,PATCH)
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified product from storage. (DELETE)
     */
    public function destroy(string $id)
    {
        //
    }
}