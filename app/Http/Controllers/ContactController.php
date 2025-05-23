<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactMailRequest;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Show the Contact page.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('contact.index');
    }

    /**
     * Send the Contact email.
     *
     * @param ContactMailRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function send(ContactMailRequest $request)
    {
        if (!config('settings.contact_form')) {
            abort(404);
        }

        try {
            Mail::to(config('settings.contact_email'))->send(new ContactMail());
        } catch(\Exception $e) {
            return redirect()->route('contact')->with('error', $e->getMessage());
        }

        return redirect()->route('contact')->with('success', __('Thank you!').' '.__('We\'ve received your message.'));
    }

    
    public function terms()
    {
        return view('terms.index');
    }

    public function privacy()
    {
        return view('privacy.index');
    }

    public function about()
    {
        return view('about.index');
    }
}
