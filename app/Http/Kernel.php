<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

//在 「HTTP 内核」 内它定义了 中间件 相关数组；在 「Illuminate\Foundation\Http\Kernel」 类内部定义了属性名为 「bootstrappers」 的 引导程序 数组。
//
//中间件 提供了一种方便的机制来过滤进入应用的 HTTP 请求。
//「引导程序」 包括完成环境检测、配置加载、异常处理、Facades 注册、服务提供者注册、启动服务这六个引导程序。

//所有 「引导程序」列表功能如下：
//
//IlluminateFoundationBootstrapLoadEnvironmentVariables : 环境检测，通过 DOTENV 组件将 .env 配置文件载入到 $_ENV 变量中；
//IlluminateFoundationBootstrapLoadConfiguration : 加载配置文件，这个我们刚刚分析过；
//IlluminateFoundationBootstrapHandleExceptions ： 异常处理；
//IlluminateFoundationBootstrapRegisterFacades ： 注册 Facades，注册完成后可以以别名的方式访问具体的类；
//IlluminateFoundationBootstrapRegisterProviders : 注册服务提供者，我们在 「2.2.1 创建应用实例」已经将基础服务提供者注册到 APP 容器。在这里我们会将配置在 app.php 文件夹下 providers 节点的服务器提供者注册到 APP 容器，供请求处理阶段使用；
//IlluminateFoundationBootstrapBootProviders : 启动服务



class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        \App\Http\Middleware\TrustProxies::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
    ];
}
