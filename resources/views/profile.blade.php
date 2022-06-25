@extends('layout')

@section('title')Профиль {{ $user->name }}@endsection

@section('main')

<main class="profile w-100">
	<div class="container border rounded shadow-sm w-100">
		<div class="img-user mx-auto my-4">
			<span class="mb-2"><img src="{{ asset($user->image) }}" class="img-user" alt="profile"></span>
		</div>
		<div class="info mx-auto" style="text-align: center;">
			<span class="mx-auto"><h3><span class="author px-auto mx-auto">{{ $user->name }}</span></h3></span>
			<p>Дата регистрации: <span>{{ $user->created_at->format('d.m.Y') }}</span></p>
		</div>

		<div class="description mx-4 mt-5 bg-light p-2" style="height:15vh; word-wrap: break-word; overflow: auto;">
			<p class="text-left my-auto">{!! $user->description !!}</p>
		</div>
		<div class="posts mx-4">
			<section class="main-content pt-5">
				<div class="profile-container">
                    @if(count($posts))
					<h3>Последние публикации <span class="badge bg-secondary">{{ $posts->total() }}</span></h3>

                    @foreach($posts as $post)
					<div class="card h-100 shadow my-3">
						<a href="{{ route('post', $post->id) }}" title="{{ $post->name }}" class="">
							<img src="{{ asset($post->image) }}" class="img-post mx-auto my-auto rounded p-2" alt="post">
                            <div class="card-desc p-2">
                                <p><b><i class="fas fa-city opacity-25 me-1"></i>Город:</b> {{ $post->city->city }}</p>
                                <p><b><i class="fas fa-check-double opacity-25 me-2"></i>Тип:</b> {{ $post->post_type->post_type }}</p>
                                <p><b><i class="fas fa-list opacity-25 me-2"></i>Категория:</b> {{ $post->category->category }}</p>
                                <p><b><i class="fas fa-graduation-cap opacity-25 me-1"></i>Образование:</b> {{ $post->education->education }}</p>
                                <p><b><i class="fa-solid fa-chart-line opacity-25 me-2"></i>Опыт:</b> {{ $post->work_experience->work_experience }}</p>
                                <p><b><i class="fas fa-briefcase opacity-25 me-2"></i>График:</b> {{ $post->work_schedule->work_schedule }}</p>
                            </div>
						</a>
						<div class="card-body">
							<div class="row justify-content-between">
								<div class="col-8">
									<a href="{{ route('post', $post->id) }}" title="{{ $post->name }}" class=""><h4>{{ $post->name }}</h4></a>
								</div>
                                <div class="col-3 mx-2">
                                    @if($post->salary == 0)<h4 style="float: right;">Не указано</h4>
                                    @else<h4 style="float: right;"><span class="salary">{{ $post->salary }}</span></h4>
                                    @endif
                                </div>
							</div>

							<div class="row">
								<div class="col-11 post-overflow">
									<p class="text-left my-auto">{{ strip_tags($post->description) }}</p>
								</div>
							</div>

							<div class="row justify-content-between align-items-center">
								<div class="col-7">
									<span class="date">{{ $post->created_at->format('d.m.Y H:i') }} &#8226; {{ $post->category->category }} &#8226; {{ $post->city->city }}</span>
								</div>
								<div class="col-4 mx-2">
									<a href="{{ route('profile', $user->id) }}" title="{{ $post->user->name }}" class="" style="float: right;"><img src="{{ asset($user->image) }}" class="img-author mx-auto my-auto p-2" alt="profile">
                                        <span class="author" style="float: right; margin-top:9px;">{{ $post->user->name }}</span>
                                    </a>
								</div>
							</div>

						</div>
					</div>
                    @endforeach

                    @else
                        <h3 class="text-muted text-center">Публикаций пока нет</h3>
                    @endif

				</div>
				</section>

            {{ $posts->links('vendor.pagination.bootstrap-4') }}
		</div>

        @auth
            <div class="load">
                <div class="text-center text-end mb-4">
                    <?php if(isset($_SESSION['email']) && (($_SESSION['id'] == $user["ID"]) || ($_SESSION['accessID'] > 1))):?>
                    <!--<button type="submit" name="submit" class="btn btn-outline-primary">Загрузить изображение</button>-->
                    <label for="load" class="btn btn-outline-primary">
                        Загрузить изображение <input type="file" id="load" style="display: none;">
                    </label>
                    <?php endif;?>
                </div>
            </div>
            <div class="edit">
                <div class="text-center text-end mb-4">
                    @if (auth()->user()->can('update', $user))
                        <a class="btn btn-outline-primary" href="{{ route('editUser', $user) }}">Редактировать</a>
                    @endif
                </div>
            </div>
            <div class="changepass">
                <div class="text-center text-end mb-4">
                    <?php if(isset($_SESSION['email']) && (($_SESSION['id'] == $user["ID"]) || ($_SESSION['accessID'] > 1))):?>
                    <button type="submit" name="submit" class="btn btn-outline-primary">Сменить пароль</button>
                    <?php endif;?>
                </div>
            </div>
            <div class="delete">
                <div class="text-center text-end mb-4">
                    @if (auth()->user()->can('delete', $user) && !$user->hasRole('admin'))
                    <form method="post" name="deleteUser" action="{{ route('deleteUser', $user) }}">
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
