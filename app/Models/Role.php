<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Role extends Model
{
    protected $table = 'roles';
    use HasFactory;
    protected $fillable = [
        "name",
        "key",
    ];

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::created(function ($user) {
    //         $user->logActivity('created');
    //     });

    //     static::updated(function ($user) {
    //         $user->logActivity('updated');
    //     });

    //     static::deleted(function ($user) {
    //         $user->logActivity('deleted');
    //     });
    // }

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

    public function permissionTables()
    {
        return $this->belongsToMany(PermissionTable::class, roleHasPermissions::class,);
        // ->withPivot([
        //     "index",
        //     "show",
        //     "store",
        //     "create",
        //     "update",
        //     "edit",
        //     "destroy",
        // ]);
    }
    
    public function roleHasPermissions()
    {
        return $this->hasMany(roleHasPermissions::class, 'role_id', 'id');
    }

    // 
    public function permissions()
    {
        return $this->hasManyThrough(Permission::class, RoleHasPermission::class, 'role_id', 'permission_table_id');
    }

    // check Roll Has Permission
    public function checkRollHasPermission($userId = null, $key, $actions)
    {
        $actionList = [];
        foreach ($actions as $action) {
            array_push($actionList, [$action => 1]);
        }

        if (!$userId) {
            $userId = auth()->user()->id;
        }
        return roleHasPermissions::where([['role_id', $userId], ['permission_key', $key]])->where([$actionList])->exists();
    }

    public function users()
    {
        return $this->belongsToMany(User::class, UserHasRole::class, 'role_id', 'user_id');
    }
}
