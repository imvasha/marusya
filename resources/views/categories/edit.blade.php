@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Изменение категории</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form id="logout-form" action="{{route('categories.update',[$category->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Название</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Название поста" aria-label="Название поста" aria-describedby="basic-addon1" name="name" autocomplete="off" value="{{$category->name}}">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">Описание</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Короткое описание (необязательно)" aria-label="Короткое описание" aria-describedby="basic-addon1" name="comment" autocomplete="off" value="{{$category->comment}}">
                      </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroupFileAddon01">Загрузка</span>
                        </div>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="file">
                          <label class="custom-file-label" for="inputGroupFile01">Выберите фото</label>
                        </div>
                      </div>

                      <div class="input-group-append">
                        <button class="btn btn-outline-primary btn-block" type="submit">Обновить</button>
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
