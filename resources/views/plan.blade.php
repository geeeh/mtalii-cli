@extends('layouts.app')

@section('content')

<div class="login">
        <div class="row page-wrapper">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <span class="heading">Get help planning a trip</span>
                <p>To get help planning a trip call us on +254720142120</p>
    
                <form method="POST" action="{{ route('makerequest') }}">
                    @csrf
    
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
                        <label class="sr-only">Phone</label>
                        <div class="input-group">
                            <div class="input-group-addon"><img src= "/imgs/phone.svg"></div>
                            <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required autofocus placeholder="+254">

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label class="sr-only">Location</label>
                        <div class="input-group">
                            <div class="input-group-addon"><img src= "/imgs/placeholder.svg"></div>
                            <input id="location" type="text" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" name="location" required placeholder="location">

                                @if ($errors->has('location'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label class="sr-only">Description</label>
                        <div class="input-group">
                            <div class="input-group-addon"><img src= "/imgs/chats.svg"></div>
                            <input id="description" type="text" class="form-control" name="description" required placeholder="description">
                            @if ($errors->has('description'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
    
                    <button type ="submit" class="btn btn-orange-sucess" > Send Request</button>
    
                </form>
            </div>
        </div>
    </div>

<!-- Start of Async Drift Code -->
<script>
    "use strict";

    !function() {
        var t = window.driftt = window.drift = window.driftt || [];
        if (!t.init) {
            if (t.invoked) return void (window.console && console.error && console.error("Drift snippet included twice."));
            t.invoked = !0, t.methods = [ "identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on" ],
                t.factory = function(e) {
                    return function() {
                        var n = Array.prototype.slice.call(arguments);
                        return n.unshift(e), t.push(n), t;
                    };
                }, t.methods.forEach(function(e) {
                t[e] = t.factory(e);
            }), t.load = function(t) {
                var e = 3e5, n = Math.ceil(new Date() / e) * e, o = document.createElement("script");
                o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + n + "/" + t + ".js";
                var i = document.getElementsByTagName("script")[0];
                i.parentNode.insertBefore(o, i);
            };
        }
    }();
    drift.SNIPPET_VERSION = '0.3.1';
    drift.load('argfk4pi42d4');
</script>
<!-- End of Async Drift Code -->
@endsection
