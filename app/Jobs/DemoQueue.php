<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class DemoQueue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
    }

    /**
     * Fail the job from the queue.
     * laravel的队列会在达到最大重试次数还没有处理成功后就会调用这个方法,
     * 所以你可以可以在这个方法里面写发送邮件的逻辑给开发人员发送告警邮件.
     * 这个方法接收一个Exception 类型的参数
     *
     * @param  \Throwable  $exception
     * @return void
     */
//    public function failed(Exception $exception)
//    {
//        //
//    }
}
