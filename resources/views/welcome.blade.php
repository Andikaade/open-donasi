<x-layouts.frontend>
    <x-slot:title>Rumah Tahfiz Amanah - Beranda</x-slot:title>

    @include('frontend.hero')
    @include('frontend.announcement')
    @include('frontend.legalitas')
    @include('frontend.struktur')
    @include('frontend.program')
    @include('frontend.gallery')
    @include('frontend.testimoni')
    {{-- @include('frontend.keuangan') --}}
    @include('frontend.artikel')
</x-layouts.frontend>
