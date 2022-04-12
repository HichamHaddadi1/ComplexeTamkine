<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edition extends Model
{
    protected $fillable = [
        "id",
        "titre",
        "slug",
        "description",
        "date_debut",
        "date_fin"
    ];

}
