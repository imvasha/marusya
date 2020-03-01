@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Добавить фото к посту <b>{{$post->name}}</b></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form id="logout-form" action="{{ route('fotos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">Название</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Дать название для фото(необязательно)" aria-label="Дать название для фото(необязательно)" aria-describedby="basic-addon1" name="name" autocomplete="off" value="{{old('name')}}">
                      </div>


                    <input type="hidden" name="post_id" value="{{$post->id}}">

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroupFileAddon01">Загрузка</span>
                        </div>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="file">
                          <label class="custom-file-label" for="inputGroupFile01">Выберите фото</label>
                        </div>
                      </div>

                    <button type="submit" class="btn btn-primary btn-lg btn-block mt-3">Загрузить</button>

                    </div>
                    @error('name') <p style="color:coral" class="ml-3">Введите название категории, минимум 3 символа, должно быть уникальным</p> @enderror
                    </form>


                </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
