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
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function relationtoposts()
    {
        return $this->belongsTo(Post::class,'id');
    }
}
