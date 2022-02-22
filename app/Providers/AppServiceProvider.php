<?php

namespace App\Providers;

use App\Models\User;

use App\Services\UserService;
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
        Paginator::useBootstrap();

        Gate::define('admin',function (User $user){
            $userRole = new UserService();
            return $userRole->isUserHaveAccess($userRole->admin);
        });

        Gate::define('layanan',function (User $user){
            $userRole = new UserService();
            return $userRole->isUserHaveAccess($userRole->layanan);
        });

        Gate::define('delivery',function (User $user){
            $userRole = new UserService();
            return $userRole->isUserHaveAccess($userRole->delivery);
        });

        Gate::define('harga-regular',function (User $user){
            $userRole = new UserService();
            return $userRole->isUserHaveAccess($userRole->harga_regular);
        });

        Gate::define('harga-corporate',function (User $user){
            $userRole = new UserService();
            return $userRole->isUserHaveAccess($userRole->harga_corporate);
        });

        Gate::define('page',function (User $user){
            $userRole = new UserService();
            return $userRole->isUserHaveAccess($userRole->page);
        });

        Gate::define('corporate',function (User $user){
            $userRole = new UserService();
            return $userRole->isUserHaveAccess(['ROLE_CORPORATE']);
        });
    }
}
