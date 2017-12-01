<?php

namespace App\Providers;
use App\Song;
use App\Album;
use App\Artist;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
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
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('crud', function ($user, $song) {
            return $user->id == $song->user_id or $user->role == 'editor' or $user->role == 'admin';

        });
        Gate::define('crud', function ($user, $album) {
            return $user->id == $album->user_id or $user->role == 'editor' or $user->role == 'admin';

        });
        Gate::define('crud', function ($user, $artist) {
            return $user->id == $artist->user_id or $user->role == 'editor' or $user->role == 'admin';

        });
        Gate::define('upload', function ($user) {
            return $user->id == Auth::id() or $user->role == 'editor' or $user->role == 'admin';

        });

        Gate::define('editor', function ($user) {
            return $user->role == 'editor' or $user->role == 'admin';

        });

        Gate::define('admin', function ($user) {
            return  $user->role == 'admin';

        });


    }
}
