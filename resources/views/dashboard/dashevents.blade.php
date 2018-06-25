@extends('dashboard.stats')
@section('data-section')
<div class="dash-events-list">
    <div class="row">
        <div class="col-sm-4">
            <button class="btn btn-outline-secondary" data-toggle="modal" data-target="#myModal">new Event</button>
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
            <form class="search-events right" method="post">
                <label class="sr-only" for="options">options</label>
                <select id="options" class="form-control form-control-lg">
                    @foreach($companies as $company)
                        <option>{{$company->name}}</option>
                    @endforeach
                </select>
            </form>
        </div>
    </div>


    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add new Event</h5>
                </div>
                <div class="modal-body">
                    <form class="form-group" method="post" enctype="multipart/form-data" action="{{ route('events') }}">
                        @csrf
                        <div class="form-group">
                            <label class="sr-only" for="name">Name</label>
                            <span>Event Name</span>
                            <div class="input-group">
                                <input type="text" id="name" class="form-control"  name="name" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="sr-only" for="location">Location</label>
                            <span>Event Location</span>
                            <div class="input-group">
                                <input type="text" id="location" class="form-control"  name="location" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="sr-only" for="activities">activities</label>
                            <span>Event Activities</span>
                            <div class="input-group">
                                <input type="text" id="activities" class="form-control" name="activities" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="sr-only" for="company">Package</label>
                            <span>Event package type</span>
                            <div class="input-group">
                                <select id="package" class="form-control form-control-lg" name="package" required>
                                    <option value="luxury">Luxury</option>
                                    <option value="mixed">Mixed</option>
                                    <option value="budget">Budget</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="sr-only" for="company">Company</label>
                            <span>Event Company</span>
                            <div class="input-group">
                            <select id="company" class="form-control form-control-lg" name="company" required>
                                @foreach($companies as $company)
                                    <option value="{{$company->id}}">{{$company->name}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="sr-only" for="cost">Cost</label>
                            <span>Event Cost</span>
                            <div class="input-group">
                                <input type="text" id="cost" class="form-control" name="cost" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="sr-only" for="date">Date</label>
                            <span>Event Date</span>
                            <input type="date" id="date" class="form-control" name="date" required>
                        </div>

                        <div class="form-group">
                            <label class="sr-only" for="description">Description</label>
                            <span>Event Description</span>
                            <div class="input-group">
                                <textarea rows="3" id="description" class="form-control" name="description" required></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="sr-only" for="image">Image</label>
                            <span>Event Banner</span>
                            <div class="input-group">
                                <input type="file" id="image" class="form-control" name="image" placeholder="" required>
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

@foreach($events as $event)
        <div class="list-item">
            <div class="row">
                <div class="col-sm-4">
                    <img src="{{ $event->image }}">
                </div>
                <div class="col-sm-6 info">
                    <h5>{{$event->name}}</h5>
                    <span class="event-date">{{DateTime::createFromFormat('Y-m-d H:i:s', $event->date)->format('D M d Y')}}, {{$event->location}}</span>
                    <p class="description">{{$event->description}}</p>
                    <p class="event-price"> price: {{$event->cost}}</p>
                    <button class="btn-outline-danger">delete</button>
                </div>
            </div>
        </div>
    @endforeach
</div>


@endsection