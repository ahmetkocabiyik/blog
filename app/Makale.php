<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Makale extends Model
{
    use Sluggable;
    //
    protected $table = "makaleler";

    protected $fillable = ["baslik","slug","icerik","user_id","kategori_id","durum"];

    protected $appends = ["kucuk_resim"];



    public function user()
    {
        return $this->belongsTo("App\User");
    }

    public function kategori()
    {
        return $this->belongsTo("App\Kategori");
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'baslik'
            ]
        ];
    }

    public function resim()
    {
        return $this->morphOne("App\Resim","imageable");
    }

    public function getKucukResimAttribute()
    {
        $resim = asset("uploads/thumb_".$this->resim()->first()->isim);
        return '<img src="'.$resim.'" class="img-thumbnail" width="150" />';
    }
}
