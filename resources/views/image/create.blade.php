
@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
             <div class="card">
                <div class="card-header">Compartir Imagen</div>
                <div class="card-body">
                    <form action="{{route('compatir')}}" method="post" enctype="multipart/form-data">
                        @csrf



                        <div class="form-group row">
                            <label for="image_path" class="col-md-4 col-form-label text-md-right" >Subir Imagen</label>
                            <div class="col-md-6">
                                <input type="file" name="image_path" id="image_path" class="form-control-file" required>
                                
                            </div>
                            @if ($errors->has('image_path'))
                            <span class="invalid-feedback d-block" role="alert">
                                   <strong>{{ $errors->first('image_path') }}</strong>
                                   {{-- <strong>El archivo no corresponde </strong> --}}
                                </span>
                                   @endif
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right" >Descripcion</label>
                            <div class="col-md-6">
                                <textarea name="description" id="description" class="form-control-file" required>
                                </textarea>
                                @if($errors->has('description'))
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{$errors->first('description')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Compartir Imagen
                                </button>
                            </div>
                        </div>
            

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


