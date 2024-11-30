<?php

namespace App\Modules\Notification\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}
