@extends('dashboard.stats')
@section('data-section')
    <div class="categories">
        <h5>Activities</h5>
        <hr/>
        <div class="all-categories"></div>
        <div class="hiddenCB">
            <div>
                @foreach($activities as $category)
                <input type="checkbox" name="choice" id="{{$category->id}}" /><label for="{{$category->id}}">{{$category->name}}</label>
                @endforeach

            </div>
        </div>
        <h5>Locations</h5>
        <hr/>
        <div class="all-categories"></div>
        <div class="hiddenCB">
            <div>
                @foreach($locations as $category)
                    <input type="checkbox" name="choice" id="{{$category->id}}" /><label for="{{$category->id}}">{{$category->name}}</label>
                @endforeach

            </div>
        </div>
    </div>

    <script type="text/javascript">

    function checkChecked(formname) {
    var anyBoxesChecked = false;
    $('#' + formname + ' input[type="checkbox"]').each(function() {
    if ($(this).is(":checked")) {
    anyBoxesChecked = true;
    }
    });

    if (anyBoxesChecked == false) {
    //Do something
    }
    }
    </script>
    @endsection
