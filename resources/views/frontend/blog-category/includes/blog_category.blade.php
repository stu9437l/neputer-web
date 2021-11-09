@if(isset($data['title_count']))
    <div class="recent-post widgets mt60">
        <h3 class="mb30">Blog Category</h3>
        <div class="blog-categories">
            <ul>
                @foreach($data['title_count'] as $title_count)
                    <li>
                        <a href="#">{{ $title_count->title }} <span class="categories-number">({{ $title_count->total_count }})</span></a>
                    </li>
                @endforeach

            </ul>
        </div>
    </div>

    <!--Start Tags-->
    <div class="recent-post widgets mt60">
        <h3 class="mb30">Most Used Tags</h3>
        <div class="tabs">
            @foreach($data['title_count'] as $total_count)
                <a href="#">{{ $total_count->title }}</a>
            @endforeach
        </div>
    </div>
    <!--End Tags-->
@endif