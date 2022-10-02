<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MorphLike extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function likeable()
    {
        return $this->morphTo();
    }
}