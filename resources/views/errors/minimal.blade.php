@if(Str::contains(Request::url() , '/AdminPanel'))
    @include('errors.panel_minimal')
@else
    @include('errors.front_minimal')
@endif
