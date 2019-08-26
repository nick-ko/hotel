<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use App\Costumers;
use App\gallery;
use App\Room;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BackendController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dash(){
        $categories=Category::all();
        $rooms = Room::all();
        $books = Book::all();
        $costumers= Costumers::all();

        return view('backend.dash')->with('categories',$categories)
            ->with('rooms',$rooms)
            ->with('books',$books)
            ->with('costumers',$costumers);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function category(){
        $categories=Category::all();
        return view('backend.category')->with('categories',$categories);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function room(){
        $categories=Category::all();
        $rooms = Room::all();
        return view('backend.room')->with('categories',$categories)
            ->with('rooms',$rooms);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/')->with('message','Vous vous etez deconnectez');
    }
    public function user(){

        $users=DB::table('users')
            ->where('id','!=',Auth::id())
            ->get();
        $u=Auth::user();
        return view('backend.user')->with('users',$users)->with('u',$u);
    }

    public function create(Request $request){

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'role' => $request['role'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect('/dashboard/users')->with('message','Vous vous etez deconnectez');

    }

    public function profile(){
        $user=Auth::user();
        return view('backend.profile')->with('user',$user);
    }

    public function about(){
        return view('backend.website.about');
    }
    public function gallery(){
        $gallery=DB::table('galleries')->get();
        return view('backend.gallery',compact('gallery'));
    }
    public function save(Request $request){
        $this->validate($request, [
            'image' => 'required'
        ]);

        $image = $request->file('image');

        $gallery=new gallery();

        if ($image)
        {
            $ext = strtolower($image->getClientOriginalExtension());
            $image_name=$image->getClientOriginalName();
            $image_full_name = $image_name;
            $upload_path = 'images/galleries/';
            $gallery_image = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $gallery->image=$gallery_image;
                $gallery->save();
                return redirect()->route('dash.gallery')->with(['message' => 'image ajouté avec succes']);
            }
        }
    }
}
