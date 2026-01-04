<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','title','ingredients','photo_path','description',
                'is_vegetarian',
                'is_vegan',
                'is_halal',
                'recipe_category',
                'is_gluten_free',
                'prep_time_minutes',
                'difficulty',
                'cuisine',
                'occasion',
    ];

    public function User(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
