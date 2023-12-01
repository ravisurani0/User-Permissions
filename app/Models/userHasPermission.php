<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class userHasPermission extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "permission_table_id",
        "permission_key",
        "index",
        "show",
        "store",
        "create",
        "update",
        "edit",
        "destroy",
    ];
    public function PermissionTable()
    {
        return  $this->belongsTo(PermissionTable::class, 'permission_table_id', 'id');
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
