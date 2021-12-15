
<section class="enquire-form pad-tb">
    <div class="container">
        @include('frontend.layouts.sweetalert')
        <div class="row light-bgs">
            <div class="col-lg-6">
                <div class="common-heading text-l">
                    <span>{{ $_settings['contact_title'] ?? 'Contact Title' }}</span>
                    <h2>{{ $_settings['contact_subtitle'] ?? 'Contact Subtitle' }}</h2>
                </div>
                <div class="form-block">
                    @include('frontend.home.Section.contact_form')
                </div>
            </div>
            <div class="col-lg-6 v-center">
                <div class="enquire-image">
                    <img src="{{asset('Frontend/images/about/hellopic.png')}}" alt="enquire" class="img-fluid lazy">
                </div>
            </div>
        </div>
    </div>
</section>