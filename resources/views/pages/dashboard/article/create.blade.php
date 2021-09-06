@extends('layout.dashboard')
@section('title', 'Create Article')

@section('content')
<div class="section-header">
  <h1>@yield('title') Page</h1>
</div>
<div class="section-body">
  <div class="card">
    <div class="card-body">
      <form action="{{ route('article.create.process') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="title">Title</label>
          <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">
          @error('title')<small class="form-text text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="form-group">
          <label for="category">Category</label>
          <select id="category" class="form-control select2" name="category">
            @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="thumbnail">Thumbnail</label>
          <input id="thumbnail" type="file" class="form-control" name="thumbnail">
          @error('thumbnail')<small class="form-text text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="form-group">
          <label for="body">Body</label>
          <textarea id="body" name="body"></textarea>
          @error('body')<small class="form-text text-danger">{{ $message }}</small>@enderror
        </div>
        <button type="submit" class="btn btn-success"><i class="fas fa-plus-circle"></i> Submit</button>
      </form>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  $(document).ready(function(){
    $('#body').summernote({
      height: 150,
    });
  });
</script>
@endpush