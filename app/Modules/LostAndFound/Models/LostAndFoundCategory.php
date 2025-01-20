<?php

namespace App\Modules\LostAndFound\Models;

use Illuminate\Database\Eloquent\Model;

class LostAndFoundCategory extends Model
{
    protected $table = 'lost_and_found_categories';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}
