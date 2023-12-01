<?php

namespace App\Providers;

use App\Models\User;
use App\Models\userHasPermission;
use App\Models\UserHasRole;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class PermissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view) {

            $url =   $this->app->request->getRequestUri();

            if (auth()->user() ) {

                $userId = auth()->user()->id;

                $route = collect(Route::getRoutes())->first(function ($route) use ($url) {
                    return $route->matches(request()->create($url));
                })->getName();

                $routekeys =  explode('.', $route);

                // Get User Permissions
                $user =  User::with('roles.roleHasPermissions')->where('id', $userId)->first();
                // // Create User Permissions List
                $permissionList = [];             

                if (isset($user->roles[0]->roleHasPermissions)) {
                    $permissions = $user->roles[0]->roleHasPermissions;
                    foreach ($permissions as $permission) {

                        $permissionList[$permission['permission_key']] = [
                            "permission_table_id" => $permission->permission_table_id,
                            "permission_key" => $permission->permission_key,
                            "index" => $permission->index,
                            "show" => $permission->show,
                            "store" => $permission->store,
                            "create" => $permission->create,
                            "update" => $permission->update,
                            "edit" => $permission->edit,
                            "destroy" => $permission->destroy,
                        ];
                    }
                }
                if (isset($user->permissionTables)) {
                    foreach ($user->permissionTables as $permission) {

                        $permissionList[$permission['permission_key']] = [
                            "permission_table_id" => $permission->permission_table_id,
                            "permission_key" => $permission->permission_key,
                            "index" => $permission->index,
                            "show" => $permission->show,
                            "store" => $permission->store,
                            "create" => $permission->create,
                            "update" => $permission->update,
                            "edit" => $permission->edit,
                            "destroy" => $permission->destroy,
                        ];
                    }
                }
                

                // dd($permissionList);
                if (
                    count($routekeys) == 2
                    && (UserHasRole::where([['user_id', $userId]])->whereHas('PermissionTable', function ($query) use ($routekeys) {
                        return $query->where([['permission_key', $routekeys[0]], [$routekeys[1], 1]]);
                    })->exists()
                        || userHasPermission::where([['user_id', $userId]])->whereHas('PermissionTable', function ($query) use ($routekeys) {
                            return $query->where([['permission_key', $routekeys[0]], [$routekeys[1], 1]]);
                        })->exists()
                    )
                ) {
                    return  $view->with('permissionList', $permissionList);
                } elseif (count($routekeys) == 1 && ($route == 'profile' || $route == 'about' || $route == 'home' || $route == 'unauthorized')) {
                    return  $view->with('permissionList', $permissionList);
                } else {
                    return redirect('/unauthorized')->send();

                    // return redirect('/home');
                    // abort(403, 'Unauthorized action.');
                }

                // return  $view->with('permissionList',   [
                //     "products" => [
                //         "role_id" => 1,
                //         "permission_table_id" => 1,
                //         "permission_key" => "products",
                //         "index" => true,
                //         "show" => true,
                //         "store" => true,
                //         "create" => true,
                //         "update" => true,
                //         "edit" => true,
                //         "destroy" => true,
                //     ],
                //     "stores" => [
                //         "role_id" => 1,
                //         "permission_table_id" => 2,
                //         "permission_key" => "stores",
                //         "index" => true,
                //         "show" => true,
                //         "store" => true,
                //         "create" => true,
                //         "update" => true,
                //         "edit" => true,
                //         "destroy" => true,
                //     ],
                //     "user" => [
                //         "role_id" => 1,
                //         "permission_table_id" => 3,
                //         "permission_key" => "user",
                //         "index" => true,
                //         "show" => true,
                //         "store" => true,
                //         "create" => true,
                //         "update" => true,
                //         "edit" => true,
                //         "destroy" => true,
                //     ],
                //     "employee" => [
                //         "role_id" => 1,
                //         "permission_table_id" => 4,
                //         "permission_key" => "employee",
                //         "index" => true,
                //         "show" => true,
                //         "store" => true,
                //         "create" => true,
                //         "update" => true,
                //         "edit" => true,
                //         "destroy" => true,
                //     ],
                //     "permission-table" => [
                //         "role_id" => 1,
                //         "permission_table_id" => 5,
                //         "permission_key" => "permission-table",
                //         "index" => true,
                //         "show" => true,
                //         "store" => true,
                //         "create" => true,
                //         "update" => true,
                //         "edit" => true,
                //         "destroy" => true,
                //     ],
                //     "user-permeations" => [
                //         "role_id" => 1,
                //         "permission_table_id" => 6,
                //         "permission_key" => "user-permeations",
                //         "index" => true,
                //         "show" => true,
                //         "store" => true,
                //         "create" => true,
                //         "update" => true,
                //         "edit" => true,
                //         "destroy" => true,
                //     ],
                //     "role-permeations" => [
                //         "role_id" => 1,
                //         "permission_table_id" => 6,
                //         "permission_key" => "role-permeations",
                //         "index" => true,
                //         "show" => true,
                //         "store" => true,
                //         "create" => true,
                //         "update" => true,
                //         "edit" => true,
                //         "destroy" => true,
                //     ],
                // ]);
            } else if (auth()->user()) {
                return  $view->with('permissionList', null);
            } else {

                // dd(Auth::check(), '123');
                if ($url != "/login" && $url != "/register") {
                    return redirect('/login')->send();
                }
            }
        });
    }
}
