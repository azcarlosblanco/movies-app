<?php

namespace App\Entities;

class Link extends Entity
{
    protected $fillable = ['server', 'audio', 'quality', 'type', 'link'];

    public function movie()
    {
        return $this->belongsTo('App\Entities\Movie');
    }

}
