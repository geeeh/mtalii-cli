@extends('dashboard.stats')
@section('data-section')
    <div class="galleries">
        <button class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter">Add new experience</button>

        <div>
            <div class="row">
                @foreach($experiences as $experience)
                    <div class="col-sm-4 experience">
                        <img src="{{$experience->image}}">
                    </div>
                    @endforeach
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add a new experience</h5>
                    </div>
                    <div class="modal-body">
                        <form class="form-group" method="post" enctype="multipart/form-data" action="{{ route('gallery') }}">
                            @csrf
                            <div class="form-group">
                                <label class="sr-only" for="name">Name</label>
                                <span>Experience name</span>
                                <div class="input-group">
                                    <input type="text" id="name" class="form-control" name="name" placeholder="" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="link">Link</label>
                                <span>Link</span>
                                <div class="input-group">
                                    <input type="text" id="link" class="form-control" name="link" placeholder="http://...." required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="sr-only" for="image">Image</label>
                                <span>Image</span>
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

    </div>
    @endsection