<?php
namespace App\Entities;
use Illuminate\Database\Eloquent\Model;

/**
 * Entitie::class
 */
class Entity extends Model
{
  public static function getClass()
  {
    return get_class(new static);
  }

}
