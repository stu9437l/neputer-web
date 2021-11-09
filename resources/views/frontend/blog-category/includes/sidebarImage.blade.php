<div class="offer-image">
    <img src="@if(isset($_settings['blog_sidebar_image'])) {{ \App\Facades\ViewHelperFacade::getImagePath('site_configuration',$_settings['blog_sidebar_image']) }}@endif" alt="offer" class="img-fluid"/>
</div>