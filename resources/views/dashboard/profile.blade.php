@extends('dashboard.stats')
@section('data-section')
    <div class="row">
<div class="profile">
    <div class="banner">
    </div>

    <div class="profile-pic">
        <img src="/imgs/elephants.jpg">
    </div>

    <div class="profile-info"></div>
    <button class="btn btn-secondary right" data-toggle="modal" data-target="#exampleModalCenter">
        <img src="/imgs/add.svg" width="14px" height="14px"> Add profile</button>
    <div class="row accounts">
        <div class="col-sm-2"></div>
        <a class="col-sm-3" href="https://facebook.com"><img src="/imgs/facebook.svg" width="25px" height="25px"> Facebook</a>
        <a class="col-sm-3" href="https://instagram.com"><img src="/imgs/instagram.svg" width="25px" height="25px"> Instagram</a>
        <a class="col-sm-3" href="https://linkedin.com"><img src="/imgs/linkedin.svg" width="25px" height="25px"> Linkedin</a>
    </div>
    <div class="row counts">
        <div class="info-card">
            <h5>COMPANIES</h5>
            <hr/>
        </div>
        <div class="info-card">
            <h5>EVENTS CREATED</h5>
            <hr/>
        </div>
        <div class="info-card">
            <h5>EVENTS ATTENDED</h5>
            <hr/>
        </div>
    </div>

</div>
    <div class="events-attended">
        <h5>NOTIFICATIONS</h5>
        <hr/>
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