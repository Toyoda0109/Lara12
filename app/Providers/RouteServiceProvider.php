<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * 認証後のリダイレクト先
     *
     * @var string
     */
    public const HOME = '/member';

    /**
     * ルート設定
     */
    public function boot()
    {
        $this->routes(function () {
            // web.php を読み込み
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }
}
