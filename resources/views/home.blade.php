@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div><br>
          <div class="comp text-center">
            <h3>For Company Site : <a class="nav" href="{{ url('admin/company') }}">Company</a></h3>
            <br><h3>For Employee Site : <a class="nav" href="{{ url('admin/employees') }}">Employee</a></h3>
           </div>
        </div>
    </div>
</div>
<style>
    .comp{
        text-transform: uppercase;
    }
</style>
@endsection
