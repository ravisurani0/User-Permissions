<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'last_name', 'email', 'password',
    ];


    public function permissionTables()
    {
        return $this->hasMany(userHasPermission::class)
            // ->withPivot([
            //     "index",
            //     "show",
            //     "store",
            //     "create",
            //     "update",
            //     "edit",
            //     "destroy",
            // ])
        ;
    }

    public function logActivity($action)
    {
        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => $action,
            'model_type' => static::class,
            'model_id' => $this->id,
            'changes' => json_encode($this->getDirty()),
        ]);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, UserHasRole::class, 'user_id', 'role_id');
    }

    //check User Has Permission for route  
    public function checkUserHasPermission($userId = null, $key, $actions )
    {

        $actionList = [];
        // foreach ($actions as $action) {
        //     array_push($actionList, [$action => 1]);
        // }

        if (!$userId) {
            $userId = auth()->user()->id;
        }
        if (
            roleHasPermissions::where([['role_id', $userId], ['permission_key', $key], [$actions, 1]])->exists()
            || userHasPermission::where([['user_id', $userId], ['permission_key', $key], [$actions, 1]])->exists()
        ) {
            return true;
        } else {
            return false;
        }
    }
};
