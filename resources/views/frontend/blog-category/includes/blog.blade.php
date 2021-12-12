@if(count($data['blog']) > 0)
    @foreach($data['blog'] as $blog)
<div class="isotope_item vrbloglist">
    <div class="item-image">
        <a href="{{ route('blog.show',$blog->slug) }}"><img src="{{ \App\Facades\ViewHelperFacade::getImagePath('blog',$blog->image) }}" alt="blog" class="img-fluid"> </a>
        <span class="category-blog"> <a href="{{ route('blog.show',$blog->slug) }}">{{ $blog->seo_title }}</a></span>
    </div>
    <div class="item-info blog-info">
        <div class="entry-blog">
            <span class="bypost"><a href="#"><i class="fas fa-user"></i> </a></span>
            <span class="posted-on">
                <a href="#"><i class="fas fa-clock"></i> {{ $blog->created_at->diffForHumans() }}</a>
                </span>
        </div>
        <h4><a href="#">{{ $blog->title }}</a></h4>
        <p>{!! str_limit($blog->description , 250) !!}</p>
        <p><a href="{{ route('blog.show',$blog->slug) }}"> Read More</a> </p>
    </div>
</div>
@endforeach
@endif