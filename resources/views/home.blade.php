@extends('layouts.pagelayout')

@section('content')
<div class="container no-gutters">
    <div class="">
        <h2>Welcome {{Auth::user()->name}}</h2>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>
</div>
@endsection
