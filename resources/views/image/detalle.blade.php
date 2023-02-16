@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           

                
            <div class="card public_image">
                <div class="card-header data-user">
                        @if($image->user->image)
                        <div class="container-avatar">
                            <img class="avatar_config" src="{{route('user.avatar',[$image->user->image])}}" alt="Foto de perfil">
                        </div>
                        @endif
                        
                        {{$image->user->name.' '.$image->user->surname ."-" }}  
                        <span class="nickname">{{$image->user->nick}}</span>
                    </div>
                        
                        
                        <div class="card-body">

                            <div class="compartir">
                                <img class="compartir_image" src="{{route('user.compartido',["filename"=>$image->image_path])}}" alt="Foto de perfil">
                            </div>
                            <div class="likes">
                                <img src="{{asset('img/cora.png')}}" alt="">

                            </div>
                            <div class="description">
                                  <span class="nickname">{{$image->user->nick}}</span>
                                    <p class="p_description">
                                    {{$image->description}}
                                    </p>
                            </div>
                            <div class="comentarios">
                                     @include('includes.message')

                                    @foreach ($image->comments as $comment)
                                        
                                    <div class="comentarios_anteriores">
                                        <p class="p_description">
                                            <span class="nickname">{{$comment->user->nick}}</span>
                                                <strong>
                                                {{$comment->content}}
                                                </strong>
                                                <span class="nickname date">{{ \FormatTime::LongTimeFilter($comment->updated_at) }}</span>
                                                <br>
                                              

                                                @if(Auth::check() && ($comment->user_id==Auth::user()->id || $image->user_id==Auth::user()->id))
                                                
                                                <a href="{{route('comentario.eliminar',['id'=>$comment->id])}}" >Eliminar </a>
                                                @endif
                                            </p>
                                    </div>
                                    @endforeach
                                <h3>
                                    Comentar ({{count($image->comments)}})
                                </h3>
                                <form  class="form-horizontal" action="{{route('comentario.guardar')}}" method="post">
                                        @csrf
                                        <div class=" ">

                                            <input type="hidden" name="image_id" value="{{$image->id}}">
                                            <textarea class="form-control textarea_comentario  " placeholder="Escribe un comentario..." name="content" id=""  required>
                                            </textarea>
                                            
                                            <button class="btn btn-secondary boton_comentar" type="submit">Comentar</button>
                                        </div>

                                </form>
                                    
                            </div>

                            


                            
                        </div>
            
            </div>
            
       
        </div>
    </div>
</div>
@endsection
