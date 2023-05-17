<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use App\Models\Factory;
use App\Models\Commodity;
use Illuminate\Support\Facades\Auth;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('delete-factory', function (?User $user, ?Factory $factory) {
            if(Auth::check()) {
                if ($user->role == 'superadmin') {
                    return true;
                }
                if ($factory->user_id == $user->id) {
                    return true;
                }
            }
            return false;
        });
        Gate::define('edit-factory', function (?User $user, ?Factory $factory) {
            if(Auth::check()) {
                if ($user->role == 'superadmin' or $user->role == 'editor') {
                    return true;
                }
                if ($factory->user_id == $user->id) {
                    return true;
                }
            }
            return false;
        });
        Gate::define('delete-commodity', function (?User $user, ?Commodity $commodity) {
            if ($user->role == 'superadmin') {
                return true;
            }
            if ($commodity->user_id == $user->id){
                return true;
            }
            return false;
        });
        Gate::define('edit-commodity', function (?User $user, ?Commodity $commodity) {
            if ($user->role == 'superadmin' or $user->role == 'editor') {
                return true;
            }
            if ($commodity->user_id == $user->id){
                return true;
            }
            return false;
        });
    }
}
