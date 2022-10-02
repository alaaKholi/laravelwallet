<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
  use HasFactory;
  use SoftDeletes;

  public function comments()
  {
    return $this->hasMany(Comment::class, 'post_id', 'id');
  }

  public function likes()

  {

      return $this->hasMany(Like::class, );
  }

  public function users()
  {
    return $this->belongsTo(User::class);
  }

  protected $fillable = [
    'text',
    'user_id',
  ];
}
