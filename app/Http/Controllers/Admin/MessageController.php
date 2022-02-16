<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Message;
use App\Apartment;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $messageList = [];
        $apartmentList = Apartment::where('user_id', Auth::user()->id)->get();
        
        foreach ($apartmentList as $apartment) {
            $messages = Message::orderBy('created_at', 'desc')->where("apartment_id", $apartment->id)->get();

            foreach ($messages as $message) {
                array_push($messageList, $message);
            }
        }
        array_multisort($messageList, SORT_DESC);
        return view("admin.messages.index", ["messageList" => $messageList]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $data->validate([
            'email_sender' => 'required'| 'string'| 'email',
            'content' => 'required|min:20',
        ]);

        $newMessage = new Message();
        $newMessage->email_sender = $data['email_sender'];
        $newMessage->content = $data['content'];
        $newMessage->apartment_id = $data['apartment_id'];

        return redirect()->route('admin.messages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Message $message)
    {
        $data = $request->all();
        $message->read = 1;
        $message->update();
        return view("admin.messages.show", compact("message"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $message->delete();

        return redirect()->route("admin.messages.index");
    }
}