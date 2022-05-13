<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Swiper;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    public function swipers(){
        return $this->hasMany(Swiper::class);
    }
}
