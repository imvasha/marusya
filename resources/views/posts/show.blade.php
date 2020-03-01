@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card text-center">
                <div class="card-header">
                    <div class="d-flex">
                        <div class="p-2 mr-auto"><h3>{{$post->name}}</h3></div>
                        <div class="p-2"><a href="{{ route('posts.edit',[$post->id]) }}" class="btn btn-warning active" role="button" aria-pressed="true">Редактировать</a></div>
                        <div class="p-2"><a href="{{ route('posts.create') }}" class="btn btn-primary active" role="button" aria-pressed="true">Добавить пост</a></div>
                        <div class="p-2"><a href="{{ route('posts.index') }}" class="btn btn-secondary active" role="button" aria-pressed="true">Назад</a>
                      </div>
                </div>
            </div>
                <div class="card-body">
                    @if ($post->url)
                        <div class="row">
                            <div class="col-12">
                                <img src="{{ asset('storage/' . $post->url) }}" alt="" class="img-thumbnail">
                            </div>
                        </div>
                    @endif
                    <h5 class="card-title">{{$post->comment}}</h5>
                    <p class="card-text" style="white-space: pre-wrap;">{{$post->description}}</p>
                </div>
                <div class="card-footer text-muted">
                    {{ $post->created_at->diffForHumans() }}
                </div>
            </div>

                {{-- <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
                    </div>
                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="{{$post->slug}}">
                    </div>

                @if ($post->fotos->count())
                    @foreach ($post->fotos as $foto)
                    <div class="row">
                        <div class="col-12">
                            <img src="{{ asset('storage/' . $foto->url) }}" alt="" class="img-thumbnail">
                        </div>
                    </div>
                    @endforeach
                @endif

                <form action="{{route('fotos.create')}}" method="get">
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                    <button class="btn btn-warning btn-sm active ml-1">Добавить фото</button>

                </form> --}}
            </div>
        </div>
    </div>
</div>
@endsection
