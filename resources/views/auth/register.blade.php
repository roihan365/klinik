<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-300 p-6">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
            
            <!-- Logo -->
            <div class="text-center mb-6">
                <img src="{{ asset('images/Logo Medilink.png') }}" alt="Medilink Logo" class="mx-auto w-28">
            </div>

            <!-- Title -->
            <h2 class="text-2xl font-bold text-center text-gray-700 mb-2">Register</h2>
            <p class="text-center text-gray-500 mb-6">Buat akun baru untuk melanjutkan</p>

            <!-- Form -->
            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" 
                        class="block mt-1 w-full" 
                        type="text" 
                        name="name" 
                        :value="old('name')" 
                        required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" 
                        class="block mt-1 w-full" 
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" 
                        class="block mt-1 w-full" 
                        type="password"
                        name="password" 
                        required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" 
                        class="block mt-1 w-full" 
                        type="password"
                        name="password_confirmation" 
                        required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Button -->
                <div>
                    <x-primary-button class="w-full justify-center">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>

            <!-- Login Link -->
            <p class="text-center text-gray-600 mt-6 text-sm">
                Sudah punya akun? 
                <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                    Login di sini
                </a>
            </p>
        </div>
    </div>
</x-guest-layout>
