<?php

namespace App\Providers;

use App\Model\Ads;
use App\Model\OfferType;
use App\Model\OfferTypeProduct;
use App\Model\Product;
use App\Model\ProductSectionType;
use App\Model\Role;
use App\Model\AdsSection;
use App\Model\Attributes;
use App\Model\Category;
use App\Model\Currencies;
use App\Model\Group;
use App\Model\MenuSection;
use App\Model\Pages;
use App\Model\RoleAssign;
use App\Model\Slider;
use App\Model\Tag;
use App\Policies\AdsPolicy;
use App\Policies\AdsSectionPolicy;
use App\Policies\AttributePolicy;
use App\Policies\CategoryPolicy;
use App\Policies\CurrencyPolicy;
use App\Policies\GroupPolicy;
use App\Policies\MenuSectionPolicy;
use App\Policies\OfferTypePolicy;
use App\Policies\OfferTypeProductPolicy;
use App\Policies\PagePolicy;
use App\Policies\ProductPolicy;
use App\Policies\ProductSectionTypePolicy;
use App\Policies\RoleAssignPolicy;
use App\Policies\RolePolicy;
use App\Policies\SliderPolicy;
use App\Policies\TagsPolicy;
use App\Policies\UserPolicy;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Role::class => RolePolicy::class,
        Product::class => ProductPolicy::class,
        RoleAssign::class => RoleAssignPolicy::class,
        Category::class => CategoryPolicy::class,
        Tag::class => TagsPolicy::class,
        Group::class => GroupPolicy::class,
        Attributes::class => AttributePolicy::class,
        Slider::class => SliderPolicy::class,
        Pages::class => PagePolicy::class,
        MenuSection::class => MenuSectionPolicy::class,
        Ads::class => AdsPolicy::class,
        AdsSection::class => AdsSectionPolicy::class,
        ProductSectionType::class => ProductSectionTypePolicy::class,
        OfferType::class => OfferTypePolicy::class,
        OfferTypeProduct::class => OfferTypeProductPolicy::class,
        Currencies::class => CurrencyPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
