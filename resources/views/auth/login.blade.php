<x-guest-layout>
    <div class="mb-8">
        <h2 class="text-3xl font-black text-gray-900">Welcome Back!</h2>
        <p class="text-gray-600 mt-2">Sign in to access your workspace</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                   class="input-modern @error('email') border-red-500 @enderror" placeholder="you@example.com">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
            <input id="password" type="password" name="password" required autocomplete="current-password"
                   class="input-modern @error('password') border-red-500 @enderror" placeholder="••••••••">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-primary-600 shadow-sm focus:ring-primary-500 transition" name="remember">
                <span class="ms-2 text-sm text-gray-600 font-medium">Remember me</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm font-semibold text-primary-600 hover:text-primary-700 transition" href="{{ route('password.request') }}">
                    Forgot password?
                </a>
            @endif
        </div>

        <button type="submit" class="w-full btn-primary py-3.5 text-base">
            <span>Sign In</span>
            <svg class="w-5 h-5 ml-2 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
            </svg>
        </button>

        <div class="text-center pt-4 border-t border-gray-100">
            <p class="text-sm text-gray-600">
                Don't have an account?
                <a href="{{ route('register') }}" class="font-semibold text-primary-600 hover:text-primary-700 transition">
                    Sign up for free
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
