<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Article extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $fillable = ['title','description'];


    public function getPhotoAttribute()
    {
        return $this->getFirstMediaUrl('article')
            ?  $this->getFirstMediaUrl('article')
            : asset("article.jpeg");
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
