<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $productsQuery = Product::orderBy('created_at', 'desc');

        if ($request->search) {
            $productsQuery->where(function ($query) use ($request) {
                $query->orWhere('name_ar', 'LIKE', "%{$request->search}%")
                    ->orWhere('name_en', 'LIKE', "%{$request->search}%")
                    ->orWhere('dese_ar', 'LIKE', "%{$request->search}%")
                    ->orWhere('dese_en', 'LIKE', "%{$request->search}%")
                    ->orWhere('nickname_st', 'LIKE', "%{$request->search}%")
                    ->orWhere('nickname_num', 'LIKE', "%{$request->search}%")
                    ->orWhere('nickname_main', 'LIKE', "%{$request->search}%");
            });
        }

        $products = $productsQuery->paginate(10);
        return view('admin.product', compact('products', 'request'));
    }
}
