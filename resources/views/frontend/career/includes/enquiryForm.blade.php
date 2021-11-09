<!--Start Enquire Form-->
@if(isset($data['career']))

<section class="contact-page pad-tb" id="form-validation">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="common-heading ptag">
                    <span>{!! $_settings['enquiry_heading'] ?? 'Insert Enquiry Heading'  !!}  </span>
                    <h2>{!! $_settings['enquiry_subheading'] ?? 'Insert Enquiry Subheading'  !!}</h2>
                    <p class="mb60">{!! $_settings['enquiry_date'] ?? 'Insert Enquiry Date'  !!} {!! $_settings['enquiry_after_date_heading'] ?? 'Insert Heading After Date'  !!}</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="career-card-div">
                    <div id="accordion" class="accordion">
                        @foreach($data['career'] as $key => $career)
                        <div class="card-2">
                            <div class="card-header" id="acc{{$key}}">
                                <button class="btn btn-link btn-block text-left acc-icon" type="button" data-toggle="collapse" data-target="#collapse-{{$key}}" aria-expanded="true" aria-controls="collapse-{{$key}}">
                                  {{ $career->title }}
                                </button>
                            </div>
                            <div id="collapse-{{$key}}" class="card-body collapse show p0" aria-labelledby="acc{{$key}}" data-parent="#accordion">
                                <div class="data-reqs">
                                    <h5 class="pt20 pb20">Overview</h5>
                                        {!! $career->overview !!}
                                    <h5 class="pt20 pb20">Required experience</h5>
                                        {!! $career->requirement_experience !!}
                                    <h4 class="pb20 pt20">Skills Required:</h4>
                                    <ul class="list-ul ul-check">
                                        {!! $career->skills !!}
                                    </ul>
                                    @if($career->deadline_to_apply >= \Carbon\Carbon::today()->toDateString())

                                    <a href="#" class="btn-main bg-btn3 lnk mt20" data-toggle="modal" data-target="#modalform{{$key}}">Apply Now<i class="fas fa-chevron-right fa-icon"></i><span class="circle"></span></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                            <br>
                            @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Enquire Form-->
@foreach($data['career'] as $key => $career)
<div class="popup-modals">
    <div class="modal" id="modalform{{$key}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="common-heading">
                        <h4 class="mt0 mb0">Apply Now</h4>
                    </div>
                    <button type="button" class="closes" data-dismiss="modal">&times;</button></div>
                <!-- Modal body -->
                <div class="modal-body pt40 pb60">
                    <div class="form-block fdgn2">
                        <form id="contact-form" method="post" action="{{ route('career.form.post') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="fieldsets row">
                                <div class="col-md-6 form-group">
                                    {{ Form::text('name',null ,['placeholder'=> 'Enter your name *','required']) }}
                                    @if($errors->has('name'))
                                        <label class="has-error" for="name">{{ $errors->first('name') }}</label>
                                    @endif
                                </div>
                                <div class="col-md-6 form-group">
                                    {{ Form::tel('phone', null ,['placeholder'=> 'Enter your phone No *','required']) }}
                                    @if($errors->has('phone'))
                                        <label class="has-error" for="phone">{{ $errors->first('phone') }}</label>
                                    @endif
                                </div>

                            </div>
                            <div class="fieldsets row">
                                <div class="col-md-12 form-group">
                                    {{ Form::email('email', null ,['placeholder'=> 'Enter your email *','required']) }}
                                    @if($errors->has('email'))
                                        <label class="has-error" for="email">{{ $errors->first('email') }}</label>
                                    @endif

                                </div>
                                <input value="{{ $career->title }}" type="hidden" name="need">
                            </div>
                            <div class="fieldsets form-group">
                                {{ Form::textarea('message', null ,['rows'=>'4', 'required','id'=>'form_message']) }}

                                @if($errors->has('message'))
                                    <label class="has-error" for="message">{{ $errors->first('message') }}</label>
                                @endif
                            </div>
                            <div class="fieldsets- row">
                                <div class="col-md-12 form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input mb0" id="customFile" name="file">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                        @if($errors->has('file'))
                                            <label class="has-error" for="file">{{ $errors->first('file') }}</label>
                                        @endif
                                    </div>

                                    <p><small>Please upload files Only pdf, docx and doc files.</small></p>
                                </div>
                            </div>
                            <div class="fieldset mt20">

                                    <button type="submit" class="lnk btn-main bg-btn">Submit Application<span class="circle"></span>
                                    </button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
    @endif