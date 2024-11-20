<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Notification;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share unread notifications with the layout view
        View::composer('Admin.layout.layout', function ($view) {
            $notifications = Notification::where('is_read', false)->get();
            $view->with('notifications', $notifications);
        });
    }
}
