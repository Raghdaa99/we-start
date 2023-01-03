<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Admin extends User
{
    use HasFactory;

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
