<?php

namespace App\Modules\Notification\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = 'chats';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}
