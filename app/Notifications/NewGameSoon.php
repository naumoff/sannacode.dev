<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewGameSoon extends Notification
{
    use Queueable;

    private $matchData;
    
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($matchData)
    {
        $this->matchData = $matchData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
    	$h1 = "new game between:";
    	$h3 = "'".$this->matchData->owner."' - '".$this->matchData->guest."'!";
    	$date = "game starts: ".$this->matchData->game_date;
        return (new MailMessage)
	        ->subject("new game tomorrow!")
	        ->markdown('mail.new-game-soon',[
	        	'h1'=> $h1,
		        'h3'=> $h3,
		        'date'=>$date
	        ]);
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
            //
        ];
    }
}
