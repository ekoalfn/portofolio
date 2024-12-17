<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Auth;
class VerificationController extends Controller
{
    use VerifiesEmails, RedirectsUsers;
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function show(Request $request)
    {
        return $request->user()->hasVerifiedEmail()
                        ? redirect($this->redirectPath())
                        : view('auth.verify', [
                            'pageTitle' => __('Account Verification')
                        ]);
    }

    public function resend(Request $request)
    {
        auth()->user()->sendEmailVerificationNotification();
        return redirect()->back()->with('success', 'Tautan reset kata sandi sudah dikirim!');
    }

    
}
