<?php

namespace App\Http\Controllers;

use App\ContactModel;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home()          { return view('home'); }

    // User
    public function enter()         { return view('enter'); }
    public function cart()          { return view('cart'); }

    // Game
    public function game()          { return view('game'); }
    public function gameid(string $id)        { return view('game', ['id' => $id]); }

    // Main
    public function games()         { return view('games'); }
    public function search()        { return view('search'); }
    public function searchid(string $id)        { return view('search', ['id' => $id]); }
    public function release()       { return view('release'); }
    public function news()          { return view('news'); }

    public function parser(string $id)        { return view('parser', ['id' => $id]); }

    public function collection()    { return view('collection'); }
    public function statistics()    { return view('statistics'); }

    public function back()          { return back();}
    public function error()         { return view('error'); }

    public function error_check(Request $request)   { 
        $valid = $request->validate([
            'name'      => 'required|min:5|max:100',
            'email'     => 'required|min:5|max:100',
            'theme'      => 'required|min:5|max:100',
            'message'   => 'required|min:15|max:1500',
        ]);

        $review = new ContactModel();
        $review->name = $request->input('name');
        $review->email = $request->input('email');
        $review->theme = $request->input('theme');
        $review->message = $request->input('message');

        $review->save();

        return redirect()->route('error');

        // dd($request); 
    }

    // Info 
    public function about()                 { return view('about'); }
    public function questions()             { return view('questions'); }
    public function social()                { return view('social'); }

    // Fotter
    public function privacy_policy()        { return view('privacy_policy'); }
    public function legal_information()     { return view('legal_information'); }
    public function user_agreements()       { return view('user_agreements'); }
    public function refunds()               { return view('refunds'); }
}
