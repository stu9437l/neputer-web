<?php

namespace Neputer\Providers;

use Illuminate\Support\ServiceProvider;
use Neputer\Composers\CountTopicStatusViewComposer;
use Neputer\Composers\LayoutComposer;
use Neputer\Composers\MenuViewComposer;
use Neputer\Composers\NotificationContentComposer;

/**
 * Class ComposerServiceProvider
 * @package Neputer\Providers
 */
class ComposerServiceProvider extends ServiceProvider
{

    protected $menu_view_path = 'admin.layouts.includes.sidebar';
    protected $verified_view_path = 'admin.layouts.master';
    protected $notification_count_path = ['admin.layouts.includes.sidebar','admin.layouts.includes.header'];
    protected $detail_comment_section = 'frontend.category.post-details.index';
    protected $category_load_more_section = 'frontend.category.index';
    protected $search_category_load_more_section = 'frontend.home.includes.common_search';
    protected $admin_header_view_path = 'admin.layouts.includes.header';
    protected $frontend_footer_view_path = 'frontend.layouts.includes.footer';
    protected $frontend_header_view_path = 'frontend.layouts.includes.header';
    protected $login_view_path = 'admin.login*';
    protected $site_profile = '*';

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            [$this->menu_view_path,$this->verified_view_path,],
            MenuViewComposer::class
        );
        view()->composer(
            $this->notification_count_path,
            NotificationContentComposer::class
        );
        view()->composer(
            [$this->detail_comment_section, $this->category_load_more_section, $this->search_category_load_more_section,
                $this->admin_header_view_path,$this->frontend_footer_view_path,$this->frontend_header_view_path,
                $this->login_view_path,$this->site_profile],
            LayoutComposer::class
        );
    }

}
