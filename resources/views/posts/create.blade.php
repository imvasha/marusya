@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Создание поста</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form id="logout-form" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="inputGroupSelect01">Категория</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="category_id">
                            @if (old('category_id'))
                          <option value="{{old('category_id')}}">Последняя выбранная</option>
                            @else
                                <option selected>Выберите...</option>
                            @endif
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                      </div>

                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">Название</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Название поста" aria-label="Название поста" aria-describedby="basic-addon1" name="name" autocomplete="off" value="{{old('name')}}">
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">Описание</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Короткое описание (необязательно)" aria-label="Короткое описание (необязательно)" aria-describedby="basic-addon1" name="comment" autocomplete="off" value="{{old('comment')}}">
                      </div>

                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Пост</span>
                        </div>
                        <textarea class="form-control" aria-label="With textarea" name="description" autocomplete="off" value="{{old('description')}}"></textarea>
                      </div>

                      <div class="form-group form-check mt-2">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" value="0" name="confirmed">
                        <label class="form-check-label" for="exampleCheck1">Черновик</label>
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
                        <button class="btn btn-outline-primary btn-block" type="submit">Создать</button>
                    </div>


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
