<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Module;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {

        //users.view

        //Lấy danh sách module
        $modules = Module::all();

        if ($modules->count() > 0) {
            foreach ($modules as $module) {
                Gate::define($module->name, function (User $user) use ($module) {
                    $roleJson = $user->group->permissions;
                    if (!empty($roleJson)) {
                        $RolesArr = json_decode($roleJson, true);
                        $check = isRole($RolesArr, $module->name);
                        return $check;
                    } else {
                        $RolesArr = [];
                    }
                });
            }
        }
        // Gate::define();
    }
}