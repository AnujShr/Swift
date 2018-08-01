<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function index()
    {
        return view('front/contact/index');
    }
    public function store(ContactFormRequest $request)
    {
        $data = $request->all();
        Contact::create($data);
        app('mailer')->queue(new ContactMail($data));
        $return['success'] = 'true';
        return response()->json($return);
    }
}
