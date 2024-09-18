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
        $review = new Message();
        $comments =  $review->paginate(10);
        foreach ($comments as $comment) {
            $sentiment = $this->analyzeSentiment($comment->message);
            $comment->sentiment = $sentiment;
            $comment->save();
        }

        return view('messages.index')->with(['goodMessages' => $comments]);
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

    private function cleanText($text)
    {
        return preg_replace('/[^a-zA-Z0-9\s]/', '', strtolower($text));
    }

    private function tokenize($text)
    {
        return explode(' ', $text);
    }

    private function removeStopWords($tokens)
    {
        $stopWords = ['and', 'the', 'is', 'in', 'to', 'for', 'on', 'a'];
        return array_diff($tokens, $stopWords);
    }

    private function analyzeSentiment($comment)
    {
        $positiveWords = ['good', 'great', 'excellent', 'fantastic', 'love'];
        $negativeWords = ['bad', 'terrible', 'hate', 'poor', 'awful'];

        $cleanedComment = $this->cleanText($comment);
        $tokens = $this->tokenize($cleanedComment);
        $tokens = $this->removeStopWords($tokens);

        $score = 0;
        foreach ($tokens as $token) {
            if (in_array($token, $positiveWords)) {
                $score++;
            } elseif (in_array($token, $negativeWords)) {
                $score--;
            }
        }
        return $score > 0 ? 'positive' : ($score < 0 ? 'negative' : 'neutral');
    }
}
