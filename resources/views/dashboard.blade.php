{{-- resources/views/dashboard.blade.php --}}

@role('admin')
    {{-- UNTUK ADMIN --}}
    <x-admin-layout>
        @include('components.admin-dashboard-content')
    </x-admin-layout>
@endrole

@role('pasien')
    {{-- UNTUK PASIEN --}}
    <x-app-layout>
        <x-pasien-dashboard /> 
    </x-app-layout>
@endrole

@role('dokter')
    {{-- UNTUK DOKTER --}}
    <x-app-layout>
        <x-dokter-dashboard /> 
    </x-app-layout>
@endrole

<!-- //@unlessrole('admin|pasien|dokter')
    {{-- FALLBACK --}}
    <x-app-layout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        Anda berhasil masuk!
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
@endunlessrole  -->
