<?php

namespace App\Providers;

use Illuminate\Support\Facades\Queue;
use Illuminate\Support\ServiceProvider;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Queue\Events\JobProcessing;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //


        //任务失败事件
//        Queue::failing(function (JobFailed $event) {
//            // $event->connectionName
//            // $event->job
//            // $event->exception
//        });

        // 使用队列的 before 和 after 方法，你能指定任务处理前和处理后的回调处理。
        //在这些回调里正是实现额外的日志记录或者增加统计数据的好时机。通常情况下，你应该在 服务容器 中调用这些方法。

//        Queue::before(function (JobProcessing $event) {
//            // $event->connectionName
//            // $event->job
//            // $event->job->payload()
//        });
//
//        Queue::after(function (JobProcessed $event) {
//            // $event->connectionName
//            // $event->job
//            // $event->job->payload()
//        });


        //在 队列 facade 中使用 looping 方法，你可以尝试在队列获取任务之前执行指定的回调方法。举个例子，你可以用闭包来回滚之前已失败任务的事务。

//        Queue::looping(function () {
//            while (DB::transactionLevel() > 0) {
//                DB::rollBack();
//            }
//        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //开发专用的 provider 绝不在 config/app.php 里面注册
        //必须 在 app/Providers/AppServiceProvider.php 文件中使用如以下方式

        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }
}
