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
        $this->app->bind(
            \App\Contracts\CategoryRepositoryContract::class,
            \App\Repositories\Category\EloquentCategoryRepository::class
        );
        $this->app->bind(
            \App\Contracts\TypeRepositoryContract::class,
            \App\Repositories\Type\EloquentTypeRepository::class
        );
        $this->app->bind(
            \App\Contracts\TagRepositoryContract::class,
            \App\Repositories\Tag\EloquentTagRepository::class
        );
        $this->app->bind(
            \App\Contracts\FileRepositoryContract::class,
            \App\Repositories\File\EloquentFileRepository::class
        );
    }
}
