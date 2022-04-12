<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model{
    protected $fillable = [
        "id",
        "nom",
        "description"
    ];

    public function users(){
        return $this->hasMany(User::class);
    }
}


