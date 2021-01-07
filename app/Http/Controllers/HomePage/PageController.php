<?php

namespace App\Http\Controllers\HomePage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Page;
use App\Models\Category;
use App\Models\Contact;

class PageController extends Controller
{
    public function index(){
      $page=Page::find(2);
      return view('home.pagesadmin',compact('page'));
    }
    public function update($slug){
      $page=Page::whereSlug($slug)->first();
      $categories = Category::all();
      return view('home.updatepages',compact('page','categories'));
    }
    public function insert(Request $request){
      $request->validate([
        'title'=>'min:3',
        'image'=>'image|mimes:jpeg,png,jpeg|max:5120'
      ]);
      $page= Page::findOrFail($request->id);
      $page->title=$request->title;
      $page->content=$request->content;
      $page->slug=Str::slug($request->title);
      if ($request->hasFile('image')) {
        $imageName=Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads'),$imageName);
        $page->image='uploads/'.$imageName;
      }
      $page->save();
      toastr()->success('Sayfa Başarı ile Güncellendi.','Başarılı!');
      return redirect(route('admin.page.index'));
    }
    public function bilgiler(){
      $contact=Contact::find(1);
      return view('home.bilgilerguncelleme',compact('contact'));
    }
    public function getData(Request $request){
      $contact = Contact::findOrFail($request->id);
      return response()->json($contact);
    }
    public function updateContact(Request $request){
      $contact = Contact::find(1);
      $contact->adres = $request->adres;
      $contact->telefon = $request->telefon;
      $contact->save();
      toastr()->success('İletişim bilgileri başarı ile Güncellendi.'.$request->id,'Başarılı!');
      return redirect()->back();
    }
}
