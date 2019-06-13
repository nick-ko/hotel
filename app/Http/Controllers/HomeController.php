<?php

namespace App\Http\Controllers;

use App\Events;
use App\Mail\ContactUs;
use Illuminate\Http\Request;
use App\Room;
use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{

    public function home(){
        $categories=Category::all();
        return view('frontend.index')->with('categories',$categories);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about(){ return view('frontend.about');}

    public function room(){
        $rooms = DB::table('rooms')
            ->where('disponibility_room','==',0)
            ->get();

        $categories=Category::all();
        return view('frontend.room')->with('categories',$categories)
            ->with('rooms',$rooms);
    }

    public function service(){ return view('frontend.service');}

    public function event(){
        $events=Events::all();
        return view('frontend.event')->with('events',$events);
    }

    public function contact(){ return view('frontend.contact');}

    public function contact_us(Request $request){

        $name = $request['name'];
        $email = $request['email'];
        $subject = $request['subject'];
        $message = $request['message'];

        $mailable=new ContactUs($name,$email,$subject,$message);
        Mail::to($request['email'])->send($mailable);

        return redirect()->route('contact')->with(['message' => 'votre message a ete envoyé avec succes']);
    }
}
