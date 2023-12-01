<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Tags\HasTags;

class Bookmark extends Model
{
    use HasFactory, HasTags;
    protected $fillable = ['title', 'uri', 'description', 'private'];

    protected static function booted(){

      static::creating(function($model){
        if ( $model->private == null ) {
          $model->private = 0;
        }
      });

      static::updating(function($model){
        if ( $model->private == null ) {
          $model->private = 0;
        }
      });

    }

    public function scopePublic(Builder $query): void {
      $query->where('private', 0);
    }
}
