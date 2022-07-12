<?php

namespace App\Providers;

use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\ProductRepository;
use App\Repositories\Interfaces\AdminRepositoryInterface;
use App\Repositories\AdminRepository;
use Illuminate\Pagination\Paginator;
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
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(AdminRepositoryInterface::class, AdminRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
