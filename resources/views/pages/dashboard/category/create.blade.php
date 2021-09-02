@extends('layout.dashboard')
@section('title', 'Create Category')

@section('content')
<div class="section-header">
  <h1>@yield('title') Page</h1>
</div>
<div class="section-body">
  <div class="card">
    <div class="card-body">
      <form action="{{ route('category.create.process') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="title">Title</label>
          <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">
          @error('title')<small class="form-text text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="form-group">
          <label for="icon">Icon</label>
          <input id="icon" type="file" class="form-control" name="icon">
          @error('icon')<small class="form-text text-danger">{{ $message }}</small>@enderror
        </div>
        <button type="submit" class="btn btn-success"><i class="fas fa-plus-circle"></i> Submit</button>
      </form>
    </div>
  </div>
</div>
@endsection