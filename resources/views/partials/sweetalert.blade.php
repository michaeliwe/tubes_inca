@if(session()->has('success'))
swal("Success !", '{{ session()->get('success') }}', "success");
@endif

@if(session()->has('error'))
swal("Failed !", '{{ session()->get('error') }}', "error");
@endif

@if(session()->has('server'))
swal("Information", '{{ session()->get('server') }}', "info");
@endif
