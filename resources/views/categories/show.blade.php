@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Просмотр категории</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <th scope="row">Ид категории: {{$category->id}}</th><br>
                        <td>Название категории: <strong>{{$category->name}}</strong></td><br>
                        <td>Комментарий: {{$category->comment}}</td><br>
                        <td>Статус категории: {{$category->confirmed}}</td>

                        <p>
                            @if ($category->url)
                            <img src="{{ asset('storage/' . $category->url) }}" class="img-fluid" alt="">
                            @endif
                        </p>



                </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
