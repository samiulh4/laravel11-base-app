<?php

namespace App\Modules\Document\Models;

use Illuminate\Database\Eloquent\Model;

class ChunkUpload extends Model
{
    protected $table = 'chunk_uploads';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}
