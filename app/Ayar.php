<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ayar extends Model
{
    //
    protected $table = "ayarlar";

    protected $fillable = ["name","value"];
}
