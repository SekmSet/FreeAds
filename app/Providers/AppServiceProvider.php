<?php

namespace App\Providers;

use App\Message;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
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
        // Fix for MySQL < 5.7.7 and MariaDB < 10.2.2
        // https://laravel.com/docs/master/migrations#creating-indexes
        Schema::defaultStringLength(191);
        
        If (env('APP_ENV') !== 'local') {
            $this->app['request']->server->set('HTTPS', true);
        }

        view()->composer('*', function(View $view) {
            $messages = Message::where('repeater_id', Auth::id())->whereNull('read_at');
            $view->with('counter_message', $messages->count());
        });
    }
}
