<?php

namespace App\Providers;

use App\Repository\Interfaces\BooksRepositoryInterface;
use App\Repository\Interfaces\BuyerRepositoryInterface;
use App\Repository\Interfaces\UsersRepositoryInterface;
use App\Repository\Model\BooksRepository;
use App\Repository\Model\BuyerRepository;
use App\Repository\Model\UsersRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public $bindings = [

        UsersRepositoryInterface::class => UsersRepository::class,
        BooksRepositoryInterface::class => BooksRepository::class,
        BuyerRepositoryInterface::class => BuyerRepository::class

    ];


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
        //
    }
}
