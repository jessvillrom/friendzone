@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        
               @include('includes.message')

            @foreach ($images as $image)
                
            <div class="card public_image">
                <div class="card-header data-user">
                    <a href="{{route('image.detail',['id'=>$image->id])}}" >

                        @if($image->user->image)
                        <div class="container-avatar">
                            <img class="avatar_config" src="{{route('user.avatar',[$image->user->image])}}" alt="Foto de perfil">
                        </div>
                        @endif
                        
                        {{$image->user->name.' '.$image->user->surname ."-" }}  
                        <span class="nickname">{{$image->user->nick}}</span>
                    </a>
                    </div>
                        
                        
                        <div class="card-body">

                            <div class="compartir">
                                <img class="compartir_image" src="{{route('user.compartido',["filename"=>$image->image_path])}}" alt="Foto de perfil">
                            </div>
                            <div class="likes">
                                <img src="{{asset('img/cora.png')}}" alt="">

                            </div>
                            <div class="description">
                                <span class="nickname date">{{ \FormatTime::LongTimeFilter($image->updated_at) }}</span>
                                  <span class="nickname">{{$image->user->nick}}</span>
                                    <p class="p_description">
                                    {{$image->description}}
                                    </p>
                            </div>
                            <div class="clearfix"></div>
                            <a href="{{route('image.detail',['id'=>$image->id])}}" class="btn btn-warning btn-comentario">
                                Comentar ({{count($image->comments)}})
                            </a>

                            
                        </div>
                @endforeach
            </div>
            <div class="clearfix">

            </div>
            {{$images->render()}}

        </div>
    </div>
</div>
@endsection
