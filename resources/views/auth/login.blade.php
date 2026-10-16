<x-guest-layout>
    <div class="mb-8">
        <p class="text-sm font-semibold text-violet-700">Welcome back</p>
        <h1 class="mt-2 text-3xl font-extrabold tracking-tight text-slate-900">Sign in to FixItHub</h1>
        <p class="mt-2 text-sm leading-6 text-slate-500">Pick up where you left off and keep your repairs moving.</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="!text-sm !font-semibold !text-slate-700" />
            <x-text-input id="email" class="mt-1 block w-full !rounded-xl !border-slate-200 !py-3 shadow-sm focus:!border-violet-500 focus:!ring-violet-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="!text-sm !font-semibold !text-slate-700" />

            <x-text-input id="password" class="mt-1 block w-full !rounded-xl !border-slate-200 !py-3 shadow-sm focus:!border-violet-500 focus:!ring-violet-500"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-slate-300 text-violet-600 shadow-sm focus:ring-violet-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="text-sm font-semibold text-violet-700 hover:text-violet-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
    <p class="mt-7 border-t border-slate-100 pt-6 text-center text-sm text-slate-500">
        New to FixItHub?
        <a href="{{ route('register') }}" class="font-semibold text-violet-700 hover:text-violet-900">Create an account</a>
    </p>
</x-guest-layout>
