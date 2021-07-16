<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'matricula',
        'slug',
        'edad',
        'genero',
        'descripcion',
        'status_user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function adminlte_image()
    {
        $imgUser=User::Where('id',Auth::user()->id)->first();
        if(is_null($imgUser->profile_photo_path)){
            return 'https://cdn.pixabay.com/photo/2016/03/27/23/00/weight-lifting-1284616_960_720.jpg';
        }else{
            return '/storage/'.$imgUser->profile_photo_path;
       }
    }

    public function adminlte_desc()
    {
        $imgUser=User::Where('id',Auth::user()->id)->first();
        return $imgUser->name;
    }

    public function adminlte_profile_url()
    {
        return 'user/profile';
    }

        //Relación uno a muchos
        public function inscripciones()
        {
            return $this->hasMany(Inscripciones::class);
        }
        //Relación uno a muchos
        public function redesSociales()
        {
            return $this->hasMany(RedesSociales::class);
        }
        //Relación uno a uno
        public function status_user()
        {
            return $this->belongsTo(StatusUser::class);
        }
        //Relación uno a muchos
        public function anuncios()
        {
            return $this->hasMany(Anuncios::class);
        }
}
