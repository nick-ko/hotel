<?php

namespace App\Http\Controllers;

use App\Book;
use App\Room;
use App\User;
use Charts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function stats(){
        $total=DB::table('books')->sum('booking_price');

        $users = Book::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
            ->get();
        $chart = Charts::database($users, 'bar', 'highcharts')
            ->title("Statistique des reservation")
            ->elementLabel("Nombre de Reservation")
            ->dimensions(500, 510)
            ->responsive(false)
            ->groupByMonth(date('Y'), true);

        $dispo_room=DB::table('rooms')->selectRaw('room_number');
        $dispo=$dispo_room->take(3);

        $room=Room::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->get();
        $arr=[7,10,5];
        $pie  =	 Charts::database($room,'pie', 'highcharts')
            ->title('Statistique des chambres')
            ->labels(['Negresco room', 'Ritz', 'Royal Room'])
            ->values($arr)
            ->dimensions(490, 550)
            ->responsive(false);

        $booking= DB::table('books')
            ->where('archived','=','1')
            ->get();
        return view('backend.stats',compact('chart','pie','total','booking'));
    }

}
