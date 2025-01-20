<?php

namespace App\Modules\LostAndFound\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class LostAndFoundPost extends Model
{
    protected $table = 'lost_and_found_posts';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    protected static function booted()
    {
        static::creating(function ($post) {
            // Generate the slug based on the title before saving
            if (!$post->lost_and_found_slug) {
                $post->lost_and_found_slug = Str::slug($post->lost_and_found_title);
            }
        });

        static::updating(function ($post) {
            // Re-generate the slug when the title changes
            if ($post->isDirty('lost_and_found_title')) {
                $post->lost_and_found_slug = Str::slug($post->lost_and_found_title);
            }
        });
    }
}
