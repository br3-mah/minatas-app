
<div>

<div>
    <nav class="w-full">
        <ul class="space-y-2 detached-breadcrumb ">
            <li class="text-3xl font-bold text-black dark:text-white">
                @switch($view)
                    @case('profile')
                        Profile
                        @break
                    @case('kyc')
                        Kyc Information
                        @break
                    @case('privacy-security')
                        Privacy & Security
                        @break
                    @case('issue')
                        Support (Report Issue)
                        @break
                    @default
                        Edit Profile
                        @break
                @endswitch
            </li>
        </ul>
    </nav>
</div>

@switch($view)
    @case('profile')
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @include('profile.update-profile-information-form')
            @endif
        @break
    @case('kyc')
            @include('profile.kyc-update')
        @break
    @case('privacy-security')
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.logout-other-browser-sessions-form')
            @endif 
        @break
    @case('issue')
            @include('profile.support-issue')
        @break
    @default
        {{ $view }}
    @break
@endswitch
</div>
