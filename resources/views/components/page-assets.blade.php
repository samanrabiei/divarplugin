{{-- Load CSS in <head> --}}
@if ($css)
    @push('styles')
        <link rel="stylesheet" href="{{ asset($css) }}">
    @endpush
@endif

{{-- Load JS in footer --}}
@if ($js)
    @push('scripts')
        <script src="{{ asset($js) }}"></script>
    @endpush
@endif
