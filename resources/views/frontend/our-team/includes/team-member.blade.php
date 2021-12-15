@if(count($data['team-member']) > 0)
<section class="team pad-tb deep-dark">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="common-heading ptag">
                    <span>We Are Awesome</span>
                    <h2>Our Team Members</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse($data['team-member'] as $team_member)
            <div class="col-lg-3 col-sm-6">
                <div class="full-image-card hover-scale">
                    <div class="image-div"><a href="#"><img src="{{ \App\Facades\ViewHelperFacade::getImagePath('our-team',$team_member->images) }}" alt="team" class="img-fluid"/></a></div>
                    <div class="info-text-block">
                        <h4><a href="#">{{ $team_member->name }}</a></h4>
                        <p>{{ $team_member->role }}</p>
                    </div>
                </div>
            </div>
            @empty

            @endforelse
        </div>
    </div>
</section>
@endif