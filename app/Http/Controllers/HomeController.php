<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /* $this->middleware('auth'); */
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }
    public function contacts()
    {
        return view('guest.contacts');
    }

    public function sendContactForm(Request $request) {
        $validatedData = $request->validate([
            'full_name' => 'required',
            'email' => 'required | email',
            'message' => 'required',
        ]);
        //ddd($validatedData);
        //return (new ContactFormMail($validatedData))->render();
        
        Mail::to('admin@prova.com')->send(new ContactFormMail($validatedData));
        return redirect()->back()->with('message', 'Invio con successo, Grazie per la mail!');
    }
}
