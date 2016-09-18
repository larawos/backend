<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() == 'local') {
            $this->app->register('Larawos\Generators\GeneratorsServiceProvider');
        }
        $this->app->bind(
            \App\Contracts\ArticleRepositoryContract::class,
            \App\Repositories\Article\EloquentArticleRepository::class
        );
        $this->app->bind(
            \App\Contracts\CourseRepositoryContract::class,
            \App\Repositories\Course\EloquentCourseRepository::class
        );
    }
}
