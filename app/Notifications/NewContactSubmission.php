<?php

namespace App\Notifications;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewContactSubmission extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(public Contact $contact) {}

    /**
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $message = (new MailMessage)
            ->subject($this->subject())
            ->greeting('Nieuw contactbericht')
            ->line('Type: '.ucfirst($this->contact->type))
            ->line('Naam: '.$this->contact->name)
            ->line('E-mail: '.$this->contact->email);

        if ($this->contact->phone) {
            $message->line('Telefoon: '.$this->contact->phone);
        }

        $message->line('Onderwerp: '.$this->contact->subject);

        if ($this->contact->quantity) {
            $message->line('Aantal: '.$this->contact->quantity);
        }

        $message->line('Bericht: '.($this->contact->message ?: '-'));

        return $message;
    }

    private function subject(): string
    {
        return $this->contact->type === Contact::TYPE_DRUKWERK
            ? 'Nieuwe offerteaanvraag (drukwerk)'
            : 'Nieuw contactbericht (lavir)';
    }
}
