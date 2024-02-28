<?php
// app/Http/Controllers/WooProductController.php

namespace App\Http\Controllers;

use App\Services\WooCommerceService;

class WooProductController extends Controller
{
    protected $woocommerceService;

    public function __construct(WooCommerceService $woocommerceService)
    {
        $this->woocommerceService = $woocommerceService;
    }

    public function index()
    {
        $products = $this->woocommerceService->getProducts();
        return view('woo.products.index', compact('products'));
    }
}
