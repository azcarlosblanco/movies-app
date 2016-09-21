<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Hierarchy values for admin, premum and user
     *
     * @var array
     */
    protected $hierarchy = [
      'admin'  => 3,
      'premium' => 2,
      'member'   => 1,
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $gate->define('see-movie', function($user, $movie) {
            return  $this->checkRoles($user, $movie->visibility);
        });

        $gate->define('access', function($user, $role) {
            return $this->checkRoles($user, $role);
        });
    }

    /**
     * Check if current user role let him to update a post
     *
     * @param  \App\User  $User
     * @param  string  $requiredRole
     * @return boolean
     */
    public function checkRoles($user, $requiredRole)
    {
        return $this->hierarchy[$user->type] >= $this->hierarchy[$requiredRole];
    }
}
