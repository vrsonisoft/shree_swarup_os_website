<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
    use HasFactory;

    protected $fillable = [
        'tutorial_category_id',
        'tutorial_sub_category_id',
        'title',
        'slug',
        'thumbnail',
        'short_description',
        'full_description',
        'video_duration',
        'video_title',
        'youtube_url'
    ];

    public function category()
    {
        return $this->belongsTo(TutorialCategory::class, 'tutorial_category_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(TutorialSubCategory::class, 'tutorial_sub_category_id');
    }


    public function getThumbnailUrlAttribute()
    {
        if ($this->thumbnail) {
            return asset('storage/' . $this->thumbnail);
        }
        return asset('img/logo.png');
    }
}
