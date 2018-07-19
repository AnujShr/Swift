<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function store(ContactFormRequest $request)
    {
        $data = $request->all();
        app('mailer')->queue(new ContactMail($data['email']));
        Contact::create($data);
        $return['success'] = 'true';
        return response()->json($return);
    }
}
