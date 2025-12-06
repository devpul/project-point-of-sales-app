<?php

use App\Models\ActivityLogs;

function activity_log($activty = null, $userId = null)
{
    ActivityLogs::create([
        'user_id'       =>  $userId,
        'activity_name' =>  $activty,
        'activity_time' =>  now(),
    ]);
}