<?php

namespace App\Http\Controllers;

use App\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function event(){
        $events=Events::all();

        return view('backend.event')->with('events',$events);
    }

    public function search(Request $request){
        $event_category = $request['event_category'];

        $results=DB::table('events')
            ->where('event_category', $event_category)
            ->get();

        return view('frontend.eventsearching')->with('results',$results);
    }

    public function event_type($type)
    {
        $results=DB::table('events')
            ->where('event_type', $type)
            ->get();

        return view('frontend.eventsearching')->with('results',$results);
    }
    
    public function add(Request $request){
        $this->validate($request, [
            'event_title' => 'required',
            'event_category' => 'required',
            'event_type' => 'required',
            'event_date' => 'required',
            'event_desc' => 'required'
        ]);

        $event_title = $request['event_title'];
        $event_date = $request['event_date'];
        $event_desc = $request['event_desc'];
        $event_category = $request['event_category'];
        $event_type = $request['event_type'];
        $image = $request->file('event_image');

        $event=new Events();
        $event->event_title=$event_title;
        $event->event_date=$event_date;
        $event->event_desc=$event_desc;
        $event->event_type=$event_type;
        $event->event_category=$event_category;

        if ($image)
        {
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $event_title . '_photo.' . $ext;
            $upload_path = 'images/';
            $event_image = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $event->event_image=$event_image;
                $event->save();
                return redirect()->route('dash.event')->with(['message' => 'evenement ajouté avec succes']);
            }
        }
    }
}
