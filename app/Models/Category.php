<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function relationtouser()
    {
        return $this->hasOne(User::class,'id');
    }

    public function relationtosubcategory()
    {
        return $this->hasMany(Subcategory::class);
    }

    public function relationtoposts()
    {
        return $this->hasMany(Post::class);
    }
}
