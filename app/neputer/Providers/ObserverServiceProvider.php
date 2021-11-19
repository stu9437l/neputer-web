<?php

namespace Neputer\Providers;

use Illuminate\Support\ServiceProvider;
use Neputer\Entities\Ads;
use Neputer\Entities\AdSection;
use Neputer\Entities\Category;
use Neputer\Entities\Fact;
use Neputer\Entities\Page;
use Neputer\Entities\SiteSetting;
use Neputer\Entities\Topic;
use Neputer\Entities\WriterRates;
use Neputer\Entities\WritingRates;
use Neputer\Observers\AdSectionObserver;
use Neputer\Observers\AdsObserver;
use Neputer\Observers\CategoryObserver;
use Neputer\Observers\FactObserver;
use Neputer\Observers\PageObserver;
use Neputer\Observers\RoleObserver;
use Neputer\Observers\SiteSettingObserver;
use Neputer\Observers\TopicObserver;
use Neputer\Observers\UserObserver;
use Neputer\Observers\WriterRatesObserver;
use Neputer\Observers\WritingRatesObserver;
use Neputer\Utils\Acl\Entities\Role;
use App\User;

/**
 * Class ObserverServiceProvider
 * @package App\Providers
 */
class ObserverServiceProvider extends ServiceProvider
{

    public function boot()
    {
        User::observe(UserObserver::class);
        Category::observe(CategoryObserver::class);
        AdSection::observe(AdSectionObserver::class);
        Ads::observe(AdsObserver::class);
        SiteSetting::observe(SiteSettingObserver::class);
        WriterRates::observe(WriterRatesObserver::class);
        WritingRates::observe(WritingRatesObserver::class);
        Topic::observe(TopicObserver::class);
        Fact::observe(FactObserver::class);
        Page::observe(PageObserver::class);
    }

}
