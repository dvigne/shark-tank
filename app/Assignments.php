<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Uuid;
class Assignments extends Model
{
  // Disable Auto_Incrementing Values For The Model in The ID Column
  public $incrementing = false;
  protected static function boot()
  {
   parent::boot();
   static::creating(function ($model) {
       $model->{$model->getKeyName()} = Uuid::generate()->string;
   });
  }

  protected $fillable = ['creator_id', 'name', 'available', 'due', 'allowed_attempts'];
}
