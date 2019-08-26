<?php

namespace App\Http\Controllers;

use App\PrestaHisto;
use App\Prestation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrestationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms=DB::table('rooms')
            ->where('disponibility_room','=',1)
            ->get();
        $presta=DB::table('prestations')
            ->get();
        return view('backend.prestation',compact('rooms','presta'));
    }

    /**
     * Show the form for creating a new resource.
     * @param Request $request
     * @return void
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'room' => 'required',
            'presta' => 'required',
        ]);

        $room = $request['room'];
        $presta = $request['presta'];

        $book=DB::table('books')
            ->where('book_room','=',$room)
            ->first();
        $total = $book->booking_total + $presta;

        DB::table('books')
            ->where('book_room',$room)
            ->update(['booking_total'=>$total]);

        $prestation=DB::table('prestations')
            ->where('price','=',$presta)
            ->first();

        $histo= new PrestaHisto();
        $histo->room=$room;
        $histo->price=$presta;
        $histo->prestation=$prestation->title;
        $histo->room_owner=$book->text;
        $histo->book_id=$book->id;
        $histo->save();
        return redirect()->route('prestation')->with(['message' => 'Prestation effectuée avec succes']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'price' => 'required',
        ]);

        $title = $request['title'];
        $price = $request['price'];

        $presta=new Prestation();
        $presta->title=$title;
        $presta->price=$price;
        $presta->save();

        return redirect()->route('prestation')->with(['message' => 'Nouvelle prestation ajoutée avec succes']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prestation  $prestation
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $histo=DB::table('presta_histos')
            ->get();
        return  view('backend.histo_presta',compact('histo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prestation  $prestation
     * @return \Illuminate\Http\Response
     */
    public function edit(Prestation $prestation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prestation  $prestation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prestation $prestation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prestation  $prestation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prestation $prestation)
    {
        //
    }
}
