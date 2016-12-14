<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Uuid;
class Answers extends Model
{
  public $incrementing = false;
  protected static function boot()
  {
   parent::boot();
   static::creating(function ($model) {
       $model->{$model->getKeyName()} = Uuid::generate()->string;
   });
  }
  
  protected $fillable = ['questions_id', 'answer'];

  protected $hidden = ['questions_id', 'answer'];
}
