<x-app-layout>
    @role('admin')
        @include('components.admin-dashboard')
    @endrole

    @role('pasien')
        @include('components.pasien-dashboard')
    @endrole

    @role('dokter')
        @include('components.dokter-dashboard')
    @endrole
</x-app-layout>