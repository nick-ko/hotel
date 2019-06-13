<?php

namespace App\Http\Controllers;

use App\Book;
use App\Exports\BooksExport;
use App\Mail\BookingMail;
use App\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class BookController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function save(Request $request){
        $this->validate($request, [
            //'book_name' => 'required',
            //'book_email' => 'required',
            'book_from' => 'required',
            'book_to' => 'required',
            'adult_number' => 'required',
            'child_number' => 'required',
            //'book_room' => 'required',
        ]);

        //$book_name = $request['book_name'];
        //$book_email = $request['book_email'];
        $book_from = $request['book_from'];
        $book_to = $request['book_to'];
        $adult_number = $request['adult_number'];
        $child_number = $request['child_number'];
        $book_room = $request['book_room'];
        $bookind_date = Carbon::now();

        $booking_to=new Carbon($book_to);
        $booking_from=new Carbon($book_from);
        $days=$booking_from->diffInDays($booking_to);
        $booking_from=$booking_from->toFormattedDateString();
        $booking_to=$booking_to->toFormattedDateString();

        $rooms=DB::table('rooms')
            ->where('room_number','!=',0)
            ->get();

        return view('frontend.booking')->with('days',$days)
            ->with('rooms',$rooms)
            ->with('booking_from',$booking_from)
            ->with('booking_to',$booking_to)
            ->with('book_from',$book_from)
            ->with('book_to',$book_to)
            ->with('child_number',$child_number)
            ->with('adult_number',$adult_number);
    }

    public function backend_save(Request $request){
        $this->validate($request, [
            'book_from' => 'required',
            'book_to' => 'required',
            'adult_number' => 'required',
            'child_number' => 'required',
        ]);

        $book_from = $request['book_from'];
        $book_to = $request['book_to'];
        $adult_number = $request['adult_number'];
        $child_number = $request['child_number'];
        $book_room = $request['book_room'];
        $bookind_date = Carbon::now();

        $booking_to=new Carbon($book_to);
        $booking_from=new Carbon($book_from);
        $days=$booking_from->diffInDays($booking_to);
        $booking_from=$booking_from->toFormattedDateString();
        $booking_to=$booking_to->toFormattedDateString();

        $rooms=DB::table('rooms')
            ->where('room_number','!=',0)
            ->get();

        return view('backend.booking')->with('days',$days)
            ->with('rooms',$rooms)
            ->with('booking_from',$booking_from)
            ->with('booking_to',$booking_to)
            ->with('book_from',$book_from)
            ->with('book_to',$book_to)
            ->with('child_number',$child_number)
            ->with('adult_number',$adult_number);
    }

    /**
     * get all books
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function book(){
        $books= Book::all();
        return view('backend.book')->with('books',$books);
    }

    /**
     * confirm booking
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function confirm($id){
        DB::table('books')
            ->where('id', $id)
            ->update(['book_status' => 1]);

        DB::table('rooms')
            ->where('id', $id)
            ->update(['room_status' => 1]);

        return redirect()->route('book')->with(['message' => 'Reservation confirmé avec succes']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function openModal(){
        return view('includes.bookmodal');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        DB::table('books')
            ->where('id', $id)
            ->delete();

        return redirect()->route('book')->with(['message' => 'Reservation supprimé avec succes']);
    }

    public function booking(Request $request){
        $this->validate($request, [
            'book_name' => 'required',
            'book_lname' => 'required',
            'book_email' => 'required',
            'book_contact' => 'required',
        ]);

        $book_name = $request['book_name'];
        $book_lname = $request['book_lname'];
        $book_email = $request['book_email'];
        $book_contact = $request['book_contact'];
        $book_from = $request['book_from'];
        $book_to = $request['book_to'];
        $adult_number = $request['adult_number'];
        $child_number = $request['child_number'];
        $book_room = $request['book_room'];
        $booking_price = $request['booking_price'];
        $room_number = $request['room_number'];
        $book_service = $request['book_service'];
        $days = $request['days'];
        $booking_date = Carbon::now();

        if ($book_service){
            $service = implode(',',$book_service);

            if ($service === 'parking'){
                $comodite=0;
            }
            if ($service === 'sport'){
                $comodite=5000;
            }
            if ($service === 'restaurant'){
                $comodite=15000*$days;
            }
            if ($service === 'restaurant,sport'){
                $comodite=15000*$days+5000;
            }
            if ($service === 'parking,sport'){
                $comodite=5000;
            }
            if ($service === 'restaurant,parking'){
                $comodite=15000*$days;
            }
            if ($service === 'restaurant,parking,sport'){
                $comodite=15000*$days+5000;
            }
            if ($service==null){
                $comodite=0;
            }
        }
        if ($book_service==null){
            $comodite=0;
        }
        $total=$comodite+$booking_price;

        $book = new Book();
        $book->book_name=$book_name;
        $book->book_lname=$book_lname;
        $book->book_email=$book_email;
        $book->book_contact=$book_contact;
        $book->book_from=$book_from;
        $book->book_to=$book_to;
        $book->child_number=$child_number;
        $book->adult_number=$adult_number;
        $book->book_room=$book_room;
        $book->booking_date=$booking_date;
        $book->booking_price=$booking_price;
        $book->book_service=$service;
        $book->service_price=$comodite;
        $book->booking_total=$total;


        $mailable=new BookingMail($request['book_name'],$request['booking_price'],$request['book_from'],$request['book_to']);
        Mail::to($request['book_email'])->send($mailable);
        $room_number=$room_number-1;

        $book->save();
        DB::table('rooms')
            ->where('room_name',$book_room)
            ->update(['room_number'=>$room_number]);

        return redirect()->route('room')->with(['message' => 'votre reservation a ete effectué avec succes,merci.']);
    }

    public function backend_booking(Request $request){
        $this->validate($request, [
            'book_name' => 'required',
            'book_lname' => 'required',
            'book_email' => 'required',
            'book_contact' => 'required',
        ]);

        $book_name = $request['book_name'];
        $book_lname = $request['book_lname'];
        $book_email = $request['book_email'];
        $book_contact = $request['book_contact'];
        $book_from = $request['book_from'];
        $book_to = $request['book_to'];
        $adult_number = $request['adult_number'];
        $child_number = $request['child_number'];
        $book_room = $request['book_room'];
        $booking_price = $request['booking_price'];
        $room_number = $request['room_number'];
        $book_service = $request['book_service'];
        $days = $request['days'];
        $booking_date = Carbon::now();

        if ($book_service){
            $service = implode(',',$book_service);

            if ($service === 'parking'){
                $comodite=0;
            }
            if ($service === 'sport'){
                $comodite=5000;
            }
            if ($service === 'restaurant'){
                $comodite=15000*$days;
            }
            if ($service === 'restaurant,sport'){
                $comodite=15000*$days+5000;
            }
            if ($service === 'parking,sport'){
                $comodite=5000;
            }
            if ($service === 'restaurant,parking'){
                $comodite=15000*$days;
            }
            if ($service === 'restaurant,parking,sport'){
                $comodite=15000*$days+5000;
            }
            if ($service==null){
                $comodite=0;
            }
        }
        if ($book_service==null){
            $comodite=0;
        }
        $total=$comodite+$booking_price;

        $book = new Book();
        $book->book_name=$book_name;
        $book->book_lname=$book_lname;
        $book->book_email=$book_email;
        $book->book_contact=$book_contact;
        $book->book_from=$book_from;
        $book->book_to=$book_to;
        $book->child_number=$child_number;
        $book->adult_number=$adult_number;
        $book->book_room=$book_room;
        $book->booking_date=$booking_date;
        $book->booking_price=$booking_price;
        $book->book_service=$service;
        $book->service_price=$comodite;
        $book->booking_total=$total;


        $mailable=new BookingMail($request['book_name'],$total,$request['book_from'],$request['book_to']);
        Mail::to($request['book_email'])->send($mailable);
        $room_number=$room_number-1;

        $book->save();
        DB::table('rooms')
            ->where('room_name',$book_room)
            ->update(['room_number'=>$room_number]);

        return redirect()->route('book')->with(['message' => 'reservation effectué avec succes']);
    }

    /**
     * @param $type
     * @return mixed
     */
    public function downloadExcel()
    {
         return Excel::download(new BooksExport, 'stat_reservation.xlsx');
    }
}
