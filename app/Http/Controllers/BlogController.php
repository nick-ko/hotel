<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Comment;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article=DB::table('blogs')
            ->get();
        return view('backend.blog',compact('article'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.add-article');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contenue=$request->contenue;
        $title=$request->title;
        $categorie=$request->categorie;

        $dom = new domdocument();
        $dom->loadHtml($contenue, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
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

        $contenue = $dom->saveHTML();
        $blog = new Blog();
        $blog->title = $title;
        $blog->categorie = $categorie;
        $blog->contenue = $contenue;
        $image = $request->file('image');

        if ($image)
        {
            $filename = $image->getClientOriginalName();
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $filename;
            $upload_path = 'images/blog/';
            $slider_image = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);

            if ($success) {
                $blog->image=$slider_image;
                $blog->save();
            }
        }

        return redirect()->route('add.article')->with(['message' => 'Nouveaux article crée avec succes']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article=DB::table('blogs')
            ->where('id',$id)
            ->where('status','=',0)
            ->first();

        $comments=DB::table('comments')
            ->where('articleId',$id)
            ->get();
         return view('frontend.article-details',compact('article','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }

    public function comment(Request $request){

        $name=$request->name;
        $email=$request->email;
        $comment=$request->message;
        $article=$request->articleId;

        $commentaire=new Comment();
        $commentaire->name = $name;
        $commentaire->email = $email;
        $commentaire->comment = $comment;
        $commentaire->articleId = $article;
        $commentaire->save();

        return redirect('/blog/article/'.$article)->with('message','Vous venez de commenter cet article');
    }

    public function search(Request $request){
        $post = $request['post'];

        $articles=DB::table('blogs')
            ->where('title', $post)
            ->get();

        return view('frontend.blog',compact('articles'));
    }
}
