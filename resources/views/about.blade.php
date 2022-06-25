@extends('layout')

@section('title')О сайте@endsection

@section('main')
    <main class="py-4 mt-5">
        <div class="container">

            @include('messages')
        <style>
            body {
                background: linear-gradient(-45deg, #ffffff, #f5f0f0, #eceff1, #ecf1ee);
                background-size: 400% 400%;
                animation: gradient 15s ease infinite;
                height: 100vh;
            }

            @keyframes gradient {
                0% {
                    background-position: 0% 50%;
                }
                50% {
                    background-position: 100% 50%;
                }
                100% {
                    background-position: 0% 50%;
                }
            }
        </style>
            <h1 class="d-flex flex-column justify-content-center align-items-center mt-3 mb-0">FindJob</h1>
            <div>
                <h2 class="mt-0 mb-3 fw-light">О компании</h2>
                <p>FindJob — это портал по поиску работы и подбору персонала по всей России. Мы создаем передовые
                    технологии на всех доступных платформах для того, чтобы
                    работодатели могли быстро найти подходящего сотрудника, а соискатели — хорошую работу. Наш
                    поиск использует искусственный интеллект, а сайт обрабатывает до 3000 запросов в секунду. Каждый
                    месяц на сайте появляются тысячи вакансий, а технологии для работы с персоналом
                    насчитывают более 30 позиций. Ежегодно мы помогаем сотням тысяч человек изменить свою жизнь к
                    лучшему.</p>
                <p>Наш портал постоянно совершенствуется для удобства пользователей. Каждый день мы ищем новые способы
                    оптимизации работы площадки и внедряем инновационные разработки.</p>
                <h2 class="mt-3 mb-3">Связь с нами</h2>
                <p>Если у Вас есть отзывы, идеи или предложения по развитию сайта, напишите нам по адресу: <a
                        href="mailto:email.321@mail.ru">email.321@mail.ru</a>. Инициативная команда
                    разработчиков FindJob стремится к тому, чтобы сделать каждый клик пользователя портала
                    максимально эффективным и результативным!</p>

                <h2 class="mt-3 mb-3">Наш адрес</h2>
                <p>г. Асбест, ул. Ладыженского, 2.
                    Почтовый индекс — 624260</p>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2172.671010957282!2d61.456152367104096!3d57.00581799045355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x83b7c66bf5bb42b6!2zNTfCsDAwJzIwLjkiTiA2McKwMjcnMjcuNyJF!5e0!3m2!1sru!2sru!4v1655811580589!5m2!1sru!2sru"
                    width="600" height="450" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade" class="w-100 border border-dark"></iframe>
            </div>
        </div>
    </main>

@endsection
