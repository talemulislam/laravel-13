<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'All products';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 'Create product form';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return 'Product stored';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return 'Product: ' . $product;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return 'Edit product: ' . $product;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return 'Product updated: ' . $product;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return 'Product deleted: ' . $product;
    }
}
