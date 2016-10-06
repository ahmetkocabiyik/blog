<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resim extends Model
{
    //
    protected $table = "resimler";

    protected $fillable = ["isim","imageable_id","imageable_type"];
}
