@extends('layouts.app')
@section('content')

<div class="card push-top">
    <div class="card-header">
      Edit & Update
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
        <form method="post" action="{{ route('employees.update', $employee->id) }}">
            <div class="form-group">
                @csrf
                @method('PATCH')
                <label for="name">FirstName</label>
                <input type="text" class="form-control" name="FirstName" value="{{ $employee->FirstName }}"/>
            </div>
            <div class="form-group">
                <label for="name">LastName</label>
                <input type="text" class="form-control" name="LastName" value="{{ $employee->LastName }}"/>
            </div>
            {{-- <div class="form-group">
                <label for="name">company_id</label>
                <input type="text" class="form-control" name="company_id" value="{{ $employee->company_id }}"/>
            </div> --}}
            <div class="form-group">
                <label for="name">Company</label>
                <select class="form-control"  name="company_id" required focus>

                     <option value="Name" selected>Select </option>
                    @foreach($companyname as $key)

                    <option value="{{$key->id}}" {{$key->id == $employee->company_id ? 'selected': ''}} >{{$key->Name}}</option>
                    {{-- {{ $employee->id == $key->Name ? 'selected="selected"' : '' }} --}}
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="Email" value="{{ $employee->Email }}"/>
            </div>
            <div class="form-group">
                <label for="name">Phone</label>
                <input type="tel" class="form-control" name="Phone" value="{{ $employee->Phone }}"/>
            </div>
            <button type="submit" class="btn btn-block btn-danger">Update employee</button>
        </form>
    </div>
  </div>
@endsection
