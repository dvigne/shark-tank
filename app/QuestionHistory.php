<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Uuid;
class QuestionHistory extends Model
{
  public $incrementing = false;
  protected static function boot()
  {
   parent::boot();
   static::creating(function ($model) {
       $model->{$model->getKeyName()} = Uuid::generate()->string;
   });
  }

  protected $fillable = ['questions_id', 'date_used', 'user_id'];
}
