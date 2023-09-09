<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Info;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $info=Info::all();
        $products=Product::when($request->name, function($query, $value){
            $query->where('name_ar','LIKE',"%$value%")
            ->orWhere('name_ar','LIKE',"%$value%")
            ->orWhere('name_en','LIKE',"%$value%")
            ->orWhere('dese_ar','LIKE',"%$value%")
            ->orWhere('dese_en','LIKE',"%$value%")
            ->orWhere('nickname_st','LIKE',"%$value%")
            ->orWhere('nickname_num','LIKE',"%$value%")
            ->orWhere('nickname_main','LIKE',"%$value%");

        })->paginate(20);

        // $products=Product::orderBy('created_at', 'desc')->paginate(8);
        return view('front.product',compact('products','info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with('images')->findOrFail($id);
        $info=Info::orderBy('created_at', 'desc')->paginate(1);

    
    
        return view('front.product-show', [
           'product' => $product,
           'info' =>$info,
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
