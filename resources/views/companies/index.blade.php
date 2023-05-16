@extends('layouts.app')
@section('content')

<h1>Company</h1>
<div class="card-header">
    <a href="{{ route('company.create')}}" class="btn btn-primary btn-sm"">Create</a>
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
            <td>Name</td>
            <td>Address</td>
            <td>Website</td>
            <td>Email</td>

            <td class="text-center">Action</td>
          </tr>
      </thead>

      <tbody>
        @foreach($company as $companys)
        <tr>
            <td>{{$companys->id}}</td>
            <td>{{$companys->Name}}</td>
            <td>{{$companys->Address}}</td>
            <td>{{$companys->Website}}</td>
            <td>{{$companys->Email}}</td>
            <td class="text-center">
                 <a href="{{ route('company.edit', $companys->id)}}" class="btn btn-primary btn-sm"">Edit</a>
                <form action="{{ route('company.destroy', $companys->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"" type="submit">Delete</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>

   {{$company->links()}}

  <style>
    /* .com{
        text-align: center;
    } */
  </style>
@endsection
