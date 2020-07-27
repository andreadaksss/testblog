<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{

    protected $table = "posts";

    public function user(){
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
		'post_title', 'post_content',
	];
}
