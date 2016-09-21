<?php

namespace App\Entities;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Gregwar\Image\Image;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Movie extends Entity
{
    use Sluggable, SluggableScopeHelpers;

    protected $fillable = ['title', 'resume', 'category_id', 'visibility', 'image_path'];


    /**
    * Return the sluggable configuration array for this model.
    *
    * @return array
    */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    /**
     * Get the categories for the movies.
     */
    public function category()
    {
        return $this->belongsTo('App\Entities\Category');
    }

    /**
     * Get the links for the movies.
     */
    public function links()
    {
        return $this->hasMany('App\Entities\Link');

    }

    /**
     * File handdler.
     *
     * @param  string  $value
     * @return string
     */
    public function setImagePathAttribute($value)
    {
        if (! empty($value)) {

            $time = time();
            $originalSizeName = 'original_size_' . $time . '_' . $value->getClientOriginalName();
            $mediumSizeName = 'medium_size_' . $time . '_' . $value->getClientOriginalName();
            $littleSizeName = 'little_size_' . $time . '_' . $value->getClientOriginalName();

            $this->attributes['image_path'] = $time . '_' . $value->getClientOriginalName();
            Storage::disk('local')->put($originalSizeName, File::get($value));


            Image::open(public_path() . '/resources/images/' . $originalSizeName)
                ->zoomCrop(287, 412)
                ->save(public_path() . '/resources/images/' . $mediumSizeName);

            Image::open(public_path() . '/resources/images/' . $originalSizeName)
                ->zoomCrop(183, 276)
                ->save(public_path() . '/resources/images/' . $littleSizeName);
        }
    }

    public function scopeSearch($query, $title)
    {
      return $query->where('title', 'LIKE', "%$title%");
    }
}
