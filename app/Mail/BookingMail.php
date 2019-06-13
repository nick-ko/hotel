<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookingMail extends Mailable
{
    use Queueable, SerializesModels;
    public $book_name;
    public $booking_price;
    public $book_from;
    public $book_to;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($book_name,$booking_price,$book_from,$book_to)
    {
        $this->book_name = $book_name;
        $this->booking_price = $booking_price;
        $this->book_to = $book_to;
        $this->book_from = $book_from;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.BookingMailing');
    }
}
