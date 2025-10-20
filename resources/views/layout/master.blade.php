@include('layout.header')

<div class="card">
    <div class="card-header">
        @php
            $text = 'لینک';
            $url = route('blog.index');
        @endphp
        <x-button>
            <x-slot name="hello">
                <p>سلام</p>
            </x-slot>

            <x-slot name="bay">
                <p>خداحافظ</p>
            </x-slot>
        </x-button>




    </div>
    @yield('content')
</div>



@include('layout.footer')
