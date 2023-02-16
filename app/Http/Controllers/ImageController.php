<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

// use App\Http\Controllers\Auth; 

class ImageController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }


    public function create()
    {
        return view('image.create');
    }
    public function save(Request $request)
    {
        $user = \Auth::user();
        // dd($user->id); 
        $validate = $this->validate($request, [
            'description' => 'required',
            'image_path' => 'required|mimes:jpg,jpeg,bmp,png',


        ]);

        $image_path = $request->file('image_path');
        $description = $request->description;

        $image = new Image();

        $image->user_id = $user->id;

        if ($image_path) {
            $image_name = time() . $image_path->getClientOriginalName();
            Storage::disk('images')->put($image_name, File::get($image_path));
            $image->image_path = $image_name;
        }
        $image->description = $description;
        // $image->image_path =null;

        $image->save();
        return redirect()->route('home')->with(['message' => 'La foto ha sido subida correctamente']);
    }


    public function getImage($filename)
    {
        $file = Storage::disk('images')->get($filename);
        // Estoy guardando mal la imagen en el dico virtual
        // dd($file);
        return  Response($file, 200);
        // return $file; 
    }

    public function detalle($id)
    {
        $image = Image::find($id);
        
        return view('image.detalle', [
            'image' => $image
        ]);
    }
}
