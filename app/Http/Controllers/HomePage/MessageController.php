<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function getMessages(){
      $messages = Message::orderBy('created_at','DESC')->get();
      return view('home.adminmessage',compact('messages'));
    }
    public function destroy(Request $request){
      Message::destroy($request->id);
      return redirect()->back();
    }
}
