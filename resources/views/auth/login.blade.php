<x-guest-layout>
    <x-auth-card>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}" class="py-10">
            @csrf
            <!-- Phone -->
            <div>
                <x-label for="phone" :value="__('Phone')" />

                <x-input id="phone" class="block mt-1 w-full" type="number" name="phone" :value="old('phone')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('register'))
                <div class="text-sm text-gray-600 ">
                Don't have an account? <a class="underline hover:text-gray-900" href="{{ route('register') }}">Register Now.</a>
                </div>
                @endif
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3" style="background-color:#00BFA6">
                    {{ __('Log in') }}
                </x-button>
            <div>
            
            
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>