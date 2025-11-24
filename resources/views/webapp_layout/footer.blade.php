<!-- Page Content End -->
@livewireScripts
</div>
<!--**********************************
    Scripts
***********************************-->
<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script><!-- Swiper -->
<script src="{{ asset('assets/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}"></script><!-- Swiper -->
<script src="{{ asset('assets/js/dz.carousel.js') }}"></script><!-- Swiper -->
<script src="{{ asset('assets/js/settings.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/toast/script.js') }}"></script><!-- toast -->
<script>
    @if (session('success') && is_array(session('success')))
        openToast('success');
        document.querySelector("#toast-message p").innerText = "{{ session('success')['message'] }}";
        document.querySelector("#toast-message h4").innerText = "{{ session('success')['title'] }}";
    @endif

    @if (session('error') && is_array(session('error')))
        openToast('error');
        document.querySelector("#toast-message p").innerText = "{{ session('error')['message'] }}";
        document.querySelector("#toast-message h4").innerText = "{{ session('error')['title'] }}";
    @endif

    @if (session('warning') && is_array(session('warning')))
        openToast('warning');
        document.querySelector("#toast-message p").innerText = "{{ session('warning')['message'] }}";
        document.querySelector("#toast-message h4").innerText = "{{ session('warning')['title'] }}";
    @endif

    @if (session('info') && is_array(session('info')))
        openToast('info');
        document.querySelector("#toast-message p").innerText = "{{ session('info')['message'] }}";
        document.querySelector("#toast-message h4").innerText = "{{ session('info')['title'] }}";
    @endif
</script>
{{-- palak --}}
<script src="{{ asset('assets/palak/script.js') }}"></script><!-- toast -->
</body>

</html>
