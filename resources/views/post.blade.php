@extends('layout')

@section('title'){{ $post->post_type->post_type }} {{ $post->name }}@endsection

@section('main')
    <!--<script src="scripts.js"></script>-->
<!-- Modal -->
<div class="modal fade" id="contactsModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Контакты</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" title="Закрыть"></button>
      </div>
      <div class="modal-body">
        <p>{{ $post->contacts }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
      </div>
    </div>
  </div>
</div>

<main class="post pt-5">
    @include('messages')
	<div class="container border rounded shadow-sm w-100">
		<div class="name mt-5 ms-3 align-self-center">
			<h3>{{ $post->name }}</h3>
		</div>
		<div class="post-salary mt-5 me-2 align-self-center">
            @if($post->salary == 0 || $post->salary == NULL)<h3 style="float: right;">Не указано</h3>
                @else<h3 style="float: right;"><span class="salary">{{ $post->salary }}</span></h3>
            @endif
		</div>
		<div class="specifications1 ms-3 align-self-center">
            <p><b>Город:</b> {{ $post->city->city }} ({{ $post->city->region->region }})</p>
			<p><b>Тип:</b> {{ $post->post_type->post_type }}</p>
			<p><b>Категория:</b> {{ $post->category->category }}</p>
		</div>
		<div class="specifications2 align-self-center">
			<p><b>Образование:</b> {{ $post->education->education }}</p>
			<p><b>Опыт работы:</b> {{ $post->work_experience->work_experience }}</p>
			<p><b>График работы:</b> {{ $post->work_schedule->work_schedule }}</p>
		</div>

		<div class="img-post m-5">
			<img src="{{ asset($post->image) }}" class="img-post mx-auto my-auto rounded p-2" alt="post_img">
		</div>
		<div class="author mx-auto" style="text-align: center;">
			<a href="{{ route('profile', $post->user->id) }}" title="{{ $post->user->name }}" class="mx-auto mb-2" style="display: block;">
                <img src="{{ asset($post->user->image) }}" class="img-author" alt="profile">
            </a>
			<a href="{{ route('profile', $post->user->id) }}" title="{{ $post->user->name }}" class="mx-auto">
                <h5><span class="author px-auto mx-auto">{{ $post->user->name }}</span></h5>
            </a>
			<p>Дата регистрации: <span>{{ $post->user->created_at->format('d.m.Y') }}</span></p>
		</div>

		<div class="description ms-3 me-2 bg-light" style="word-wrap: break-word;">
			<p class="text-left">{!! $post->description !!}</p>
		</div>
		<div class="data me-2">
			<p style="float: right;">Дата публикации: <span>{{ $post->created_at->format('d.m.Y H:i') }}</span></p>
		</div>
		<div class="saveornot">
			<!-- 2 knopki -->
		</div>

		<div class="contacts">
			<div class="text-center text-end mb-4">
				@auth()
				<button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#contactsModal">Посмотреть контакты</button>
                @endauth

                @guest()
				<span data-toggle="popover" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top">
	  				<button type="button" disabled class="btn btn-outline-primary">Посмотреть контакты</button>
	  			</span>
	  			@endguest
			</div>
		</div>

        @auth
		<div class="favourites">
			<div class="text-center text-end mb-4">
                @if(Auth::user()->favourite_posts->where('post_id',$post->id)->count() == 0)
				<form method="post" name="addFavourite" action="{{ route('addFavourite', $post->id) }}">
                    @csrf
						<button type="submit" name="addFavourite" class="btn btn-outline-primary">Добавить в избранное</button>
                </form>
                @elseif(Auth::user()->favourite_posts->where('post_id',$post->id)->count() > 0)
                <form method="post" name="deleteFavourite" action="{{ route('deleteFavourite', $post->id) }}">
                    @csrf
                    @method('DELETE')
						<button type="submit" name="deleteFavourite" class="btn btn-outline-primary">Удалить из избранного</button>
                </form>
                @endif
			</div>
		</div>

		<div class="load align-self-center">
			<div class="text-center text-end mb-4">
				<?php if(isset($_SESSION['email']) && (($_SESSION['id'] == $post["userID"]) || ($_SESSION['accessID'] > 1))):?>
				<!--<button type="submit" name="submit" class="btn btn-outline-primary">Загрузить изображение</button>-->
				<label for="load" class="btn btn-outline-primary">
					Загрузить изображение <input type="file" id="load" style="display: none;">
				</label>
				<?php endif;?>
			</div>
		</div>
		<div class="edit">
			<div class="text-center text-end mb-4">
                @if (auth()->user()->can('update', $post))
				    <a class="btn btn-outline-primary" href="{{ route('editPost', $post) }}">Редактировать</a>
                @endif
			</div>
		</div>
		<div class="delete">
			<div class="text-center text-end mb-4">
                @if (auth()->user()->can('delete', $post))
                    <form method="post" name="deletePost" action="{{ route('deletePost', $post) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="delete" class="btn btn-outline-danger delete-btn">Удалить</button>
                    </form>
                @endif
			</div>
		</div>
        @endauth
	</div>
</main>

@endsection
