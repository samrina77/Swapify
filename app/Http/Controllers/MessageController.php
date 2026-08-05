<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
   public function index()
{
    $users = User::where('id', '!=', Auth::id())->get();

    $messages = collect();

    return view('messages', compact('users', 'messages'));
}

    public function chat($id)
{

$users = User::where('id','!=',auth()->id())->get();


$selectedUser = User::findOrFail($id);


$messages = Message::where(function($query) use($id){

$query->where('sender_id',auth()->id())
      ->where('receiver_id',$id);

})
->orWhere(function($query) use($id){

$query->where('sender_id',$id)
      ->where('receiver_id',auth()->id());

})
->get();



return view('messages',compact(
'users',
'selectedUser',
'messages'
));


}

    public function send(Request $request)
{

Message::create([

'sender_id'=>auth()->id(),

'receiver_id'=>$request->receiver_id,

'message'=>$request->message

]);


return back();

}

}