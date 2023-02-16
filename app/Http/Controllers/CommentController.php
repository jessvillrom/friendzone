<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        $validar = $this->validate($request, [
            'image_id' => ['integer', 'required'],
            'content' => ['string', 'required']
        ]);

        $image_id = $request->image_id;
        $content = $request->input('content');

        $comment = new Comment();
        $comment->user_id = $user_id;
        $comment->image_id = $image_id;
        $comment->content = $content;
        $comment->save();

        return redirect()->route('image.detail', ['id' => $image_id])
            ->with([
                'message' => 'Has publicado tu comentario correctamente'
            ]);

        // dd($user_id, $image_id, $content);
    }

    public function delete($id)
    {

        $user = Auth::user();
        
        $comment = Comment::find($id);
        $image = Image::find($comment->image_id);
        // dd($id);

        // comprobar que el usuario_id sea el mismo que subio la imagen.



        // dd($comment->user_id , $user->id, $image->user_id, $user->id);


        if ($user && ($comment->user_id == $user->id || $image->user_id == $user->id)) {

            $comment->delete();

            return redirect()->route('image.detail', ['id' => $image->id])
                ->with([
                    'message' => 'El comentario fue eliminado correctamente'
                ]);
        } else {

            return redirect()->route('image.detail', ['id' => $image->id])
                ->with([
                    'message' => 'No puede eliminar el comentario'
                ]);
        }
    }
}
