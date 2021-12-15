@if(count($data['industries'])>0)
<section class="work-category pad-tb">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 v-center">
                <div class="common-heading text-l">
                    <span>{{ $_settings['industries_we_work_for_title'] ?? 'Insert Industries we work for Title' }}</span>
                    <h2>{{ $_settings['industries_we_work_for_subtitle'] ?? 'Insert Industries we work for Subtitle' }}</h2>
                    <p>{!! $_settings['industries_we_work_for_description'] ?? 'Insert Industries we work for Description'  !!} </p>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="work-card-set">
                     @php $i = 0 ;@endphp
                    @forelse($data['industries'] as $industries)

                    <div class="icon-set wow fadeIn" data-wow-delay="{{$i + 0.2}}">
                        <div class="work-card cd1">
                            <div class="icon-bg">
                                <img style="width: 58px" src="{{ \App\Facades\ViewHelperFacade::getImagePath('industries-we-work-for',$industries->image)  }}" alt="Industries" class="lazy"/></div>
                            <p>{{ $industries->title }}</p>
                        </div>
                    </div>

                    @empty

                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
@endisset