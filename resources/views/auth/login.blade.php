<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-300 p-6">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
            
            <!-- Logo -->
            <div class="text-center mb-6">
                <img src="{{ asset('images/Logo Medilink.png') }}" alt="Medilink Logo" class="mx-auto w-28">
            </div>

            <!-- Title -->
            <h2 class="text-2xl font-bold text-center text-gray-700 mb-2">Login</h2>
            <p class="text-center text-gray-500 mb-6">Silakan masuk untuk melanjutkan</p>

            <!-- Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" 
                        class="block mt-1 w-full" 
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" 
                        class="block mt-1 w-full" 
                        type="password"
                        name="password" 
                        required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="flex items-center">
                        <input id="remember_me" 
                               type="checkbox" 
                               class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500"
                               name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-blue-600 hover:text-blue-800" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <!-- Button -->
                <div>
                    <x-primary-button class="w-full justify-center">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>

            <!-- Register Link -->
            <p class="text-center text-gray-600 mt-6 text-sm">
                Belum punya akun? 
                <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                    Daftar sekarang
                </a>
            </p>
        </div>
    </div>
</x-guest-layout>
