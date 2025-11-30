<?php

namespace App\Models;

use App\Models\Users;
use Illuminate\Database\Eloquent\Model;

class ActivityLogs extends Model
{
    protected $table = 'activity_logs';

    protected $fillable = [
        'user_id', //fk
        'activity_name',
        'activity_time', //timestamp
    ];

    public $timestamps = false;
    
    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }
}
