<?php

namespace App\Http\Controllers\HomePage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
  public function index(){
  $categories = Category::all();
    return view('home.category',compact('categories'));
  }
  public function create(Request $request){
    $category = new Category;
    $category->name = $request->category;
    $category->slug = Str::slug($category->name);
    $category->save();
    $categories = Category::all();
    toastr()->success('Kategori başarı ile eklendi.','Başarılı!');
    return redirect()->back();
  }
  public function getData(Request $request){
    $category = Category::findOrFail($request->id);
    return response()->json($category);
  }
  public function update(Request $request){
    $isSlug = Category::whereSlug(Str::slug($request->category))->whereNotIn('id',[$request->id])->first();
    $isName = Category::whereName($request->category)->whereNotIn('id',[$request->id])->first();
    if ($isSlug or $isName) {
      toastr()->error('Böyle bir kategori zaten mevcut!');
      return redirect()->back();
    }
    $category = Category::find($request->id);
    $category->name = $request->category;
    $category->slug = Str::slug($request->category);
    $category->save();
    toastr()->success('Kategori başarı ile Güncellendi.'.$request->id,'Başarılı!');
    return redirect()->back();
  }
  public function delete(Request $request){
    Product::where('category_id',$request->id)->delete();
    Category::destroy($request->id);
    toastr()->success('Kategori ve ürünleri başarı ile silindi','Başarılı!');
    return redirect()->back();
  }
}
