<?php

namespace App\Providers;

use App\Events\postpublish;
use App\Listeners\postlistner;
use App\Models\blog;
use App\Policies\postpolice;
use Illuminate\Support\Facades\Event;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
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
        Paginator::useBootstrapFive();

        Gate::policy(blog::class, postpolice::class);

        Event::listen(postpublish::class, postlistner::class);
    }
}
