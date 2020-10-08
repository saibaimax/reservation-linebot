<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookNotification extends Mailable
{
    use Queueable, SerializesModels;

	protected $bookings;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($bookings)
    {
		$this->bookings = $bookings;
	}

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
		return $this->view('mails.book_notification')
					->subject('今日の予約一覧')
					->with([
						'bookings' => $this->bookings,
						]);
    }
}
