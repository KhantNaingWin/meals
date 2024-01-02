<?php

namespace App\Providers;

use App\Interfaces\api\CategoryApiInterface;
use App\Interfaces\api\ProductApiInterface;
use App\Interfaces\CategoryInterface;
use App\Interfaces\ProductInterface;
use App\Repositories\api\CategoryApiRepository;
use App\Repositories\api\ProductApiRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind(
            CategoryInterface::class,
            CategoryRepository::class
        );
        $this->app->bind(
            ProductInterface::class,
            ProductRepository::class
        );
        $this->app->bind(
            CategoryApiInterface::class,
            CategoryApiRepository::class
        );
        $this->app->bind(
            ProductApiInterface::class,
            ProductApiRepository::class
        );
    }
}
