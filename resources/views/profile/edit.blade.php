<x-guest-layout>
    {{-- Container --}}
    <div class="relative w-full max-w-md mx-auto mt-20 bg-gradient-to-br from-gray-950 via-gray-900 to-gray-950 border border-gray-800 rounded-2xl shadow-2xl p-10 space-y-8 overflow-hidden"
         x-data="{ showPass:false, submitting:false }">

        <!-- Animated Glow Background -->
        <div class="absolute inset-0 pointer-events-none z-0">
            <div class="absolute -top-24 -left-24 w-96 h-96 bg-blue-500/20 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-purple-500/20 rounded-full blur-3xl animate-pulse"></div>
        </div>

        <!-- Header -->
        <div class="relative z-10 text-center space-y-2">
            <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 via-purple-500 to-pink-500 tracking-wide">
                Welcome Back
            </h1>
            <p class="text-sm text-gray-400">
                Log in to continue your journey with the Job Board System.
            </p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="relative z-10 mb-4 text-sm text-green-500" :status="session('status')" />

        <!-- Form -->
        <form method="POST"
              action="{{ route('login') }}"
              class="relative z-10 space-y-6"
              x-on:submit="submitting = true">
            @csrf

            <!-- Email Address -->
            <div class="group">
                <x-input-label for="email" :value="__('Email')" class="text-gray-300 group-hover:text-blue-400 transition" />
                <x-text-input id="email"
                              class="mt-1 block w-full rounded-lg bg-gray-900 border border-gray-700 text-gray-100 placeholder-gray-500 focus:ring-blue-500 focus:border-blue-500 transition"
                              type="email"
                              name="email"
                              :value="old('email')"
                              required
                              autofocus
                              autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-400" />
            </div>

            <!-- Password -->
            <div class="group">
                <div class="flex items-center justify-between">
                    <x-input-label for="password" :value="__('Password')" class="text-gray-300 group-hover:text-blue-400 transition" />
                    @if (Route::has('password.request'))
                        <a class="text-xs text-blue-400 hover:underline transition" href="{{ route('password.request') }}">
                            {{ __('Forgot?') }}
                        </a>
                    @endif
                </div>

                <div class="relative">
                    {{-- Use a plain input and Alpine binding to avoid Blade parsing :type --}}
                    <input id="password"
                           class="mt-1 block w-full rounded-lg bg-gray-900 border border-gray-700 text-gray-100 placeholder-gray-500 focus:ring-blue-500 focus:border-blue-500 transition pr-12"
                           x-bind:type="showPass ? 'text' : 'password'"
                           name="password"
                           required
                           autocomplete="current-password" />
                    <!-- Show/Hide button -->
                    <button type="button"
                            x-on:click="showPass = !showPass"
                            class="absolute right-2 top-1/2 -translate-y-1/2 text-xs text-gray-400 hover:text-gray-200">
                        <span x-show="!showPass">👁️</span>
                        <span x-show="showPass">🙈</span>
                    </button>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-400" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                           class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-800"
                           name="remember">
                    <span class="ms-2 text-sm text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <x-primary-button type="submit"
                    class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-6 py-2 rounded-full shadow-md transition disabled:opacity-60 disabled:cursor-not-allowed"
                    x-bind:disabled="submitting">
                    <span x-show="!submitting">{{ __('Log in') }}</span>
                    <span x-show="submitting">⏳ Logging in…</span>
                </x-primary-button>
            </div>
        </form>

        <!-- Minimal Alpine.js fallback (only if not already loaded elsewhere) -->
        <script>
            window.Alpine || document.write('<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer><\/script>');
        </script>
    </div>
</x-guest-layout>
