<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {
	use HasFactory;
	protected $guarded = [];

	// User order(s)
	public function user() {
		return $this->belongsToMany( User::class );
	}

	// user orders product(s)
	public function products() {
		return $this->belongsToMany( Product::class )->withPivot( 'quantity' );
	}
}
