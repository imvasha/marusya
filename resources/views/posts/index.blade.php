@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row d-flex justify-content-between">
                        <div class="ml-3"><strong>Список постов</strong></div>
                        <div class="align-items-end">
                            <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Добавить пост</a>
                            <a href="#" class="btn btn-secondary btn-sm active" role="button" aria-pressed="true">Назад</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Категория</th>
                        <th scope="col">Название</th>
                        <th scope="col">Описание</th>
                        <th scope="col">Черновик</th>
                        <th scope="col">Make it</th>
                        </tr>
                    </thead>
                    @forelse($posts as $post)
                    <tbody>
                        <tr>
                        <th scope="row">{{$post->id}}</th>
                        <th scope="row">{{$post->category->name}}</th>
                        <td><strong><a href="{{ route('posts.show',[$post->id]) }}">{{$post->name}}</a></strong></td>
                        <td>{{$post->comment}}</td>
                        <td>{{$post->confirmed == "1" ? 'Нет' : 'Да'}}</td>
                        <td>
                            <div class="row">
                            <a href="{{ route('posts.edit',[$post->id]) }}" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Редактировать</a>

                            <form action="{{route('posts.destroy',[$post->id])}}" method="POST">

                                @method('DELETE')

                                @csrf

                                <button class="btn btn-danger btn-sm active ml-1">Удалить</button>

                            </form>
                        </div>
                        </td>
                        </tr>
                    </tbody>
                    @empty
                    <tbody>
                    <tr>
                    <th><p>No posts to show</p></th>
                    </tr>
                    </tbody>
                    @endforelse
                    </table>

                    <div class="pagination justify-content-center">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
