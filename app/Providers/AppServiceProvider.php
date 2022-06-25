<?php

namespace App\Providers;

use App\Models\City;
use App\Models\Region;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $city = City::where('id', '1')->first();
        session([
            'city' => $city
        ]);
        View::share('cities', City::all());
        View::share('regions', Region::all());

        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->subject('Завершение регистрации - FindJob')
                ->line('Добро пожаловать на FindJob.')
                ->line('Для завершения регистрации перейдите по ссылке ниже.')
                ->action('Перейти', $url);
        });
    }
}
