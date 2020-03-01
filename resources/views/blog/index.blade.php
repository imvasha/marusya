@extends('layouts.welcome')

@section('content')



{{-- <div class="row">
    @forelse ($posts as $post)
    <div class="col-md-6">

        <div class="blog-entry ftco-animate">
            <a href="{{ route('showPost',[$post->id]) }}" class="blog-image">
                @if ($post->fotos->count())
                <img src="{{ asset('storage/' . $post->fotos->first()->url) }}" class="img-fluid" alt="">
                @else
                <img src="images/image_1.jpg" class="img-fluid" alt="">
                @endif
            </a>
            <div class="text py-4">
              <div class="meta">
        <div><a href="{{ route('showDate',[$post->created_at->format('Y-m-d')]) }}">{{ $post->created_at->diffForHumans() }}</a></div>
                <div><a href="{{ route('showCat',[$post->category->id]) }}">{{$post->category->name}}</a></div>
              </div>
              <h3 class="heading"><a href="{{ route('showPost',[$post->id]) }}">{{$post->name}}</a></h3>
              <p>{{$post->comment}}</p>
            </div>
        </div>
    </div>
    @empty
        <p>Данная категория пока не имеет постов...</p>
    @endforelse --}}
{{-- @if (isset($cat))
    <h2>Категория: {{$cat}}</h2>
@else
    <h2>Все категории:</h2>
@endif --}}

<div class="row">
    <div class="col-md-6">
        @if ($posts->count() == 0)
        <p>Пока еще нет постов...</p>
        @else
        @foreach ($posts->chunk($posts->count()/2+($posts->count() % 2))->first() as $post)
        <div class="blog-entry ftco-animate">
            <a href="{{ route('showPost',[$post->id]) }}" class="blog-image">
                @if ($post->url)
                <img src="{{ asset('storage/' . $post->url) }}" class="img-fluid" alt="">
                @else
                <img src="https://c.wallhere.com/photos/26/e7/diyemedim_ya_la-14708.jpg!d" class="img-fluid" alt="">
                @endif
            </a>
            <div class="text py-4">
              <div class="meta">
                <div><a href="{{ route('showDate',[$post->created_at->format('Y-m-d')]) }}">{{ $post->created_at->format('Y-m-d') }}</a></div>
                <div><a href="{{ route('showCat',[$post->category->id]) }}">{{$post->category->name}}</a></div>
              </div>
              <h3 class="heading"><a href="{{ route('showPost',[$post->id]) }}">{{$post->name}}</a></h3>
              <p>{{$post->comment}}</p>
            </div>
          </div>

        @endforeach
        @endif

</div>

<div class="col-md-6">
    @if ($posts->count() > 1)
    @foreach ($posts->chunk($posts->count()/2+($posts->count() % 2))->last() as $post)

    <div class="blog-entry ftco-animate">
    <a href="{{ route('showPost',[$post->id]) }}" class="blog-image">
    @if ($post->url)
        <img src="{{ asset('storage/' . $post->url) }}" class="img-fluid" alt="">
    @else
        <img src="https://c.wallhere.com/photos/26/e7/diyemedim_ya_la-14708.jpg!d" class="img-fluid" alt="">
    @endif
    </a>
    <div class="text py-4">
    <div class="meta">
    <div><a href="{{ route('showDate',[$post->created_at->format('Y-m-d')]) }}">{{ $post->created_at->format('Y-m-d') }}</a></div>
    <div><a href="{{ route('showCat',[$post->category->id]) }}">{{$post->category->name}}</a></div>
    </div>
    <h3 class="heading"><a href="{{ route('showPost',[$post->id]) }}">{{$post->name}}</a></h3>
    <p>{{$post->comment}}</p>
    </div>
    </div>
    @endforeach
    @endif
</div>
</div>
{{-- </div> --}}

<div class="pagination justify-content-center">
    {{ $posts->links() }}
</div>


@endsection
