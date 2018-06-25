@extends('layouts.app')

@section('content')
<div class="welcome-page">
    @include('partials.carousel')
<div class="search card">
    <h1 class="search-heading">FIND YOUR EVENT</h1>
    <form class="form-inline" method="POST" action="{{ route('search') }}">
            @csrf
        <div class="form-group mb-2">
            <label for="staticEmail2" class="sr-only">Search Name</label>
            <input type="text" class="form-control first-input" name="name" id="searchName" placeholder="NAME OR CATEGORY">
        </div>
        <div class="form-group mb-2">
            <label for="staticEmail2" class="sr-only">Date</label>
            <input type="date" class="form-control" name="date" id="searchDate" >
        </div>
        <div class="form-group mb-2">
        <button type="submit" class="btn btn-primary">SEARCH</button>
        </div>
    </form>
</div>

<div class="container top-events">
    <h2>UPCOMING EVENTS...</h2>
    <div class="row">
        @foreach($upcomingEvents as $event)
        <div class="col-sm-4">
            <div class="card">
                <img src="{{ $event->image }}">
                <div class="info">
                <span class="event-date">
                    {{ DateTime::createFromFormat('Y-m-d H:i:s', $event->date)->format('D M d Y') }}
                </span>
                <p class="event-title">
                    {{ $event->name }} @ <span class="cost">{{ $event->cost }}</span> kshs
                </p>
                <span class="event-location">
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 52 52" style="enable-background:new 0 0 52 52;" xml:space="preserve" width="15px" height="15px" >
                   <path style="fill:#1081E0;" d="M38.853,5.324L38.853,5.324c-7.098-7.098-18.607-7.098-25.706,0h0
                       C6.751,11.72,6.031,23.763,11.459,31L26,52l14.541-21C45.969,23.763,45.249,11.72,38.853,5.324z M26.177,24c-3.314,0-6-2.686-6-6
                       s2.686-6,6-6s6,2.686,6,6S29.491,24,26.177,24z"/>
                    </svg> {{ $event->location }}</span>
                    <hr/>
                <div class="row">
                    <a class="col-sm-6 interested" href="" data-toggle="modal" data-target="#myModal">
                        Interested
                    </a>
                    <a class="col-sm-6" href="">
                            More info
                    </a>
                </div>
                </div>
            </div>
        </div>

            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Add new Event</h5>
                        </div>
                        <div class="modal-body">
                            <form class="form-group" method="post" action="{{ route('interested') }}">
                                @csrf

                                <input type="hidden" value="{{$event->name}}" name="name">

                                <div class="form-group">
                                    <label class="sr-only" for="email">Email</label>
                                    <span>User Email</span>
                                    <div class="input-group">
                                        <input type="email" id="email" class="form-control"  name="email" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="sr-only" for="phone">Phone</label>
                                    <span>user Phone</span>
                                    <div class="input-group">
                                        <input type="text" id="phone" class="form-control"  name="phone" required>
                                    </div>
                                </div>
                                <div class="form-group buttons">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
</div>

    <div class="customer-care-section container-fluid">
        <div class="row">
        <div class="col-sm-6 ">
            <div class="hiring-card">
                <span class="hiring-caption">HIRE US TO CATER FOR ALL THE PLANNING OF YOUR EVENT </span>
                <p>Reach Mtalii at +254706892980</p>
            </div>
        </div>
            <div class="col-sm-6">
                <button class="hiring-button"><a href="{{ route('plan') }}">CONTACT US  <img src="/imgs/right-arrow.svg"></a></button>
            </div>
        </div>
    </div>

    <div class="packages">
        <div class="row">
            <div class="package">
                <img src="/imgs/diamond.svg">
                <p class="package-title">LUXURY PACKAGE</p>
                <hr>
                <p>Are you looking to spoil yourself? For our customers who are willing to
                    go all the way to have a good. We spare no expense. Nothing but first class all the way.</p>
            </div>
            <div class="package">
                <img src="/imgs/mixer.svg">
                <p class="card-title">MIXED PACKAGE</p>
                <hr>
                <p>Our mixed package falls between luxury and rugged.
                    Have an amazing package without extremely hurting your account. Get the mixed package.'</p>
            </div>
            <div class="package">
                <img src="/imgs/notepad.svg">
                <p class="card-title">BUDGET PACKAGE</p>
                <hr>
                <p>A package for our customers on a fixed bugdet.
                    Enjoy a good time and amazing discounts on our travel destination. I t does not cost alot to have a good time.</p>
            </div>
        </div>
    </div>

    <div class="gallery container">
        <h2>EXPERIENCES</h2>
        <div class="row">
            @foreach($experiences as $experience)
            <div class="col-sm-4 nopadding">
                <div class="screen">
                      <a href="{{$experience->link}}">{{$experience->name}}</a>
                    <p></p>
                    </div>
                <img src="{{$experience->image}}">
            </div>
            @endforeach
        </div>
    </div>
</div>



@include('partials.footer')

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


