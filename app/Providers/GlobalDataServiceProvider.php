<?php

namespace App\Providers;

use App\Models\GeneralSettings;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class GlobalDataServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Avoid issues when running artisan commands (before DB is ready)
        if (!app()->runningInConsole()) {
            $settings = GeneralSettings::first();
            View::share('generalSettings', $settings);
        }
    }
}
