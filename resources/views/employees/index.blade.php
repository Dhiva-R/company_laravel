@extends('layouts.app')
@section('content')

<h1>Employee</h1>
<div class="card-header">
    <a href="{{ route('employees.create')}}" class="btn btn-primary btn-sm"">Create</a>
  </div>

  <div class="push-top">
    @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}
      </div><br />
    @endif
    <table class="table">
      <thead>
          <tr class="table-warning">
            <td>id</td>
            <td>FirstName</td>
            <td>LastName</td>
            <td>company</td>
            <td>Email</td>
            <td>Phone</td>

            <td class="text-center">Action</td>
          </tr>
      </thead>

      <tbody>
        @foreach($employee as $employees)
        <tr>
            <td>{{$employees->id}}</td>
            <td>{{$employees->FirstName}}</td>
            <td>{{$employees->LastName}}</td>
            <td>{{$employees->company->Name}}</td>
            <td>{{$employees->Email}}</td>
            <td>{{$employees->Phone}}</td>
            <td class="text-center">
                 <a href="{{ route('employees.edit', $employees->id)}}" class="btn btn-primary btn-sm"">Edit</a>
                <form action="{{ route('employees.destroy', $employees->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"" type="submit">Delete</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
    {{$employee->links()}}
    <a href="{{ route('employees.export') }}" class="btn btn-primary">Export Employees</a>

@endsection
