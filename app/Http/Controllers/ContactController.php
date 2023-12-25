<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function confirm(ContactRequest $request)
    {
        $form =$request->all();
        unset($form['_token']);

        return view('contact.confirm',
            compact('form'));
    }

    public function send(ContactRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);

        $action = $form['action'];
        if ( $action === 'back' ) {
            unset($form['action']);
            return redirect()->route('contact.index')->withInput($form);
        }

        // heroku上のmailgunで不特定多数のメールアドレスに送信できないので、MAIL_ADMIN宛に先に送信して、MAIL_ADMINには届くようにする。
        $inputs['email'] = env('MAIL_ADMIN');
        $inputs['subject'] = 'お客さまからのお問い合わせ';
        $inputs['view'] = 'email.contact_to_admin';
        Mail::to($inputs['email'])->send(new ContactMail($inputs));

        // $inputs = $form;
        // $inputs['subject'] = 'お問い合わせ内容のご確認';
        // $inputs['view'] = 'email.contact_to_customer';
        // Mail::to($inputs['email'])->send(new ContactMail($inputs));

        return view('contact.thanks');
    }
}
