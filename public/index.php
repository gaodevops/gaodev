<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

// 实例化了http内核
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

// 经 handle() 处理后，返回响应
$response = $kernel->handle(

    // 捕获HTTP请求，交给 http内核 handle() 来处理
    $request = Illuminate\Http\Request::capture()
);

// 将响应返回
$response->send();

// 执行 http内核 的terminate()方法
$kernel->terminate($request, $response);


//  这个$kernel->terminate()，其实就是我们文档中，提到的 '可终止的中间件'。每个中间件，都可定义一个:  terminate($request, $response);
// 注意：
//  1.包含 terminate() 的中间件，必须是 HTTP kernel 的 '全局中间件'!!
//  2.当调用中间件上的 terminate() 时，Laravel 将会从服务容器中取出该中间件的新的实例，
//    如果你想要在调用 handle 和 terminate 方法时使用同一个中间件实例，则需要使用容器的 singleton 方法将该中间件注册到容器中


// Illuminate\Foundation\Http\Kernel
// public function terminate($request, $response)
//{
//    $middlewares = $this->app->shouldSkipMiddleware() ? [] : array_merge(
//        $this->gatherRouteMiddlewares($request),     // 路由中的中间件
//        $this->middleware                                // 全局中间件
//    );
//
//    foreach ($middlewares as $middleware) {
//        list($name, $parameters) = $this->parseMiddleware($middleware);
//
//        $instance = $this->app->make($name);          // 重新实例化了 '中间件'，就是文档里说的，handle() 和 terminate() 并非同一个 '中间件类' 的实例
//
//        if (method_exists($instance, 'terminate')) {
//            $instance->terminate($request, $response);   // 调用中间件的 'terminate()'
//        }
//    }
//
//    $this->app->terminate();
//}



// 查看 http内核 文件
// vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php

// 继续我们上面的分析，handle()来处理 http请求
//public function handle($request)
//{
//    try {
//        $request->enableHttpMethodParameterOverride();
//
//        $response = $this->sendRequestThroughRouter($request);       // 处理请求，得到响应
//    } catch (Exception $e) {                                        // PHP5.x异常catch
//        $this->reportException($e);                                  // 异常报告
//
//        $response = $this->renderException($request, $e);            // 异常渲染
//    } catch (Throwable $e) {                                        // PHP7.x异常catch
//        $this->reportException($e = new FatalThrowableError($e));    // 异常报告
//
//        $response = $this->renderException($request, $e);            // 异常渲染
//    }
//
//    // 触发 'kernel.handled'(内核请求处理完毕事件)
//    $this->app['events']->fire('kernel.handled', [$request, $response]);
//
//    // 返回响应对象
//    return $response;
//}
