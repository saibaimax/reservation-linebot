<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

	protected $table = 'bookings';

	protected $dates = [
		'booking_date', 'created_at', 'updated_at'
	];

	protected $fillable = [
		'name', 'line_id', 'booking_date', 'booking_number',
	];


}
