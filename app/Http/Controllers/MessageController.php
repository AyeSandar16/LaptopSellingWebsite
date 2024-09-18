<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Events\MessageSent;
use Illuminate\Support\Str;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $good_messages = [
            'good',
            'fast',
            'reliable'
        ];

        $bad_messages = [
            'Delays',
            'Low-quality images',
            'Unhelpful'
        ];

        $query = Message::query();

        // Loop through each good message and add a `where` clause with `LIKE`
        foreach ($good_messages as $good_message) {
            $query->orWhere('message', 'LIKE', '%' . $good_message . '%');
        }

        // Paginate the result
        $goodMessages = $query->paginate(20);

        $badQuery = Message::query();
        foreach ($bad_messages as $bad_message) {
            $badQuery->orWhere('message', 'LIKE', '%' . $bad_message . '%');
        }
        $badMessages = $badQuery->paginate(20);

        return view('messages.index')->with(['goodMessages' => $goodMessages, 'badMessages' => $badMessages]);
    }
    public function messageFive()
    {
        $message = Message::whereNull('read_at')->limit(5)->get();
        return response()->json($message);
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
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|min:2',
            'email' => 'required|email',
            'phone' => 'required|string',
            'message' => 'required|string',
        ]);


        // Create a new Message instance
        $message = new Message();

        // Fill the Message instance with validated data
        $message->name = $validatedData['name'];
        $message->email = $validatedData['email'];
        $message->phone = $validatedData['phone'];
        $message->message = $validatedData['message'];

        // Save the Message to the database
        $message->save();

        // Flash a success message to the session
        $request->session()->flash('success', 'Your message was successfully sent!');

        // Redirect back to the homepage or any other appropriate page
        return redirect()->route('home.index');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $message = Message::find($id);
        if ($message) {
            // $message->read_at=\Carbon\Carbon::now();
            $message->save();
            return view('messages.show')->with('message', $message);
        } else {
            return back();
        }
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
        $message = Message::find($id);
        $status = $message->delete();
        if ($status) {
            request()->session()->flash('success', 'Successfully deleted message');
        } else {
            request()->session()->flash('error', 'Error occurred please try again');
        }
        return back();
    }
}
