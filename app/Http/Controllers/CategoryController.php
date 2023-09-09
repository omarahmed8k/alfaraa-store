<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Image;

class CategoryController extends Controller
{
    public function index()
    {
        $category=Category::all();
        return view('admin.category',compact('category'));
    }

    public function create()
    {
        return view('admin.categoryadd');

    }

    public function store(Request $request)
    {

        $request->validate([
            'image'=>'required',
        ]);

        $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();

        $image = $request->file('image');
        $imgFile = Image::make($image->getRealPath());
        // create a new Image instance for inserting
        $watermark = Image::make(public_path('assetsfront/images/logo/logo.png'));
        if($imgFile->width() < $watermark->width()){
            $watermark->resize($imgFile->width(), null);
        }
        $imgFile->insert($watermark, 'bottom-right')->save(public_path('images').'/'.$newImageName);

        // $request->image->move(public_path('images'),$newImageName );

        $category = Category::create([
            'name_ar'=>$request->input('name_ar'),
            'name_en'=>$request->input('name_en'),
            'image'=>$newImageName
        ]);

        return redirect()->route('veiwcategory')->with('success','تمت الأضافة ');

    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categoryedit', [
            'category' => $category,
        ]);
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
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

            $input['image'] = $newImageName;
            @unlink(public_path('images').'/'.$category->image);
        }else{
            unset($input['image']);
        }

        $category->update($input);
        return redirect()->route('veiwcategory')->with('success','تم التعديل ');
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categoryshow', [
            'category' => $category,
        ]);
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        @unlink(public_path('images').'/'.$category->image);
        $category->destroy($id);
        return redirect()->route('veiwcategory')->with('success','تم حذف القسم');
    }

}
