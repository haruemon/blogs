@if( Session::has( 'success' ))
    <script>
        iziToast.success({
            title: 'OK',
            message: '{{ Session::get('success') }}',
            position: 'topRight',
        });
    </script>
@elseif( Session::has('error'))
    <script>
        iziToast.error({
            title: 'Error',
            message: '{{ Session::get('error') }}',
            position: 'topRight',
        });
    </script>
@endif
