<?php

namespace App\Listeners;

use App\Events\OrderShipped;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * implements ShouldQueue 事件监听器队列 代表异步监听器
 *
 * Class SendShipmentNotification
 * @package App\Listeners
 */
class SendShipmentNotification
{
    /**
     * 任务应该发送到的队列的连接的名称
     *
     * @var string|null
     */
    public $connection = 'sqs';

    /**
     * 任务应该发送到的队列的名称
     *
     * @var string|null
     */
    public $queue = 'listeners';

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderShipped  $event
     * @return void
     */
    public function handle(OrderShipped $event)
    {
        // 使用 $event->order 来访问 order ...
    }

    /**
     * 处理任务失败
     *
     * @param  \App\Events\OrderShipped  $event
     * @param  \Exception  $exception
     * @return void
     */
    public function failed(OrderShipped $event, $exception)
    {
        //
    }
}
