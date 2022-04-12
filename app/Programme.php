<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    protected $fillable = [
        "id",
        "titre",
        "description",
        "num_edition",
        "lien",
        "photo",
        "date"
    ];

    public function edition(){
        return $this->belongsTo(Edition::class,'num_edition');
    }
}
