<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Profile;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        try {
            // Share profile data with the main app layout
            View::composer('layouts.app', function ($view) {
                $profile = Profile::first() ?? new Profile();
                $view->with('sharedProfile', $profile);
            });
        } catch (\Exception $e) {
            // This try-catch block prevents errors during artisan commands like migrations
            // before the database table has been created.
            report($e);
        }
    }
}