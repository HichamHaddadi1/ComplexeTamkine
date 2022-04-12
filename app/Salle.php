<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salle extends Model
{
    protected $fillable = [
        "id",
        "nom",
        "description",
        "stand",
        "lien_video",
        "user_id",
        "created_at",
        "updated_at",
        "is_running"
    ];

    public function user(){
        return $this->belongsTo("App\User");
    }
}
