<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorialCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description'];

    public function tutorials()
    {
        return $this->hasMany(Tutorial::class);
    }

    public function subCategories()
    {
        return $this->hasMany(TutorialSubCategory::class, 'tutorial_category_id');
    }
}

