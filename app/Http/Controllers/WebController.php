<?php

namespace App\Http\Controllers;

use App\About;
use App\Home;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    public function home(){
        $content=DB::table('homes')->first();
        return view('backend.website.home',compact('content'));
    }

    public function store_home(Request $request){
        $content=$request->editordata;
        $title=$request->title;
        $description=$request->description;

        $dom = new domdocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');

        //loop over img elements, decode their base64 src and save them to public folder,
        //and then replace base64 src with stored image URL.
        foreach($images as $k => $img){
            $data = $img->getAttribute('src');

            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);

            $data = base64_decode($data);
            $image_name= time().$k.'.png';
            $path = public_path() .'/'. $image_name;

            file_put_contents($path, $data);

            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }


        $content = $dom->saveHTML();
        $blog = Home::find(1);
        $blog->title = $title;
        $blog->description = $description;
        $blog->content = $content;
        $image = $request->file('image');

        if ($image)
        {
            $filename = $image->getClientOriginalName();
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $filename ;
            $upload_path = 'images/web/';
            $slider_image = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);

            if ($success) {
                $blog->image=$slider_image;
                $blog->save();
            }
        }

        return redirect()->route('dash.home')->with(['message' => 'Contenue modifié avec succes']);
    }

    public function about(){
        $content=DB::table('abouts')->first();
        return view('backend.website.about',compact('content'));
    }

    /**
     * @param Request $request
     */
    public function store_about(Request $request){
        $content=$request->editordata;

        $dom = new domdocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');

        //loop over img elements, decode their base64 src and save them to public folder,
        //and then replace base64 src with stored image URL.
        foreach($images as $k => $img){
            $data = $img->getAttribute('src');

            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);

            $data = base64_decode($data);
            $image_name= time().$k.'.png';
            $path = public_path() .'/'. $image_name;

            file_put_contents($path, $data);

            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }


        $content = $dom->saveHTML();
        $blog = new About();
        $blog->content = $content;
        $image = $request->file('image');

        if ($image)
        {
            $filename = $image->getClientOriginalName();
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $filename ;
            $upload_path = 'images/web/';
            $slider_image = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);

            if ($success) {
                $blog->image=$slider_image;
                $blog->save();
            }
        }
        return redirect()->route('dash.about')->with(['message' => 'Contenue modifié avec succes']);
    }


}
