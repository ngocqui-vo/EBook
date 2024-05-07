<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\BookPart;
use Illuminate\Bus\Queueable;
use App\Mail\BookPartNotification;
use Illuminate\Queue\SerializesModels;
use App\Notifications\BookPartPublished;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendBookPartNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $bookPart;
    /**
     * Create a new job instance.
     */
    public function __construct(BookPart $bookPart)
    {
        $this->bookPart = $bookPart;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $book = $this->bookPart->book;
        // Lấy danh sách users đã đăng ký cho phần sách
        $subscribedUsers = User::all();

        foreach ($subscribedUsers as $user) {
            // Gửi email cho từng user
            // Example email sending logic
            \Mail::to($user->email)->send(new BookPartNotification($this->bookPart));
        }
    }
}
