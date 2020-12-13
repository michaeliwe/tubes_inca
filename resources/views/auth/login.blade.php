@extends('layouts.app')
@section('content')
    <div id="primary" class="p-t-b-100 height-full">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mx-md-auto">
                    <div class="text-center">
                        <img src="{{ asset('img/logo.png') }}" class="img-fluid mb-4" style="max-height: 90px"
                             alt="Logo">
                        <h2 class="bolder mb-4">WAREHOUSE</h2>

                    </div>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group has-icon"><i class="icon-envelope-o"></i>
                            <input type="text" class="form-control form-control-lg"
                                   placeholder="Username / Email" name="email">
                        </div>
                        <div class="form-group has-icon"><i class="icon-user-secret"></i>
                            <input type="password" class="form-control form-control-lg"
                                   placeholder="Password" name="password">
                        </div>
                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="Login">
                    </form>
                    <div class="modal-footer bg-transparent "><p class="text-sm">Do not have an account? </p><a
                            href="{{ route('register') }}"><p class="text-sm">Register</p></a></div>
                </div>
            </div>
        </div>
    </div>
@endsection
