<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable=[
        'book_name',
        'book_lname',
        'book_email',
        'book_contact',
        'book_from',
        'book_to',
        'adult_number',
        'child_number',
        'book_room',
        'book_status',
        'book_service',
        'booking_date',
        'booking_price',
        'service_price',
        'booking_total'];
}
