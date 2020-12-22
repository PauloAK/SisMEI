<?php

namespace App\Traits;

use Carbon\Carbon;

trait FormatTimestamps
{
    public function getCreatedAtAttribute($value){
        $value = new Carbon($value);
        return $value->format('d/m/Y H:i');
    }

    public function getUpdatedAtAttribute($value){
        $value = new Carbon($value);
        return $value->format('d/m/Y H:i');
    }
}