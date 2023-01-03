<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


     // User has one freelaner profile
     public function freelancer()
     {
         return $this->hasOne(Freelancer::class, 'user_id', 'id')
             ->withDefault();
     }
 
     public function projects()
     {
         return $this->hasMany(Project::class, 'user_id', 'id');
     }

     public function image()
     {
         return $this->morphOne(Image::class, 'imageable');
     }

     protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: function() {
                $src = 'https://ui-avatars.com/api/?background=random&name='.$this->name;
                if($this->image) {
                    $src = asset('storage/'.$this->image->path);
                }

                return $src;
            },
        );
    }
 
}
