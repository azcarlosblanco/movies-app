<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    /**
     * Get the movies for the categories.
     */
    public function movies()
    {
        return $this->hasMany('App\Entities\Category');
    }
}
