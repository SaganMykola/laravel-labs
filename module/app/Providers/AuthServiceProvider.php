<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use App\Models\Student;
use App\Models\Progress;

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
        Gate::define('delete-student', function (?User $user, ?Student $student) {
                if ($user->role == 'superadmin' or $user->role == 'editor') {
                    return true;
                }
                if ($student->user_id == $user->id) {
                    return true;
                }
            return false;
        });
        Gate::define('edit-factory', function (?User $user, ?Student $student) {
                if ($user->role == 'superadmin' or $user->role == 'editor') {
                    return true;
                }
                if ($student->user_id == $user->id) {
                    return true;
                }
            return false;
        });
        Gate::define('delete-progress', function (?User $user, ?Progress $progress) {
            if ($user->role == 'superadmin' or $user->role == 'editor') {
                return true;
            }
            if ($progress->user_id == $user->id){
                return true;
            }
            return false;
        });
        Gate::define('edit-progress', function (?User $user, ?Progress $progress) {
            if ($user->role == 'superadmin' or $user->role == 'editor') {
                return true;
            }
            if ($progress->user_id == $user->id){
                return true;
            }
            return false;
        });
    }
}
