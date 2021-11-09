@if(isset($data['latest-blog']))
    <div class="recent-post widgets mt60">
        <h3 class="mb30">Recent post</h3>
        @foreach($data['latest-blog'] as $latestBlog)
            @if(isset($data['blog-detail']))
                @if( $data['blog-detail']->id != $latestBlog->id)
                    <div class="media">
                        <div class="post-image bdr-radius">
                            <a href="{{ route('blog.show',$latestBlog->slug) }}"><img src="{{ \App\Facades\ViewHelperFacade::getImagePath('blog',$latestBlog->image) }}" alt="blog" class="img-fluid"> </a>
                        </div>
                        <div class="media-body post-info">
                            <h5><a href="{{ route('blog.show',$latestBlog->slug) }}">{{ $latestBlog->title }}</a></h5>
                            <p>{{ $latestBlog->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                @endif

            @else
                <div class="media">
                    <div class="post-image bdr-radius">
                        <a href="{{ route('blog.show',$latestBlog->slug) }}"><img src="{{ \App\Facades\ViewHelperFacade::getImagePath('blog',$latestBlog->image) }}" alt="blog" class="img-fluid"> </a>
                    </div>
                    <div class="media-body post-info">
                        <h5><a href="{{ route('blog.show',$latestBlog->slug) }}">{{ $latestBlog->title }}</a></h5>
                        <p>{{ $latestBlog->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            @endif


        @endforeach
    </div>
@endif