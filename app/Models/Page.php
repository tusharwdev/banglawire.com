<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\GuardsAttributes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class Page extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;
    protected $guarded = ['id'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')
            ->singleFile();
    }
    public static function findBySlug($slug){

        return self::where('slug',$slug)->where('status',true)->firstOrFail();
    }
}
