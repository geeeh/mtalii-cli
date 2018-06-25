@extends('layouts.app')

@section('content')

<div class="login">
        <div class="row page-wrapper">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <span class="heading">Mtalii Tours</span>
                <p>Please enter username, email and password to sign up.</p>
    
                <form method="POST" action="{{ route('register') }}">
                    @csrf
    
                    <div class="form-group">
                        <label class="sr-only">Username</label>
                        <div class="input-group">
                            <div class="input-group-addon"><img src= "/imgs/username.svg"></div>
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="user name">

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label class="sr-only">Email</label>
                        <div class="input-group">
                            <div class="input-group-addon"><img src= "/imgs/arroba.svg"></div>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="user email">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label class="sr-only">Password</label>
                        <div class="input-group">
                            <div class="input-group-addon"><img src= "/imgs/unlocked.svg"></div>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label class="sr-only">confirm Password</label>
                        <div class="input-group">
                            <div class="input-group-addon"><img src= "/imgs/confirm.svg"></div>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="password">
                        </div>
                    </div>
    
                    <button type ="submit" class="btn btn-orange-sucess" > Sign up</button>
    
                </form>
            </div>
        </div>
    </div>
@endsection
