<?php


namespace Modules\User\Providers;

use Illuminate\Routing\Route;
use Illuminate\Support\ServiceProvider;
use Modules\User\Models\User;

class UserServiceProvider extends ServiceProvider {
    public function register(){
        config()->set('auth.providers.users.model' , User::class);
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/User.php');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views', 'User');
    }
}
