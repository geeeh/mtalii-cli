@extends('layouts.dashboard')
<div class="dashboard">
    @include('partials.dashheader')
    <div class="sidebar-links">
        @include('partials.dashside')
    </div>
    @yield('data-section')

</div>
