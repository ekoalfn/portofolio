<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Contracts\Activity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Spatie\Activitylog\Traits\LogsActivity;

class Permission extends Model
{
    use HasFactory;
    // use LogsActivity;

    protected  $guarded = [];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name']);
        // Chain fluent methods for configuration options
    }

    // public function tapActivity(Activity $activity, string $eventName){
    //     switch($eventName){
    //         case 'created':
    //             $activity->description = "create permission";
    //             break;
    //         case 'updated':
    //             $activity->description = "update permission";
    //             break;
    //         case 'deleted':
    //             $activity->description = "delete permission";
    //             break;
    //     }
    // }
}
