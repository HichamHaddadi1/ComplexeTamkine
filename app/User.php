<?php





namespace App;





use Illuminate\Contracts\Auth\MustVerifyEmail;


use Illuminate\Foundation\Auth\User as Authenticatable;


use Illuminate\Notifications\Notifiable;





class User extends Authenticatable{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','nom','prenom', 'email', 'tel','password','region_id','role','num_edition', 'date_de_naissance' , 'university' ,
        'niveau', 'filiere' , 'formation' , 'etablissement' , 'type'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    // protected function region(){
    //     return $this->belongsTo("App\Region");
    // }


    public function salle(){
        return $this->hasOne(Salle::class, 'user_id');
    }


    public function region(){
        return $this->belongsTo(Region::class,'region_id');
    }

    public function edition(){
        return $this->belongsTo(Edition::class,'num_edition');
    }

}


