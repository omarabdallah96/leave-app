<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
	{
		$this->app->bind(
			'Illuminate\Auth\Access\Gate',
		);
	}


    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
