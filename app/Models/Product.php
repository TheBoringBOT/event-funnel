<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function PHPUnit\Framework\returnArgument;

class Product extends Model {
	use HasFactory;
	protected $guarded = [];

	//product categories

	public function categories() {
		return $this->belongsToMany( Category::class );
	}

	// Product orders
	public function orders() {
		return $this->belongsToMany( Order::class );
	}
}
