@if($providers = \App\Models\User\SocialAccount::getAcceptedProviders())
<div class="social-auth-links text-center">
    <p>- ИЛИ -</p>
    @if(in_array('github', $providers))
        <a href="{{ route('socialite.oauth', 'github') }}" class="btn btn-block btn-social btn-github btn-flat"><i class="fa fa-github"></i> Sign in using
            GitHub</a>
    @endif
    @if(in_array('google', $providers))
    <a href="{{ route('socialite.oauth', 'google') }}" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    @endif
    @if(in_array('facebook', $providers))
    <a href="{{ route('socialite.oauth', 'facebook') }}" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
    @endif
</div>
@endif