<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubCategory extends Model
{
    use HasFactory;

    public function category(){
        return $this->BelongsTo(Category::class);
    }
    public function childCategory(){
        return $this->hasMany(ChildCategory::class);
    }
}
