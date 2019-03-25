@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (\Illuminate\Support\Facades\Auth::user())
                        You are logged in
                    @else
                            <div class="text-danger"><b>You are not logged in</b></div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
