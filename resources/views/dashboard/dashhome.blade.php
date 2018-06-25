@extends('dashboard.stats')
@section('data-section')
<div class="charts">
    <div class="row">

        <div class="col-sm-4">
            <div id="chart-div"></div>
            @donutchart('IMDB', 'chart-div')
        </div>

        <div class="col-sm-8">
        <div id="perf_div"></div>
        @columnchart('Finances', 'perf_div')
        </div>

        <div class="col-sm-12">
            <div id="pop_div"></div>
            @linechart('Temps', 'pop_div')
        </div>

    </div>
</div>
    @endsection