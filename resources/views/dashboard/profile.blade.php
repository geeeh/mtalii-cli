@extends('dashboard.stats')
@section('data-section')
    <div class="row">
<div class="profile">
    <div class="banner">
        <div class="profile-pic">
            @if($details)
                <img src="{{$details['photoUrl'] || '#'}}">
            @endif
        </div>
        <h4>{{$profile->name}}</h4>
        <p>{{$profile->email}}</p>

        <button class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModalCenter">Edit Profile</button>
    </div>
</div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create User Profile</h5>
                </div>
                <div class="modal-body">
                    <form class="form-group" method="post" enctype="multipart/form-data" action="{{ route('userprofile') }}">
                        @csrf

                        <div class="form-group">
                            <label class="sr-only" for="package">preferred package</label>
                            <span>preferred package</span>
                            <div class="input-group">
                                <select id="package" class="form-control form-control-lg" name="package" required>
                                    <option value="luxury">Luxury</option>
                                    <option value="mixed">Mixed</option>
                                    <option value="budget">Budget</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="sr-only" for="image">Image</label>
                            <span>User Icon</span>
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
    @endsection