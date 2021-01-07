<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at','ASC')->get();
        return view('home.adminproduct',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('home.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'title'=>'min:3',
          'image'=>'required|image|mimes:jpeg,png,jpeg|max:5120'
        ]);
        $product= new Product;
        $product->title=$request->title;
        $product->category_id=$request->category;
        $product->content=$request->content;
        $product->content2=$request->content2;
        $product->content3=$request->content3;
        $product->content4=$request->content4;
        $product->slug=Str::slug($request->title);
        $product->price=$request->price;
        if ($request->hasFile('image')) {
          $imageName=Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
          $request->image->move(public_path('uploads'),$imageName);
          $product->image='uploads/'.$imageName;
        }
        $product->save();
        toastr()->success('Ürün Başarı ile eklendi.','Başarılı!');
        return redirect(route('urunler.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $product=Product::findOrFail($id);
      $categories = Category::all();
      return view('home.update',compact('categories','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'title'=>'min:3',
        'image'=>'image|mimes:jpeg,png,jpeg|max:5120'
      ]);
      $product= Product::findOrFail($id);
      $product->title=$request->title;
      $product->category_id=$request->category;
      $product->content=$request->content;
      $product->content2=$request->content2;
      $product->content3=$request->content3;
      $product->content4=$request->content4;
      $product->slug=Str::slug($request->title);
      $product->price=$request->price;
      if ($request->hasFile('image')) {
        $imageName=Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads'),$imageName);
        $product->image='uploads/'.$imageName;
      }
      $product->save();
      toastr()->success('Ürün Başarı ile Güncellendi.','Başarılı!');
      return redirect(route('urunler.create'));
    }
     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\Models\Product  $product
      * @return \Illuminate\Http\Response
      */
    public function destroy($id)
    {
        Product::find($id)->delete();
        toastr()->success('Ürün Başarı ile Silindi.','Başarılı!');
        return redirect(route('urunler.index'));
    }
}
