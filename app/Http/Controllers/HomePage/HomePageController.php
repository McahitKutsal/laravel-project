<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Validator;


use App\Models\Category;
use App\Models\Product;
use App\Models\Page;
use App\Models\Message;
use App\Models\Contact;

class HomePageController extends Controller
{
  public function __construct(){
    view()->share('pages',Page::orderBy('order','ASC')->get());
    view()->share('categories',Category::get());
    view()->share('contacts',Contact::first());
    view()->share('page',Page::find(1));
  }
  public function index(){
    $data['page']= Page::find(1) ?? abort(403,'Böyle bir Sayfa bulunamadı üzgünüz ...   :(');
    $data['products']=Product::orderBy('created_at','DESC')->paginate(8);
    return view('home.homepage',$data);
  }
  public function category($slug)
  {
    $data['page']= Page::find(1) ?? abort(403,'Böyle bir Sayfa bulunamadı üzgünüz ...   :(');
    $cat =Category::whereSlug($slug)->first() ?? abort(403,'Böyle bir Kategori bulunamadı üzgünüz ...   :(');
    $product =Product::where('category_id',$cat->id)->orderBy('created_at','DESC')->paginate(6) ?? abort(403,'Böyle bir yazı bulunamadı üzgünüz ...   :(');
    $data['products']=$product;
    return view('home.homepage',$data);
  }
  public function single($id){
    $product['products'] =Product::whereId($id)->first() ?? abort(403,'Böyle bir ürün bulunamadı üzgünüz ...   :(');
    return view('home.singleproduct',$product);
  }
  public function page($slug){
    $page = Page::whereSlug($slug)->first()?? abort(403,'Böyle bir Sayfa bulunamadı üzgünüz ...   :(');
    $data['page']=$page;
    return view('home.page',$data);
  }
  public function contact(){
    return view('home.contact');
  }
  public function contactPost(Request $request){

    $rules = [
      'name'=>'required|min:4',
      'email'=>'required|email',
      'topic'=>'required',
      'message'=>'required|min:10',
    ];
    $validate=Validator::make($request->post(),$rules);
    if ($validate->fails()) {
      return redirect(route('contact'))->withErrors($validate)->withInput();
    }
    $message = new Message;
    $message->name = $request->name;
    $message->email = $request->email;
    $message->topic = $request->topic;
    $message->message = $request->message;
    $message->save();
    return redirect(route('contact'))->with('success', 'Mesajınız başarı ile gönderildi.');
  }


}
