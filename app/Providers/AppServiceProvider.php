<?php

namespace App\Providers;

use App\Http\Repositories\Author\AuthorDecorator;
use App\Http\Repositories\Author\AuthorInterface;
use App\Http\Repositories\Category\CategoryDecorator;
use App\Http\Repositories\Category\CategoryInterface;
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
        $this->app->bind(
            AuthorInterface::class,
            AuthorDecorator::class
        );

        $this->app->bind(
            CategoryInterface::class,
            CategoryDecorator::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
