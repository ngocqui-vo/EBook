<?php

namespace App\Mail;

use App\Models\BookPart;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookPartNotification extends Mailable
{
    use Queueable, SerializesModels;
    protected $bookPart;
    /**
     * Create a new message instance.
     */
    public function __construct(BookPart $bookPart)
    {
        $this->bookPart = $bookPart;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Book Part Notification',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {

        // Chuyển đổi biến thành các biến cục bộ trong file view
        // extract(['bookPart' => $bookPart]);

        // Bắt đầu bộ nhớ đệm đầu ra
        // ob_start();

        // Bao gồm nội dung của view
        // $viewContent = view('emails.book_part_notification', ['bookPart' => $this->bookPart]);

        // Lấy nội dung từ bộ nhớ đệm đầu ra
        // $content = ob_get_clean();

        return new Content(
            view: 'emails.book_part_notification'
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
    public function build()
    {
        return $this->view('emails.book_part_notification', ['bookPart' => $this->bookPart]);
    }
}
