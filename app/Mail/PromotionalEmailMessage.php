<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PromotionalEmailMessage extends Mailable
{
    use Queueable, SerializesModels;

    public array $data;
    public string $recipient;

    /**
     * Create a new message instance.
     *
     * @param  array  $data
     * @param  string  $recipient
     * @return void
     */
    public function __construct(array $data, string $recipient)
    {
        $this->data = $data;
        $this->recipient = $recipient;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): self
    {
        $message = $this->subject($this->data['subject'])
            ->to($this->recipient)
            ->view('panel.promotional-email.promotional_emails', $this->data);

        if (isset($this->data['attachmentPath'])) {
            $attachmentPath = $this->data['attachmentPath'];
            $message->attachFromStorage($attachmentPath);
        }

        return $message;
    }
}
