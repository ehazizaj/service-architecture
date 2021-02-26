<?php

namespace App\Providers;

use App\ServiceManager\TransactionsTypes;
use App\Repositories\Transactions\Repos\CsvSource;
use App\Repositories\Transactions\Repos\DbSource;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\ServiceProvider;

class TransactionsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TransactionsTypes::class);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     * @throws BindingResolutionException
     */
    public function boot()
    {
        $this->app->make(TransactionsTypes::class)
            ->register("db", new DbSource());
        $this->app->make(TransactionsTypes::class)
            ->register("csv", new CsvSource());
    }
}
