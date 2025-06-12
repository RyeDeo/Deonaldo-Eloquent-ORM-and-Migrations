<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Media extends Model
{
    use HasFactory;
    public $timestamps = false; // Disable timestamps to match migration

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'post_id');
    }
}
