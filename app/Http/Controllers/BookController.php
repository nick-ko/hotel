<?php

namespace App\Http\Controllers;

use App\Book;
use App\Costumers;
use App\Exports\BooksExport;
use App\Mail\BookingMail;
use App\Mail\ComfirmBooking;
use App\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use MaddHatter\LaravelFullcalendar\Calendar;
use App\EventModel;
use MaddHatter\LaravelFullcalendar\Event;
use Barryvdh\DomPDF\Facade as PDF;

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
            ->where('disponibility_room','==',0)
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
            ->where('disponibility_room','==',0)
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

    public function book_room(Request $request){
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

        $r=DB::table('rooms')
            ->where('id',$book_room)
            ->first();

        return view('frontend.book')->with('days',$days)
            ->with('r',$r)
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
     * @throws \Exception
     */
    public function book(){
        $books= DB::table('books')
            ->where('archived','=','0')
            ->get();
        return view('backend.book',compact('books'));
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

         $busy_room=DB::table('books')
             ->select('book_room')
             ->where('id', $id)
             ->first();

        DB::table('rooms')
            ->where('id', $busy_room->book_room)
            ->update(['room_status' => 1, 'disponibility_room' => 1]);

        $email=DB::table('books')
            ->select('book_email')
            ->where('id', $id)
            ->first();

        $mailable=new ComfirmBooking();
        Mail::to($email->book_email)->send($mailable);


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
            'motif' => 'required',
            'pays' => 'required',
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
        $motif=$request['motif'];
        $pays=$request['pays'];
        $days = $request['days'];
        $booking_date = Carbon::now();

        $total=$booking_price;

        $book = new Book();
        $book->text=$book_name.' '.$book_lname;
        $book->book_email=$book_email;
        $book->book_contact=$book_contact;
        $book->start_date=$book_from;
        $book->end_date=$book_to;
        $book->child_number=$child_number;
        $book->adult_number=$adult_number;
        $book->book_room=$book_room;
        $book->booking_date=$booking_date;
        $book->booking_price=$booking_price;
        $book->motif=$motif;
        $book->pays=$pays;
        $book->booking_total=$total;

        $costumer=new Costumers();
        $costumer->name=$book_name.' '.$book_lname;
        $costumer->email=$book_email;
        $costumer->contact=$book_contact;
        $costumer->last_visite=$book_from.' au '.$book_to;

        $test_email=DB::table('costumers')
            ->where('email',$book_email)
            ->first();

        $mailable=new BookingMail($request['book_name'],$request['booking_price'],$request['book_from'],$request['book_to']);
        Mail::to($request['book_email'])->send($mailable);
        if ($test_email==null){
            $costumer->save();
            $book->save();
            return redirect()->route('room')->with(['message' => 'votre reservation a ete effectué avec succes,merci.']);
        }else{
            $book->save();
            return redirect()->route('room')->with(['message' => 'votre reservation a ete effectué avec succes,merci.']);
        }

    }

    public function backend_booking(Request $request){
        $this->validate($request, [
            'book_name' => 'required',
            'book_lname' => 'required',
            'book_email' => 'required',
            'book_contact' => 'required',
            'motif' => 'required',
            'pays' => 'required',
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
        $motif=$request['motif'];
        $pays=$request['pays'];
        $days = $request['days'];
        $booking_date = Carbon::now();

        $total=$booking_price;

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
        $book->motif=$motif;
        $book->pays=$pays;
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

    public function downloadPdf($id){
        $booking= DB::table('books')
            ->where('id',$id)
            ->first();
        $pdf= PDF::loadView('backend.facture',compact('booking'))->setPaper('a4','portrait');

        $fileName='facture_'.$booking->text;
        return $pdf->download($fileName.'.pdf');
    }

    public function archive($id){
        DB::table('books')
            ->where('id',$id)
            ->update(['archived'=> 1]);

        $busy_room=DB::table('books')
            ->where('id', $id)
            ->first();

        DB::table('rooms')
            ->where('id', $busy_room->book_room)
            ->update(['room_status' => 0, 'disponibility_room' => 0]);

        return redirect()->route('book')->with(['message' => 'Reservation archivé avec succes']);
    }

    public function show($id){
        $presta=DB::table('presta_histos')
            ->where('book_id', $id)
            ->first();
        $booking=DB::table('books')
            ->where('id', $id)
            ->first();
        return view('backend.details-book',compact('booking'));
    }
}
