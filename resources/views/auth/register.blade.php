@extends('layouts.app')
@section('content')
    <div id="primary" class="p-t-b-100 height-full">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-md-auto paper-card">
                    <div class="text-center">
                        <img src="{{ asset('img/logo.png') }}" class="img-fluid mb-4" style="max-height: 90px"
                             alt="Logo">
                        <h2 class="bolder mb-4">Warehouse</h2>
                    </div>
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li style="list-style: square">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="row">
                            <div class="form-group col">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Full Name" value="{{ old('name') }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" placeholder="test@example.com" name="email" value="{{ old('email') }}"
                                       required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" placeholder="Password" name="password" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password_confirmation">Confirmation
                                    Password</label>
                                <input type="password" class="form-control" placeholder="Re-type Password" name="password_confirmation"
                                       required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Register">
                                <div class="modal-footer bg-transparent "><p class="text-sm">Already have an
                                        account? </p><a
                                        href="{{ route('login') }}"><p class="text-sm">Login Now</p></a></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>
    @endpush
