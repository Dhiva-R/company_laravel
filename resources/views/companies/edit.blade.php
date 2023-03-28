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
        <form method="post" action="{{ route('company.update', $company->id) }}">
            <div class="form-group">
                @csrf
                @method('PATCH')
                <label for="name">Name</label>
                <input type="text" class="form-control" name="Name" value="{{ $company->Name }}"/>
            </div>
            <div class="form-group">
                <label for="name">Address</label>
                <input type="text" class="form-control" name="Address" value="{{ $company->Address }}"/>
            </div>
            <div class="form-group">
                <label for="name">Website</label>
                <input type="text" class="form-control" name="Website" value="{{ $company->Website }}"/>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="Email" value="{{ $company->Email }}"/>
            </div>
            <button type="submit" class="btn btn-block btn-danger">Update company</button>
        </form>
    </div>
  </div>
@endsection
