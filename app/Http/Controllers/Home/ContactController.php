<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ContactController extends Controller{
    //
    public function Contact(){
        return view('frontend.contact');
    }

    public function StoreMessage(Request $request){
        
        Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Message sent Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function ContactMessage(){

        $contact = Contact::latest()->get();
        return view('admin.contact.allcontact', compact('contact'));
    }

    public function DeleteMessage($id){

        Contact::findOrFail($id)->delete();
    
        $notification = array(
            'message' => 'Multi Image Deleted Successfully', 
            'alert-type' => 'success'
        );
        return redirect()->route('contact.message')->with($notification);
    }
}
