@extends('layouts.welcome')

@section('content')
<div class="row">
  <div class="col-md-12">
  {{-- <h2 class="mb-3">#{{$post->name}}</h2> --}}
  <p>
        @if ($post->url)
            <img src="{{ asset('storage/' . $post->url) }}" class="img-fluid" alt="">
        @else
            <img src="https://c.wallhere.com/photos/26/e7/diyemedim_ya_la-14708.jpg!d" class="img-fluid" alt="">
        @endif
    </p>
  <h2 class="mb-3">#{{$post->name}}</h2>
  <p style="white-space: pre-wrap;">{{$post->description}}</p>
    {{-- <div class="tag-widget post-tag-container mb-5 mt-5">
      <div class="tagcloud">
        <a href="#" class="tag-cloud-link">Life</a>
        <a href="#" class="tag-cloud-link">Sport</a>
        <a href="#" class="tag-cloud-link">Tech</a>
        <a href="#" class="tag-cloud-link">Travel</a>
      </div>
    </div> --}}

    <div class="about-author d-flex pt-5">
      <div class="bio align-self-md-center mr-4">
        <img src="https://i.pinimg.com/originals/50/f6/a7/50f6a7c052e04eed2f2deee9736c7077.jpg" alt="Image placeholder" class="img-fluid mb-4">
      </div>
      <div class="desc align-self-md-center">
        <h3>Тут все об авторе Марусеньке</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
      </div>
    </div>


    <div class="pt-5 mt-5">
      <h3 class="mb-5">Комментарии ({{$post->comments->count()}} шт.)</h3>
      <ul class="comment-list">
          @forelse ($post->comments as $comment)
          <li class="comment">
            <div class="vcard bio">
              <img src="https://cdn.pixabay.com/photo/2016/10/10/01/49/comment-1727483_960_720.png" alt="Image placeholder">
            </div>
            <div class="comment-body">
            <h3>{{$comment->your_name}}</h3>
              <div class="meta">{{$comment->created_at}}</div>
              {{-- <div class="meta">June 27, 2018 at 2:21pm</div> --}}
              <p>{{$comment->comment}}</p>
              {{-- <p><a href="#" class="reply">Reply</a></p> --}}
            </div>
          </li>
          @empty
              <p>Пока нет комментариев</p>
          @endforelse
      </ul>
      <!-- END comment-list -->

      <div class="comment-form-wrap pt-5">
        <h3 class="mb-5">Оставить комментарий</h3>

        <form action="{{ route('comments.store') }}" class="bg-light p-4" method="post">
            @csrf
        <input type="hidden" name="post_id" value="{{$post->id}}">
          <div class="form-group">
            <label for="name">Введите ваше имя *</label>
            <input type="text" class="form-control" id="your_name" name="your_name" value="{{old('your_name')}}">
          </div>
          <div class="form-group">
            <label for="description">Введите ваш email (необязательно)</label>
            <input type="text" class="form-control" id="description" name="description" value="{{old('description')}}">
          </div>

          <div class="form-group">
            <label for="message">Комментарий *</label>
            <textarea name="comment" id="message" cols="30" rows="5" class="form-control">{{old('comment')}}</textarea>
          </div>

          {{-- <div class="form-group">
            <label for="message">Комментарий *</label>
            <textarea class="form-control" aria-label="With textarea" name="comment" autocomplete="off" value="{{old('comment')}}"></textarea>
          </div> --}}

          <div class="form-group">
            <input type="submit" value="Отправить" class="btn py-3 px-4 btn-primary">
          </div>

        </form>
      </div>
    {{-- </div> --}}
  </div> <!-- .col-md-12 -->
@endsection
