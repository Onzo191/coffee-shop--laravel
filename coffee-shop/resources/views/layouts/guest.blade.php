<x-app-layout>
    @include('layouts.sections.header')

    {{ $slot }}

    @include('layouts.sections.footer')

    <script src="{{ asset('assets/js/cart.js') }}"></script>
</x-app-layout>
