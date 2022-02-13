<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function relationtocategory()
    {
        return $this->hasOne(Category::class, 'id','category_id');
    }
}
