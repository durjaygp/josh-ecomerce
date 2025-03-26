<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Video extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function category(): BelongsTo
    {
        return $this->belongsTo(VideoCategory::class,'video_category_id');
    }
}
