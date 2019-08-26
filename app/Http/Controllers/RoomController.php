<?php

namespace App\Http\Controllers;

use App\Book;
use App\Event;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;

class RoomController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function add(Request $request){
        $this->validate($request, [
            'room_code' => 'required',
            'room_name' => 'required',
            'room_price' => 'required',
            'room_size' => 'required',
            'room_category' => 'required',
            'room_description' => 'required',
        ]);

        $room_code = $request['room_code'];
        $room_name = $request['room_name'];
        $room_price = $request['room_price'];
        $room_size = $request['room_size'];
        $room_category = $request['room_category'];
        $room_description = $request['room_description'];


        $category=DB::table('categories')
            ->where('id',$room_category)
            ->first();
        

        $room = new Room();
        $room->room_price=$room_price;
        $room->room_name=$room_name;
        $room->room_code=$room_code;
        $room->room_size=$room_size;
        $room->room_category=$category->category_title;
        $room->room_description=$room_description;
       

        $image1 = $request->file('room_image');
        $image2 =$request->file('room_photo');

        if ($image1 && $image2)
        {
            $ext = strtolower($image1->getClientOriginalExtension());
            $ext2 = strtolower($image2->getClientOriginalExtension());
            $image_full_name = $room_code . '_photo.' . $ext;
            $plan_full_name = $room_code . '_photo2.' . $ext2;
            $upload_path = 'images/';
            $room_image = $upload_path . $image_full_name;
            $room_photo = $upload_path . $plan_full_name;
            $success = $image1->move($upload_path, $image_full_name);
            $success = $image2->move($upload_path, $plan_full_name);
            if ($success) {
                $room->room_image=$room_image;
                $room->room_photo=$room_photo;
                $room->save();
                return redirect()->route('dashroom')->with(['message' => 'Nouvelle chambre ajoutée avec succes']);
            }
        }

        $room->room_image="";
        $room->room_photo="";
        $room->save();
        return redirect()->route('dashroom')->with(['message' => 'Nouvelle chambre ajoutée avec succes mais sans image']);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        DB::table('rooms')
            ->where('id', $id)
            ->delete();

        return redirect()->route('dashroom')->with(['message' => 'Chambre supprimée avec succes']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request){
        $search_category = $request['search_category'];
        $search_price = $request['search_price'];
        $price=explode(',',$search_price);

        $categories=Category::all();
        $results=DB::table('rooms')
            ->where('room_category', $search_category)
            ->where('disponibility_room','==',0)
            ->whereBetween('room_price', [$price[0],$price[1]])
            ->get();

        return view('frontend.searching')->with('categories',$categories)
            ->with('results',$results);
    }

    public function details($id){

        $details=DB::table('rooms')
            ->where('room_category', $id)
            ->where('disponibility_room','==',0)
            ->get();

        $category=DB::table('categories')
            ->where('id', $id)
            ->first();

        return view('frontend.roomdetails')->with('details',$details)
            ->with('category',$category);
    }

    public function disponibility($id){
        $disponibility=DB::table('rooms')
            ->where('id', $id)
            ->first();

        if (($disponibility->disponibility_room) == 0){
            DB::table('rooms')
                ->where('id', $id)
                ->update(['disponibility_room' => 1]);
            return redirect()->route('dashroom')->with(['message' => 'Chambre indisponible']);
        }else{
            DB::table('rooms')
                ->where('id', $id)
                ->update(['disponibility_room' => 0]);
            return redirect()->route('dashroom')->with(['message' => 'Chambre disponible']);
        }

    }

    public function room_data(){
        $events = DB::table('books')
            ->where('book_status','=' ,1)
            ->get();

        return response()->json([
            "data" => $events
        ]);
    }

    public function room_task(){
        $books = new Room();
        $result=$books->all();
        return view('backend.room-task',compact('result'));
    }


}
