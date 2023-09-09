<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Image;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('admin.product',compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.productadd',compact('categories'));
    }

    public function store(Request $request)
    {
        ini_set('memory_limit','512M');

        $request->validate([
            'image'=>'required',
            'gallery'=>'nullable|array',
            'gallery.*'=>'required|image',
        ]);

        $newImageName = time() . '-' . $request->name . '.' .$request->image->extension();

        $image = $request->file('image');
        $imgFile = Image::make($image->getRealPath());
        // create a new Image instance for inserting
        $watermark = Image::make(public_path('assetsfront/images/logo/logo.png'));
        if($imgFile->width() < $watermark->width()){
            $watermark->resize($imgFile->width(), null);
        }
        $imgFile->insert($watermark, 'bottom-right')->save(public_path('images').'/'.$newImageName);

        // $request->image->move(public_path('images'),$newImageName);

        $products = Product::create([
            'name_ar'=>$request->input('name_ar'),
            'name_en'=>$request->input('name_en'),
            'dese_ar'=>$request->input('dese_ar'),
            'dese_en'=>$request->input('dese_en'),
            'nickname_st'=>$request->input('nickname_st'),
            'nickname_num'=>$request->input('nickname_num'),
            'nickname_main'=>$request->input('nickname_main'),
            'extra_data' =>$request->input('extra_data'),
            'price'=>$request->input('price'),
            'status'=>$request->input('status') ?? 'active',
            'feature'=>$request->input('feature') ?? 'no',
            'category_id'=>$request->input('category_id'),
            'image'=>$newImageName
        ]);

        if($request->gallery){
            $products->creatManyImage($request->gallery);
        }

        return redirect()->route('veiwproduct')->with('success','تمت الأضافة ');
    }

    public function show($id)
    {
         $product = Product::with('images')->findOrFail($id);


         return view('admin.productshow', [
            'product' => $product,
        ]);
    }

    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);
        return view('admin.productedit', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $input = $request->all();

        if ($image = $request->file('image')) {

            $newImageName = time() . '-' . $request->name . '.' .$request->image->extension();

            $image = $request->file('image');
            $imgFile = Image::make($image->getRealPath());
            // create a new Image instance for inserting
            $watermark = Image::make(public_path('assetsfront/images/logo/logo.png'));
            if($imgFile->width() < $watermark->width()){
                $watermark->resize($imgFile->width(), null);
            }
            $imgFile->insert($watermark, 'bottom-right')->save(public_path('images').'/'.$newImageName);

            // $request->image->move(public_path('images'),$newImageName );
            $input['image'] = $newImageName;
            @unlink(public_path('images').'/'.$product->image);
        }else{
            unset($input['image']);
        }

        if($request->gallery){
            $input['gallery'] =  $product->updatManyImage($request->gallery);
        }

        $product->update($input);
        return redirect()->route('veiwproduct')->with('success','تم التعديل ');
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if( isset($product->images) && ($product->images->count() > 0) ){
            foreach($product->images as $img){
                @unlink(storage_path('app/public/').$img->path);
                $img->delete();
            }
        }

        @unlink(public_path('images').'/'.$product->image);
        $product->destroy($id);
        return redirect()->route('veiwproduct')->with('success','تم حذف المنتج');

    }

}
