<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function index(Request $request, $userId = null)
    {
        $activityLogs = ActivityLog::with('user')->latest();
        if ($userId) {
            $activityLogs = $activityLogs->where("user_id", $userId);
        }
        $activityLogs  = $activityLogs->get();
        
        return view('layouts.activityLogs.index', compact('activityLogs'));
    }
}
