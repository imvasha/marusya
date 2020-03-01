@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row d-flex justify-content-between">
                        <div class="ml-3"><strong>Список категорий</strong></div>
                        <div class="align-items-end">
                            <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Добавить категорию</a>
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
                        <th scope="col">Name</th>
                        <th scope="col">Comment</th>
                        <th scope="col">Other</th>
                        <th scope="col">Make it</th>
                        </tr>
                    </thead>
                    @forelse($categories as $category)
                    <tbody>
                        <tr>
                        <th scope="row">{{$category->id}}</th>
                        <td><strong><a href="{{ route('categories.show',[$category->id]) }}">{{$category->name}}</a></strong></td>
                        <td>{{$category->comment}}</td>
                        <td>{{$category->confirmed}}</td>
                        <td>
                            <div class="row">
                            <a href="{{ route('categories.edit',[$category->id]) }}" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Редактировать</a>

                            <form action="{{route('categories.destroy',[$category->id])}}" method="POST">

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
                    <th><p>No Categories to show</p></th>
                    </tr>
                    </tbody>
                    @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
