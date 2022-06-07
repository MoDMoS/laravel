<?php

namespace Modules\Test\Http\Middleware;

use Closure;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /*
         *
         * Module Menu for Admin Backend
         *
         * *********************************************************************
         */
        \Menu::make('admin_sidebar', function ($menu) {

            // Test
            $menu->add('<i class="nav-icon"></i> testing', [
                'route' => 'backend.test.index',
                'class' => 'nav-item',
            ])
            ->data([
                'order'         => 80,
                'activematches' => ['admin/test*'],
                'permission'    => [],
            ])
            ->link->attr([
                'class' => 'nav-link',
            ]);
        })->sortBy('order');

        return $next($request);
    }
}
