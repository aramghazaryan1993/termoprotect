<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\ContactSeo;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    public function index(){
        $contacts = ContactSeo::with(['localizations'])->first();
        return view('contact',compact('contacts'));
    }

    public function sendMessage(ContactRequest  $request)
    {
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ];


        if( Mail::to('aramghazaryansoft@gmail.com')->send(new \App\Mail\SendEmail($details)))
        {
            return redirect()->back()->with('success', 'Your message successfully sent');
        }else{
            return redirect()->back()->with('success', 'Your message Not successfully sent');
        }


    }
}
