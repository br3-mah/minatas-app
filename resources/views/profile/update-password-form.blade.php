<x-jet-form-section class="col-xxl-8 col-xl-8 col-lg-8 profile-card card-bx" submit="updatePassword">

    <x-slot name="form">
        <div class="row">
            <div class="col-sm-6 m-b30">
                <x-jet-label for="current_password" value="{{ __('Current Password') }}" />
                <x-jet-input id="current_password" type="password" class="mt-1 block w-full form-control input-default" wire:model.defer="state.current_password" autocomplete="current-password" />
                <x-jet-input-error for="current_password" class="mt-2" />
            </div>
    
            <div class="col-sm-6 m-b30">
                <x-jet-label for="password" value="{{ __('New Password') }}" />
                <x-jet-input id="password" type="password" class="mt-1 block w-full form-control input-default" wire:model.defer="state.password" autocomplete="new-password" />
                <x-jet-input-error for="password" class="mt-2" />
            </div>
    
            <div class="col-sm-6">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" type="password" class="mt-1 block w-full form-control input-default" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
                <x-jet-input-error for="password_confirmation" class="mt-2" />
            </div>
            <x-slot name="actions">
                <x-jet-action-message class="mr-3" on="saved">
                    {{ __('Saved.') }}
                </x-jet-action-message>
        
                <button class="btn btn-xs" style="background-color:blueviolet">
                    {{ __('Save Password') }}
                </button>
            </x-slot>
        </div>
    </x-slot>


</x-jet-form-section>
