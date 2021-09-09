@extends('layout.dashboard')
@section('title', 'Category' . ' ' . $category->title)

@section('content')
<div class="section-header">
  <h1 class="text-capitalize">@yield('title') Page</h1>
</div>
<div class="section-body">
  <div class="card">
    <div class="card-body">
      <div class="form-group">
        <label for="title">Title</label>
        <input id="title" type="text" class="form-control" value="{{ $category->title }}" readonly>
      </div>
      <div class="form-group">
        <label for="icon">Icon</label>
        <img src="{{ $category->icon }}" class="img-fluid img-thumbnail d-block" alt="{{ $category->title }}" style="width: 200px; height: 200px; object-fit: cover;">
      </div>
    </div>
  </div>
</div>
@endsection