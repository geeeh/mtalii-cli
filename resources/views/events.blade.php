@extends('layouts.app')

@section('content')
<div class="events-list">
    <p>Upcoming Events</p>
    <hr/>
@foreach($searchedEvents as $event)
<div class="list-item">
    <div class="row">
    <div class="col-sm-8 info">
        <span class="event-name">{{$event->name}}</span>
        <span class="event-price">#{{$event->cost}}</span>
        <span class="event-date">{{DateTime::createFromFormat('Y-m-d H:i:s', $event->date)->format('D M d Y')}}, {{$event->location}}</span>
        <p class="description">{{$event->description}}</p>
        <div class="row links">
            <div class="item-link">
                <img src="/imgs/share.svg"> Share
            </div>
            <div class="item-link" data-toggle="modal" data-target="#myModal">
                <img src="/imgs/like.svg"> Interested
            </div>
        </div>
    </div>
        <div class="col-sm-4 event-mage">
            <img src="{{ $event->image }}">
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
