<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeviceToken extends Model
{
    protected $fillable = ['token_device', 'device_type'];
}
