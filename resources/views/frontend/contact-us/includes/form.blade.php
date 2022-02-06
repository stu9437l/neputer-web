<section class="contact-page pad-tb section-nx">
    <div class="container">
        @include('admin.include.display_flash_data')
        <div class="row justify-content-center">
            <div class="col-lg-6 v-center">
                <div class="common-heading text-l">
                    <span>{{ $_settings['contact_title'] ?? 'Contact Title' }}</span>
                    <h2 class="mt0 mb0">{{ $_settings['contact_subtitle'] ?? 'Contact Title' }}</h2>
                </div>
                <div class="form-block">
                    @include('frontend.home.Section.contact_form')
                </div>
            </div>
            <div class="col-lg-5 v-center">
                <div class="contact-details">
                    <div class="contact-card wow fadeIn" data-wow-delay=".2s">
                        <div class="info-card v-center">
                            <span><i class="fas fa-phone-alt"></i> Phone:</span>
                            <div class="info-body">
                                <p>
{{--                                    {{ $_settings['contact_number_message'] ?? 'Enter Contact Message' }}--}}
                                </p>
                                <a href="phone:{{ $_settings['contact_number'] ?? 'Enter Contact Phone' }}">{{ $_settings['contact_number'] ?? 'Enter Contact Phone' }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="email-card mt30 wow fadeIn" data-wow-delay=".5s">
                        <div class="info-card v-center">
                            <span><i class="fas fa-envelope"></i> Email:</span>
                            <div class="info-body">
{{--                                <p>{{ $_settings['contact_email_message'] ?? 'Enter Contact Email Message' }}</p>--}}
                                <p></p>
                                <a href="email:{{ $_settings['contact_email'] ?? 'Enter Contact Email' }}">{{ $_settings['contact_email'] ?? 'Enter Contact Email' }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="skype-card mt30 wow fadeIn" data-wow-delay=".9s">
                        <div class="info-card v-center">
                            <span><i class="fab fa-skype"></i> Skype:</span>
                            <div class="info-body">
{{--                                <p>  <p>{{ $_settings['contact_skype_message'] ?? 'Enter Contact Skype Message' }}</p>--}}
                                <p></p>
                                <a href="skype:{{ $_settings['contact_skype'] ?? 'Enter Contact Skype' }}">{{ $_settings['contact_skype'] ?? 'Enter Contact Skype' }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>