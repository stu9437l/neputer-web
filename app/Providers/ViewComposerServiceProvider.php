<?php

namespace App\Providers;

use App\Http\ViewComposers\LayoutComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...
        View::composer(
            [
                'frontend.home.index',
                'frontend.layouts.header',
                'frontend.layouts.footer',
                'frontend.contact-us.index',
                'frontend.career.index',
                'frontend.service.index',
                'frontend.service.detail',
                'frontend.our-team.index',
                'frontend.about-us.index',
                'frontend.blog-category.index',
                'frontend.blog-category.show',
                'frontend.client-review.index',
                'frontend.request-a-quote.index',
                'frontend.development-process.index',
                'frontend.layouts.breadcrumb',
                ],
            LayoutComposer::class
        );
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
