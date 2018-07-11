<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class InvoicePaid extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        // return $notifiable->prefers_sms ? ['nexmo'] : ['mail', 'database'];
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
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');


        //错误消息

//        return (new MailMessage)
//            ->error()
//            ->subject('Notification Subject')  // 自定义主题
//            ->line('...');
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

    //toDatabase Vs toArray

    //toArray 方法在 broadcast 频道也用到了，它用来决定广播给 JavaScript 客户端的数据。
    //如果你想在 database 和 broadcast 频道中采用两种不同的数组展示方式，你应该定义 toDatabase 方法而非 toArray 方法。
    /**
     * @param $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {


        // 格式化数据库通知
        return [
            //
        ];
    }

}
