@extends('layouts.app')

@section('content')
    <div class="login">
        <div class="row page-wrapper">
            <div class="col-sm-4"></div>
            <div class="col-sm-4 signin">
                <span class="heading">Mtalii Tours</span>
                <p>sign in with your google account</p>
                <a class="btn btn-secondary" href="{{ route('googleLogin') }}">Google login <img src="/imgs/right-arrow.svg"></a>
            </div>
        </div>
    </div>
@endsection
