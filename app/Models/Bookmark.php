<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;

class Bookmark extends Model
{
    use HasFactory, HasTags;
    protected $fillable = ['title', 'uri', 'description'];
}
