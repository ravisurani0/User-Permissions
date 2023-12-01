<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PermissionTable extends Model
{
    use HasFactory;
    protected $table = 'permission_tables';

    protected $fillable = [
        'name',
        'key',
    ];
    public function users()
    {
        return $this->belongsToMany(users::class, userHasPermission::class, 'permission_table_id', 'user_id');
    }


    public function roles()
    {
        return $this->hasMany(Role::class, roleHasPermissions::class, 'permission_table_id', 'role_id');
    }

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
}
