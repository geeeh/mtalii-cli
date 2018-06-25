@extends('dashboard.stats')
@section('data-section')
<div class="company col-sm-8">
        <button type="button" class="btn btn-success right" data-toggle="modal" data-target="#myModal">
            New Company
        </button>

    <div class="details">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Location</th>
                <th scope="col">phone</th>
                <th scope="col">email</th>
                <th scope="col">Description</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($companies as $company)
            <tr>
                <td>{{$company->name}}</td>
                <td>{{$company->location}}</td>
                <td>{{$company->phone}}</td>
                <td>{{$company->email}}</td>
                <td>{{$company->description}}</td>
                <td>
                    <button data-toggle="modal" data-target="#confirmModal"><img src="/imgs/delete.svg"></button>
                </td>
            </tr>

            <!-- delete Modal -->
            <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Confirm delete</h5>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete this company.</p>
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('deletecompany', ['id' => $company->id])}}" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-success">delete item</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end delete modal -->
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Create Company</h5>
                </div>
                <div class="modal-body">
                    <form class="form-group" method="post" enctype="multipart/form-data" action="{{ route('companies') }}">
                        @csrf
                        <div class="form-group">
                            <label class="sr-only" for="name">Name</label>
                            <span>Company Name</span>
                            <div class="input-group">
                                <input type="text" id="name" class="form-control"  name="name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="sr-only" for="email">Email</label>
                            <span>Company Email</span>
                            <div class="input-group">
                                <input type="text" id="email" class="form-control"  name="email">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="sr-only" for="phone">phone</label>
                            <span>Company Phone</span>
                            <div class="input-group">
                                <input type="text" id="phone" class="form-control" name="phone">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="location">Location</label>
                            <span>Company Location</span>
                            <div class="input-group">
                                <input type="text" id="location" class="form-control" name="location">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="sr-only" for="description">Description</label>
                            <span>About Company</span>
                            <div class="input-group">
                                <textarea rows="3" id="description" class="form-control" name="description" ></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="sr-only" for="proof">Proof</label>
                            <span>Company proof</span>
                            <div class="input-group">
                                <input type="file" id="proof" class="form-control" name="proof" placeholder="copy company registration" >
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
