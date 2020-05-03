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
        If (env('APP_ENV') !== 'local') {
            $this->app['request']->server->set('HTTPS', true);
        }

        view()->composer('*', function(View $view) {
            $messages = Message::where('repeater_id', Auth::id())->whereNull('read_at');
            $view->with('counter_message', $messages->count());
        });
    }
}
