<?php

use \Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Login */
Route::POST('admin/login', ['as'=>'admin.login', 'uses'=> 'Admin\LoginController@login']);


/* Frontend Part*/
Route::get('/service', ['as'=>'service', 'uses'=>'Frontend\ServiceController@index']);
Route::get('/service/{slug}', ['as'=>'service.show', 'uses'=>'Frontend\ServiceController@show']);

/* Frontend About Us*/
Route::get('/', ['as' => 'user.home', 'uses'=> 'Frontend\HomeController@index']);


/* Frontend About Us*/
Route::get('about-us', ['as' =>'about.index', 'uses'=> 'Frontend\AboutUsController@index']);

//Contact-us
Route::get('contact-us', function (){
    return view('frontend.contact-us.index');
});
Route::post('contact-us', ['as'=>'contact.store', 'uses'=> 'Admin\ContactUsController@store']);

/* Subscribe Submit*/
Route::post('subscribe', ['as'=>'subscribe.submit' ,'uses'=> 'Admin\SubscribeController@store']);

/* Our Team*/
Route::get('our-team',['as'=>'our-team.index' ,'uses'=> 'Frontend\OurTeamController@index']);

/* Development Process*/
Route::get('development-process',['as'=>'development-process.index' ,'uses'=> 'Frontend\DevelopmentProcessController@index']);

/* Client Review */
Route::get('client-review',['as'=>'client-review.index' ,'uses'=> 'Frontend\TestimonialController@index']);

/* Career  */
Route::get('career', ['as'=>'career.index' ,'uses'=> 'Frontend\CareerController@index']);

/*Page*/
Route::get('/page/menu/{menu}', ['as' => 'page.menu','uses' => 'Frontend\PageController@menu']);


/* Blog Category  */
Route::get('blog' ,['as'=>'blog-category.index' ,'uses'=> 'Frontend\BlogController@index']);
Route::get('blog/{slug}' ,['as'=>'blog.show' ,'uses'=> 'Frontend\BlogController@show']);

Route::get('request-a-quote' ,['as'=>'request-a-quote' ,'uses'=> 'Frontend\RequestQuoteController@index']);
Route::post('request-a-quote' ,['as'=>'request-a-quote.store' ,'uses'=> 'Frontend\RequestQuoteController@store']);
Route::get('admin/request_quote' ,  ['as' => 'admin.request_quote.index', 'uses' => 'Frontend\RequestQuoteController@adminIndex']);
Route::get('admin/request_quote/{id}' ,  ['as' => 'admin.request_quote.show', 'uses' => 'Frontend\RequestQuoteController@show']);
Route::delete('admin/request_quote/{id}' ,  ['as' => 'admin.request_quote.destroy', 'uses' => 'Frontend\RequestQuoteController@destroy']);
Route::get('admin/request_quote/unseen/{id}' ,  ['as' => 'admin.request_quote.unseen', 'uses' => 'Frontend\RequestQuoteController@unseen']);

//Enquiry For service page
Route::post('service_enquiry' , ['as'=>'serviceForm.Submit', 'uses'=>'Admin\ServiceFormController@store']);
Route::post('enquiry_career' ,  ['as' => 'career.form.post', 'uses' => 'Admin\CareerFormController@store']);


//Mail Send to Career
Route::get('career_mail/{id}', ['as'=>'career.getMail','uses'=>'Mail\CareerMailController']);
Route::get('service_enquiry/{id}', ['as'=>'service.getMail','uses'=>'Mail\serviceMailController']);
Route::get('request_quote/{id}', ['as'=>'request_quote.getMail','uses'=>'Mail\RequestQueueController']);

Route::group(['middleware' => ['auth', 'admin-role-check'], 'prefix' => 'admin/', 'as' => 'admin.', 'namespace' => 'Admin\\'], function () {


    /* Our Team */
    Route::get('our-team/manage-rank', ['as' => 'our-team.manage-rank', 'uses' => 'OurTeamController@manageRank']);
    Route::resource('our-team' , 'OurTeamController');
    Route::post('our-team/bulk-action', ['as' => 'our-team.bulk-action', 'uses' => 'OurTeamController@bulkAction']);
    Route::post('our-team/sort-rank', ['as' => 'our-team.sort-rank', 'uses' => 'OurTeamController@sortRank']);

  /* Industries We Work For */
    Route::get('industries-we-work-for/manage-rank', ['as' => 'industries-we-work-for.manage-rank', 'uses' => 'IndustriesWeWorkForController@manageRank']);
    Route::resource('industries-we-work-for' , 'IndustriesWeWorkForController');
    Route::post('industries-we-work-for/bulk-action', ['as' => 'industries-we-work-for.bulk-action', 'uses' => 'IndustriesWeWorkForController@bulkAction']);
    Route::post('industries-we-work-for/sort-rank', ['as' => 'industries-we-work-for.sort-rank', 'uses' => 'IndustriesWeWorkForController@sortRank']);

  /* why us */
    Route::get('why-us/manage-rank', ['as' => 'why-us.manage-rank', 'uses' => 'whyUsController@manageRank']);
    Route::resource('why-us' , 'whyUsController');
    Route::post('why-us/bulk-action', ['as' => 'why-us.bulk-action', 'uses' => 'whyUsController@bulkAction']);
    Route::post('why-us/sort-rank', ['as' => 'why-us.sort-rank', 'uses' => 'whyUsController@sortRank']);

    /* Latest work */
    Route::get('our-work/manage-rank', ['as' => 'our-work.manage-rank', 'uses' => 'OurWorkController@manageRank']);
    Route::resource('our-work' , 'OurWorkController');
    Route::post('our-work/bulk-action', ['as' => 'our-work.bulk-action', 'uses' => 'OurWorkController@bulkAction']);
    Route::post('our-work/sort-rank', ['as' => 'our-work.sort-rank', 'uses' => 'OurWorkController@sortRank']);

    /* Development Process  */
    Route::get('development-process/manage-rank', ['as' => 'development-process.manage-rank', 'uses' => 'DevelopmentProcessController@manageRank']);
    Route::resource('development-process' , 'DevelopmentProcessController');
    Route::post('development-process/bulk-action', ['as' => 'development-process.bulk-action', 'uses' => 'DevelopmentProcessController@bulkAction']);
    Route::post('development-process/sort-rank', ['as' => 'development-process.sort-rank', 'uses' => 'DevelopmentProcessController@sortRank']);

    /* Career  */
    Route::get('career/manage-rank', ['as' => 'career.manage-rank', 'uses' => 'CareerController@manageRank']);
    Route::resource('career' , 'CareerController');
    Route::post('career/bulk-action', ['as' => 'career.bulk-action', 'uses' => 'CareerController@bulkAction']);
    Route::post('career/sort-rank', ['as' => 'career.sort-rank', 'uses' => 'CareerController@sortRank']);

    /*Career Form */
    Route::resource('enquiry_career' ,  'CareerFormController');
    Route::get('enquiry_career/unseen/{id}' ,  ['as' => 'enquiry_career.unseen', 'uses' => 'CareerFormController@unseen']);

    /*Service Form Submit */
    Route::resource('service_enquiry','ServiceFormController');
    Route::get('service_enquiry/unseen/{id}' ,  ['as' => 'service_enquiry.unseen', 'uses' => 'ServiceFormController@unseen']);


    Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);
    Route::get('un-authorized', ['as' => 'un-authorized', 'uses' => 'DashboardController@unAuthorized']);
    Route::get('error', ['as' => 'error', 'uses' => 'DashboardController@errors']);

    //about_us
    Route::resource('about_us', 'AboutUsController');
    Route::post('about_us/bulk-action', ['as' => 'about_us.bulk-action', 'uses' => 'AboutUsController@bulkAction']);

    //blog
    Route::resource('blog', 'BlogController');
    Route::post('blog/bulk-action', ['as' => 'blog.bulk-action', 'uses' => 'BlogController@bulkAction']);


    //blog category
    Route::get('blogCategory/manage-rank', ['as' => 'blogCategory.manage-rank', 'uses' => 'BlogCategoryController@manageRank']);
    Route::resource('blogCategory', 'BlogCategoryController');
    Route::post('blogCategory/sort-rank', ['as' => 'blogCategory.sort-rank', 'uses' => 'BlogCategoryController@sortRank']);
    Route::post('blogCategory/bulk-action', ['as' => 'blogCategory.bulk-action', 'uses' => 'BlogCategoryController@bulkAction']);

    //client
    Route::get('clients/manage-rank', ['as' => 'clients.manage-rank', 'uses' => 'ClientController@manageRank']);
    Route::resource('clients', 'ClientController');
    Route::post('clients/sort-rank', ['as' => 'clients.sort-rank', 'uses' => 'ClientController@sortRank']);
    Route::post('clients/bulk-action', ['as' => 'clients.bulk-action', 'uses' => 'ClientController@bulkAction']);

    //Company Story
    Route::get('company-story/manage-rank', ['as' => 'company-story.manage-rank', 'uses' => 'CompanyStoryController@manageRank']);
    Route::resource('company-story', 'CompanyStoryController');
    Route::post('company-story/sort-rank', ['as' => 'company-story.sort-rank', 'uses' => 'CompanyStoryController@sortRank']);
    Route::post('company-story/bulk-action', ['as' => 'company-story.bulk-action', 'uses' => 'CompanyStoryController@bulkAction']);

    //Portfolio category
    Route::resource('portfolio-category', 'PortfolioCategoryController');
    Route::post('portfolio-category/bulk-action', ['as' => 'portfolio-category.bulk-action', 'uses' => 'PortfolioCategoryController@bulkAction']);

    //Portfolio
    Route::resource('portfolio', 'PortfolioController');
    Route::post('portfolio/bulk-action', ['as' => 'portfolio.bulk-action', 'uses' => 'PortfolioController@bulkAction']);

    //Service
    Route::get('services/manage-rank', ['as' => 'services.manage-rank', 'uses' => 'ServiceController@manageRank']);
    Route::resource('services', 'ServiceController');
    Route::post('services/sort-rank', ['as' => 'services.sort-rank', 'uses' => 'ServiceController@sortRank']);
    Route::post('services/bulk-action', ['as' => 'services.bulk-action', 'uses' => 'ServiceController@bulkAction']);

    //Service
    Route::get('child-service/manage-rank', ['as' => 'child-service.manage-rank', 'uses' => 'ChildServiceController@manageRank']);
    Route::resource('child-service', 'ChildServiceController');
    Route::post('child-service/sort-rank', ['as' => 'child-service.sort-rank', 'uses' => 'ChildServiceController@sortRank']);
    Route::post('child-service/bulk-action', ['as' => 'child-service.bulk-action', 'uses' => 'ChildServiceController@bulkAction']);

    //Our Skills
    Route::get('our-skills/manage-rank', ['as' => 'our-skills.manage-rank', 'uses' => 'OurSkillsController@manageRank']);
    Route::resource('our-skills', 'OurSkillsController');
    Route::post('our-skills/sort-rank', ['as' => 'our-skills.sort-rank', 'uses' => 'OurSkillsController@sortRank']);
    Route::post('our-skills/bulk-action', ['as' => 'our-skills.bulk-action', 'uses' => 'OurSkillsController@bulkAction']);

    //Technologies
    Route::resource('technologies', 'TechnologyController');
    Route::post('technologies/bulk-action', ['as' => 'technologies.bulk-action', 'uses' => 'TechnologyController@bulkAction']);

    //Our Skills
    Route::get('testimonial/manage-rank', ['as' => 'testimonial.manage-rank', 'uses' => 'TestimonialController@manageRank']);
    Route::resource('testimonial', 'TestimonialController');
    Route::post('testimonial/sort-rank', ['as' => 'testimonial.sort-rank', 'uses' => 'TestimonialController@sortRank']);
    Route::post('testimonial/bulk-action', ['as' => 'testimonial.bulk-action', 'uses' => 'TestimonialController@bulkAction']);

    //users
    Route::get('users', ['as' => 'users.index', 'uses' => 'UserController@index']);
    Route::get('users/create', ['as' => 'users.create', 'uses' => 'UserController@create']);
    Route::post('users', ['as' => 'users.store', 'uses' => 'UserController@store']);
    Route::get('users/{id}', ['as' => 'users.show', 'uses' => 'UserController@show']);
    Route::get('users/{id}/edit', ['as' => 'users.edit', 'uses' => 'UserController@edit']);
    Route::put('users/{id}', ['as' => 'users.update', 'uses' => 'UserController@update']);
    Route::delete('users/{id}', ['as' => 'users.destroy', 'uses' => 'UserController@destroy']);
    Route::post('users/bulkAction', ['as' => 'users.bulkAction', 'uses' => 'UserController@bulkAction']);

    //roles
    Route::resource('roles', 'RoleController');
    Route::post('roles/bulkAction', ['as' => 'roles.bulkAction', 'uses' => 'RoleController@bulkAction']);

    //site_config
    Route::get('site-configs/edit', ['as' => 'site-configs.edit', 'uses' => 'SiteConfigController@edit']);
    Route::put('site-configs', ['as' => 'site-configs.update', 'uses' => 'SiteConfigController@update']);

    //menu_section
    Route::resource('menu-sections', 'MenuSectionController');
    Route::post('menu-sections/load-page-html', ['as' => 'menu-sections.load-page-html', 'uses' => 'MenuSectionController@loadPageHtml']);

    //users
    Route::get('pages', ['as' => 'pages.index', 'uses' => 'PageController@index']);
    Route::get('pages/create', ['as' => 'pages.create', 'uses' => 'PageController@create']);
    Route::post('pages', ['as' => 'pages.store', 'uses' => 'PageController@store']);
    Route::get('pages/{id}', ['as' => 'pages.show', 'uses' => 'PageController@show']);
    Route::get('pages/{id}/edit', ['as' => 'pages.edit', 'uses' => 'PageController@edit']);
    Route::put('pages/{id}', ['as' => 'pages.update', 'uses' => 'PageController@update']);
    Route::delete('pages/{id}', ['as' => 'pages.destroy', 'uses' => 'PageController@destroy']);
    Route::post('pages/bulkAction', ['as' => 'pages.bulkAction', 'uses' => 'PageController@bulkAction']);
    Route::get('ppages/menuList' , ['as'=>'pages.menulist', 'uses'=>'PageController@menuList']);


    //sliders
    Route::get('sliders', ['as' => 'sliders.index', 'uses' => 'SliderController@index']);
    Route::get('sliders/manage-rank', ['as' => 'sliders.manage-rank', 'uses' => 'SliderController@manageRank']);
    Route::get('sliders/create', ['as' => 'sliders.create', 'uses' => 'SliderController@create']);
    Route::post('sliders', ['as' => 'sliders.store', 'uses' => 'SliderController@store']);
    Route::get('sliders/{id}', ['as' => 'sliders.show', 'uses' => 'SliderController@show']);
    Route::get('sliders/{id}/edit', ['as' => 'sliders.edit', 'uses' => 'SliderController@edit']);
    Route::put('sliders/{id}', ['as' => 'sliders.update', 'uses' => 'SliderController@update']);
    Route::delete('sliders/{id}', ['as' => 'sliders.destroy', 'uses' => 'SliderController@destroy']);
    Route::post('sliders/sort-rank', ['as' => 'sliders.sort-rank', 'uses' => 'SliderController@sortRank']);
    Route::post('sliders/bulkAction', ['as' => 'sliders.bulkAction', 'uses' => 'SliderController@bulkAction']);


    //Route::resource('category','CategoryController');
    Route::get('category', ['as' => 'category.index', 'uses' => 'CategoryController@index']);
    Route::get('category/create', ['as' => 'category.create', 'uses' => 'CategoryController@create']);
    Route::post('category', ['as' => 'category.store', 'uses' => 'CategoryController@store']);
    Route::get('category/{id}', ['as' => 'category.show', 'uses' => 'CategoryController@show']);
    Route::get('category/{id}/edit', ['as' => 'category.edit', 'uses' => 'CategoryController@edit']);
    Route::put('category/{id}', ['as' => 'category.update', 'uses' => 'CategoryController@update']);
    Route::delete('category/{id}', ['as' => 'category.destroy', 'uses' => 'CategoryController@destroy']);
    Route::post('category/bulk-action', ['as' => 'category.bulk-action', 'uses' => 'CategoryController@bulkAction']);


    //Route::resource('tags','TagsController');
    Route::get('tags', ['as' => 'tags.index', 'uses' => 'TagsController@index']);
    Route::get('tags/create', ['as' => 'tags.create', 'uses' => 'TagsController@create']);
    Route::post('tags', ['as' => 'tags.store', 'uses' => 'TagsController@store']);
    Route::get('tags/{id}', ['as' => 'tags.show', 'uses' => 'TagsController@show']);
    Route::get('tags/{id}/edit', ['as' => 'tags.edit', 'uses' => 'TagsController@edit']);
    Route::put('tags/{id}', ['as' => 'tags.update', 'uses' => 'TagsController@update']);
    Route::delete('tags/{id}', ['as' => 'tags.destroy', 'uses' => 'TagsController@destroy']);
    Route::post('tags/bulk-action', ['as' => 'tags.bulk-action', 'uses' => 'TagsController@bulkAction']);


    //Contact Routes
    Route::post('contact/bulk-action', ['as' => 'contact.bulk-action', 'uses' => 'ContactUsController@bulkAction']);
    Route::get('contact', ['as' => 'contact.index', 'uses' => 'ContactUsController@index']);
    Route::get('contact/{id}', ['as' => 'contact.show', 'uses' => 'ContactUsController@show']);

});



//Route::post('store-order', ['as' => 'store-order', 'uses' => 'Shop\OrderController@index']);

Route::group(['middleware' => ['auth', 'customer-role-check']], function () {

    Route::get('shop/dashboard', ['as' => 'shop.customer.dashboard', 'uses' => 'Shop\Customer\DashboardController@index']);

});


Auth::routes();

Route::get('translate/{locale}', function ($locale) {

    if (in_array($locale, config('myPath.default_languages'))) {

        \Cookie::queue('language', $locale, 43200);

        return redirect()->back();
    }

    return redirect()->route('home');


})->name('translate');


Route::get('currency/{slug}', function ($slug) {

    $currencies = \App\Model\Currencies::select('currency_code')
//                        ->where('is_default', 1)
        ->pluck('currency_code')
        ->toArray();

    $currencies = array_map('strtolower', $currencies);

    if (in_array(strtolower($slug), $currencies)) {

        \Cookie::queue('currency', $slug, 43200);

        return redirect()->back();
    }

    return redirect()->route('home');


})->name('currency');