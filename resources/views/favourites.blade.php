@extends('layout')

@section('title')Избранное@endsection

@section('main')
<main>
<section class="main-content pt-5 mt-5">
    <div class="container w-75">
        @if(count($favourites))
      <h3>Избранное <span class="badge bg-secondary">{{ $favourites->total() }}</span></h3>

      <?php
      /*$favourites = mysqli_query($link, "SELECT * FROM favourites WHERE userID = '".$_SESSION['id']."'");
      while($favourite = mysqli_fetch_assoc($favourites))
        {
        $query = "SELECT * FROM posts WHERE published = 1 AND ID = '".$favourite['postID']."' ORDER BY publication_date DESC, ID DESC";
        $result = mysqli_query($link, $query);
        while($post = mysqli_fetch_assoc($result))
        {
          $result2 = mysqli_query($link, "SELECT name, image FROM users WHERE ID = '".$post['userID']."'");
          $user = mysqli_fetch_assoc($result2);*/
      ?>
        @foreach($favourites as $post)
        <div class="card h-100 shadow my-3">
          <a href="{{ route('post', $post->post->id) }}" title="" class="">
            <img src="{{ asset($post->post->image) }}" class="img-post mx-auto my-auto rounded p-2" alt="post">
            <div class="card-desc p-2">
              <p><b><i class="fas fa-city opacity-25 me-1"></i>Город:</b> {{ $post->post->city->city }}</p>
              <p><b><i class="fas fa-check-double opacity-25 me-2"></i>Тип:</b> {{ $post->post->post_type->post_type }}</p>
              <p><b><i class="fas fa-list opacity-25 me-2"></i>Категория:</b> {{ $post->post->category->category }}</p>
              <p><b><i class="fas fa-graduation-cap opacity-25 me-1"></i>Образование:</b> {{ $post->post->education->education }}</p>
              <p><b><i class="fa-solid fa-chart-line opacity-25 me-2"></i>Опыт:</b> {{ $post->post->work_experience->work_experience }}</p>
              <p><b><i class="fas fa-briefcase opacity-25 me-2"></i>График:</b> {{ $post->post->work_schedule->work_schedule }}</p>
            </div>
          </a>
          <div class="card-body">
            <div class="row justify-content-between">
              <div class="col-8">
                <a href="{{ route('post', $post->post->id) }}" title="" class=""><h4>{{ $post->post->name }}</h4></a>
              </div>
              <div class="col-3 mx-2">
                  @if($post->post->salary == 0 || $post->post->salary == NULL)<h4 style="float: right;">Не указано</h4>
                    @else<h4 style="float: right;"><span class="salary">{{ $post->post->salary }}</span></h4>
                  @endif
              </div>
            </div>

            <div class="row">
              <div class="col-11 post-overflow">
                <p class="text-left my-auto">{{ strip_tags($post->post->description) }}</p>
              </div>
            </div>

            <div class="row justify-content-between align-items-center">
              <div class="col-7">
                <span class="date">Добавлено: {{ $post->created_at->format('d.m.Y H:i') }} &#8226; {{ $post->post->category->category }} &#8226; {{ $post->post->city->city }}</span>
              </div>
              <div class="col-4 mx-2">
                <a href="{{ route('profile', $post->post->user->id) }}" class="" style="float: right;">
                    <img src="{{ asset($post->post->user->image) }}" class="img-author mx-auto my-auto p-2" alt="profile">
                <span class="author" style="float: right; margin-top:9px;">{{ $post->post->user->name }}</span></a>
              </div>
            </div>

          </div>
        </div>
        @endforeach

        @else
            <h2 class="text-muted text-center">Тут пока ничего нет</h2>
        @endif

      <?php // } } ?>
    </div>
 </section>

    {{ $favourites->withQueryString()->links('vendor.pagination.bootstrap-4') }}

 </main>
@endsection
