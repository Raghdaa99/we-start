<?php

namespace App\Traits;

trait Trans
{
    public function setNameAttribute()
    {
        $name = [
            'ar' => request()->ar_name,
            'en' => request()->en_name
        ];
        $name = json_encode($name, JSON_UNESCAPED_UNICODE);
        $this->attributes['name'] = $name;
    }

    public function getTransNameAttribute()
    {
        if($this->name) {
            return json_decode( $this->name, true )[app()->getLocale()];
        }

        return $this->name;

    }

    public function getEnNameAttribute()
    {
        if($this->name) {
            return json_decode( $this->name, true )['en'];
        }

        return $this->name;

    }

    public function getArNameAttribute()
    {
        if($this->name) {
            return json_decode( $this->name, true )['ar'];
        }

        return $this->name;
    }

    public function setSmalldescAttribute()
    {
        $smalldesc = [
            'en' => request()->en_smalldesc,
            'ar' => request()->ar_smalldesc
        ];

        $smalldesc = json_encode($smalldesc, JSON_UNESCAPED_UNICODE);

        $this->attributes['smalldesc'] = $smalldesc;
    }

    public function setDescAttribute()
    {
        $desc = [
            'en' => request()->en_desc,
            'ar' => request()->ar_desc
        ];

        $desc = json_encode($desc, JSON_UNESCAPED_UNICODE);

        $this->attributes['desc'] = $desc;
    }



    public function getTransDescAttribute()
    {
        if($this->desc) {
            return json_decode( $this->desc, true )[app()->getLocale()];
        }

        return $this->desc;

    }

    public function getEnDescAttribute()
    {
        if($this->desc) {
            return json_decode( $this->desc, true )['en'];
        }

        return $this->desc;

    }

    public function getArDescAttribute()
    {
        if($this->desc) {
            return json_decode( $this->desc, true )['ar'];
        }

        return $this->desc;
    }


    public function getTransSmalldescAttribute()
    {
        if($this->smalldesc) {
            return json_decode( $this->smalldesc, true )[app()->getLocale()];
        }

        return $this->smalldesc;

    }

    public function getEnSmalldescAttribute()
    {
        if($this->smalldesc) {
            return json_decode( $this->smalldesc, true )['en'];
        }

        return $this->smalldesc;

    }

    public function getArSmalldescAttribute()
    {
        if($this->smalldesc) {
            return json_decode( $this->smalldesc, true )['ar'];
        }

        return $this->smalldesc;
    }

}
