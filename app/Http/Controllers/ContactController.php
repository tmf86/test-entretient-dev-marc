<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //
    public function home(): Factory|View|Application
    {
        $errors = null;
        return view('contact', ["error" => $errors, "msgSuccess"=>""]);
    }
    public function  sendEmail(Request $request): Application|Factory|View
    {
        $messageIsValid = $request->validate([
            "name"=> 'required|string|max:255',
            "subject"=> 'required|string|max:255',
            "email"=> 'required|email',
            "message"=> 'required|string',
        ], [
            'name.required' => 'Veuillez renseigner votre nom',
            'subject.required' => 'Veuillez renseigner l\'objet de votre message',
            'email.required' => 'veuillez renseiogner votre email.',
            'email.email' => 'votre email n\'est pas valide.',
            'subject.max' => 'sujet trop long'
        ]);
        $result = Mail::to('sajifan285@fsouda.com')->send(new ContactMail($request));
        if ($result){
            Contact::create([
                'user' => $request->name,
                'email' =>$request->email,
                'message' =>$request->message,
                'send' => true,
            ]);
             return view('contact', ["error" => $messageIsValid, "msgSuccess" => "envoyé avec succès"]);
        }
        Contact::create([
            'user' => $request->name,
            'email' =>$request->email,
            'message' =>$request->message,
            'send' => false,
        ]);
         return view('contact', ["error" => $messageIsValid, "msgSuccess" => "message non envoyé"]);

    }
}
