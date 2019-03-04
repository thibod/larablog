<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create() {
        $contacts = Contact::all();
        return view('contact', array('contacts' => $contacts));
    }

    public function store(ContactRequest $request)
    {
        $contact = new Contact();
        $contact->contact_name = request('contact_name');
        $contact->contact_email = request('contact_email');
        $contact->contact_message = request('contact_message');
        $contact->contact_date = now();
        $contact->save(); // on enregistre dans la base
        return redirect('/contact'); // méthode pour rediriger vers une autre url (en get par défaut)
//        return view('confirm');
    }
}
