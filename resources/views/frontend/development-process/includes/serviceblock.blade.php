@if(count($data['development-process']) > 0)
<section class="service-block pad-tb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="common-heading ptag">
                    <span>Process</span>
                    <h2>Our Web Design Process</h2>
                    <p>Our design process follows a proven approach. We begin with a deep understanding of your needs and create a planning template.</p>
                </div>
            </div>
        </div>
        @php $i = 1; @endphp
    @foreach($data['development-process'] as $development_process)
            @if($i % 2 == 0)
                <div class="row upset justify-content-center mt60">
                    <div class="col-lg-7 v-center order2">
                        <div class="ps-block">
                            <span>{{ $i++ }}</span>
                            <h3>{{ $development_process->title }}</h3>
                            <p>{!! $development_process->description !!}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 v-center order1">
                        <div class="image-block1">
                            <img src="{{ \App\Facades\ViewHelperFacade::getImagePath('development-process',$development_process->image) }}"
                                 alt="Process" class="img-fluid"/>
                        </div>
                    </div>
                </div>

            @else
                <div class="row upset justify-content-center mt60">
                    <div class="col-lg-4 v-center order1">
                        <div class="image-block1">
                            <img src="{{ \App\Facades\ViewHelperFacade::getImagePath('development-process',$development_process->image) }}"
                                 alt="Process" class="img-fluid"/>
                        </div>
                    </div>
                    <div class="col-lg-7 v-center order2">
                        <div class="ps-block">
                            <span>{{ $i++ }}</span>
                            <h3>{{ $development_process->title }}</h3>
                            <p>{!! $development_process->description !!}</p>
                        </div>
                    </div>
                </div>
            @endif

        @endforeach

    </div>
</section>

@endif
