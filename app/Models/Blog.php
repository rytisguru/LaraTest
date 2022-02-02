<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes;
	
	//protected $table = 'my_blogs';
	protected $fillable = ['title', 'body'];
	protected $dates = ['deleted_at'];

	public function category() {
		return $this->belongsToMany(Category::class);
	}
}
