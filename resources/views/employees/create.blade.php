@extends('layouts.app')
@section('content')

<div class="card push-top">
    <div class="card-header">
      Create New Employee
    </div>

    <div class="card-body">
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
            </ul>
          </div><br />
        @endif

        <form method="post" action="{{ route('employees.store') }}">
            <div class="form-group">
                @csrf
                <label for="name">FirstName</label>
                <input type="text" class="form-control" name="FirstName"/>
            </div>
            <div class="form-group">
                <label for="name">LastName</label>
                <input type="text" class="form-control" name="LastName"/>
            </div>
            {{-- <div class="form-group">
                <label for="name">company</label>
                <input type="text" class="form-control" name="company_id"/>
            </div> --}}
            <div class="form-group">
                <label for="name">Company</label>
                <select class="form-control"  name="company_id" required focus>
                    <option value="Name"  selected>Select Company</option>
                    @foreach($companyname as $list)
                    <option value="{{$list->id}}">{{$list->Name}}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="Email"/>
            </div>
            <div class="form-group">
                <label for="name">Phone</label>
                <input type="tel" class="form-control" name="Phone"/>
            </div>
            <button type="submit" class="btn btn-block btn-danger">Create Employee</button>
        </form>
    </div>

<style>

 .card-body{
   width: 25%;

   margin-left: auto;
  margin-right: auto;
 }
 .card-header{
    width: 25%;

margin-left: auto;
margin-right: auto;
 }

</style>

@endsection
