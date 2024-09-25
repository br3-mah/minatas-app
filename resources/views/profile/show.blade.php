
<div>
<style>
    
    .header {
            background-color:#308e87; /* Greenish gradient */
            border-radius: 15px; /* Rounded corners */
            padding: 20px;
            backdrop-filter: blur(10px); /* Blurring effect */
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }

        .title {
            font-size: 2rem; /* Adjust as needed */
            color: #db9326; /* Text color */
            display: flex;
            gap: 0.5rem; /* Spacing between elements */
        }
</style>
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
                        <div class="mb-4 header">
                            <h1 class="title">
                                <span>Get Support</span>
                            </h1>
                        </div>
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
