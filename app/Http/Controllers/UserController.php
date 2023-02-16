<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{

    public function __construct(){
        $this->middleware('auth'); 

    }

    public function config()
    {
        return view('user.config');
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $id = $user->id;

        // dd($id); 

        $validate = $this->validate(

            $request,
            [
                'name' => ['required', 'string', 'max:255'],
                'surname' => ['required', 'string', 'max:255'],
                'nick' => ['required', 'string', 'max:255', 'unique:users,nick,' . $id],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],

            ]
        );


        $image = $request->file('image');
        // dd($image); 
        if ($image) {
            $image_full = time() . $image->getClientOriginalName();
            Storage::disk('users')->put($image_full, File::get($image));

            // Storage::putFile('users', $image);
            $user->image = $image_full;
        }
        // dd($request->name);
        $name = $request->input('name');
        $surname = $request->input('surname');
        $nick = $request->input('nick');
        $email = $request->input('email');

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->nick = $request->nick;
        $user->email = $request->email;

        $user->update();

        return redirect()->route('config')->with(['message' => 'Usuario actualizado Correctamente']);
    }

    public function getImage($filename)
    {
        $file = Storage::disk('users')->get($filename);
        // Estoy guardando mal la imagen en la base de datos.
        // dd($file);
        return  Response($file, 200);
        // return $file; 
    }
}
