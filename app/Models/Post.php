<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'post';

    protected $fillable = ['title', 'content'];

    public function image(){
        return $this->hasMany(Image::class);
    }
}
