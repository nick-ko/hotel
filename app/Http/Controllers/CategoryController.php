<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function add(Request $request){
        $this->validate($request, [
            'category_title' => 'required',
            'category_desc' => 'required'
        ]);

        $category_title = $request['category_title'];
        $category_desc = $request['category_desc'];
        $image = $request->file('category_image');

        $category=new Category();
        $category->category_title=$category_title;
        $category->category_desc=$category_desc;

        if ($image)
        {
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $category_title . '_photo.' . $ext;
            $upload_path = 'images/';
            $category_image = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $category->category_image=$category_image;
                $category->save();
                return redirect()->route('category')->with(['message' => 'categorie ajouté avec succes']);
            }
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        DB::table('categories')
            ->where('id', $id)
            ->delete();

        return redirect()->route('category')->with(['message' => 'categorie supprimé avec succes']);
    }
}
