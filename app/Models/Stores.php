<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Stores extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "address",
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
}
