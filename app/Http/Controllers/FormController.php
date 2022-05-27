<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;
use App\Mail\FormMessageToEmail;
use Illuminate\Support\Facades\Mail;

class FormController extends Controller
{
    public function form()
    {
        return view('form');
    }

    public function send_form(Request $request) {
        $postArray = array( 
            "name"  =>  $request->name,
            "number"  =>  $request->number,
            "email" => $request->email,
            "message" => $request->message,
        );
        Mail::to($postArray["email"])->send(new FormMessageToEmail($postArray));
        Form::create($postArray);
        return back();

    }
}
