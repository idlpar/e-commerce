<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendOtpNotification extends Notification
{
    use Queueable;

    protected $otp;  // Store the OTP here

    /**
     * Create a new notification instance.
     *
     * @param string $otp The OTP to send to the user
     */
    public function __construct($otp)
    {
        // Assign the OTP to the class property
        $this->otp = $otp;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Your OTP Code')  // Custom email subject
            ->line('Your OTP for registration is: ' . $this->otp)  // Include the OTP
            ->line('This OTP will expire in 5 minutes.')
            ->line('If you did not request this, please ignore this email.')
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'otp' => $this->otp,  // Optionally store OTP data here
        ];
    }
}
