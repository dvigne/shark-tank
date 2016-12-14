<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use uuid;
class Grades extends Model
{
  public $incrementing = false;
  protected static function boot()
  {
      parent::boot();
      static::creating(function ($model) {
          $model->{$model->getKeyName()} = Uuid::generate()->string;
      });
  }

  protected $fillable = ['user_id', 'assignment_id', 'grade', 'attempts'];

  protected $hidden = ['user_id', 'assignment_id', 'grade', 'attempts'];
}
