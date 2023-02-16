


            
@if(Auth::user()->image)
<div class="container-avatar">
    <img class="avatar_config" src="{{route('user.avatar',[Auth::user()->image])}}" alt="Foto de perfil">
</div>
    
@endif