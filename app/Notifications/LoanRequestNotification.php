<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LoanRequestNotification extends Notification
{
    use Queueable;
    public $data;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject($this->data['name'].' '.$this->data['loan_type'].' Loan Request')
                    ->line($this->data['msg'])
                    ->line('Borrowed Amount: K'.$this->data['amount'])
                    ->line('Payback Amount: K'.$this->data['payback'])
                    ->line('Due Date: K'.$this->data['due_date'])
                    ->line('Repayment Plan: '.$this->data['duration'].' Months')
                    ->action('View Loan Statement', url('/client-loan-requests'))
                    ->line('Thanks');
    }
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'name' => $this->data['name'],
            'msg' => $this->data['msg'],
            'type' => $this->data['type'],
            'user_id' => $this->data['user_id'],
            'application_id' => $this->data['application_id']
        ];
    }
}
