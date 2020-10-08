<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Book;
use Carbon\Carbon;
use App\Mail\BookNotification;
use App\Mail\NoBookNotification;
use Illuminate\Support\Facades\Mail;

class SendNoticeMailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:notice_mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '一日の予約を当日の１２時にメール送信。';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
		$todayStart = Carbon::createFromTimeString('18:00:00', 'Asia/Tokyo');
		$todayEnd = Carbon::createFromTimeString('24:00:00', 'Asia/Tokyo');
		$bookings = Book::whereBetween('booking_date', [$todayStart, $todayEnd])->get();
		$to = 'nagainozomi.19350511@gmail.com';
		if ($bookings->isNotEmpty()) {
			Mail::to($to)->send(new BookNotification($bookings));
		} else {
			Mail::to($to)->send(new NoBookNotification());
		}
	}
}
