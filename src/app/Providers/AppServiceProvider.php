<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Post\PostRepositoryInterface;
use App\Infrastructure\Eloquent\PostRepository;
use App\Infrastructure\Eloquent\CommentRepository;
use App\Domain\Comment\CommentRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PostRepositoryInterface::class, PostRepository::class);
        $this->app->bind(CommentRepositoryInterface::class, CommentRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
