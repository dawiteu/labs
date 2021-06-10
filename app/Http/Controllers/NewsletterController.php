<?php

namespace App\Http\Controllers;

use App\Mail\NewsMailAdminSender;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    public function index(){
        $this->authorize('isWebMaster', Auth::user()); 

        $newss = Newsletter::all()->where('subscribe', 1); 
        return view('admin.newsletter.index', compact('newss')); 
    }

    public function sendmailForm(){
        $this->authorize('isWebMaster', Auth::user()); 
        $newss = Newsletter::all()->where('subscribe', 1); 
        return view('admin.newsletter.sendmail', compact('newss')); 
    }
    public function sendmailsub(Request $request){ 
        $emails = Newsletter::where('subscribe', 1)->get(); 

        if(count($emails) > 0) { // il y au moins un 
            foreach ($emails as $usmail) {
                Mail::to($usmail)->send(new NewsMailAdminSender($request));
            }
            return redirect()->route('newsletter.all')->with('success', "L'email a bien été envoyé.");
        }else{
            return redirect()->route('newsletter.all')->with('error', "0 mail dans l newsl ");
        }
    }

}
