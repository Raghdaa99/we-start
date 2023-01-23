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

    protected $appends = [
        'image_url'
    ];
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
    public function profile()
    {
        return $this->hasOne(Profile::class, 'user_id', 'id')
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

    public function proposals()
    {
        return $this->hasMany(Proposal::class, 'freelancer_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'freelancer_id', 'id');
    }


    public function getRateAttribute()
    {

        return round($this->reviews->avg('star'), 2);
    }

    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: function () {
                $src = 'https://ui-avatars.com/api/?background=random&name=' . $this->name;
                if ($this->image) {
                    $src = asset('storage/' . $this->image->path);
                }

                return $src;
            },
        );
    }

//    public function getWalletAttribute()
//    {
//
////        return number_format($this->wallet, 2, '.', '');
//        return $this->wallet;
//
//
//    }

    public function proposalsProject()
    {

        return $this->belongsToMany(Project::class,
            Proposal::class,
            'freelancer_id',
            'project_id')->withPivot([
            'description', 'cost', 'duration', 'duration_unit', 'status',
        ]);
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class, 'freelancer_id', 'id');
    }

    public function getCountJobsDoneAttribute()
    {
        return $this->contracts()->where('status', 'completed')->count();
    }

    public function contractedProjects()
    {
        return $this->belongsToMany(
            Project::class,
            'contracts',
            'freelancer_id',
            'project_id'
        )->withPivot([
            'proposal_id', 'cost',
            'type', 'start_on', 'end_on', 'completed_on', 'hours', 'status'
        ]);
    }

    public function sentMessages()
    {
        return $this->hasMany(Message::class, 'user_id', 'id');
    }

    public function receivedMessages()
    {
        return $this->belongsToMany(Message::class, 'recipients')
            ->withPivot([
                'read_at',
            ]);
    }

}
