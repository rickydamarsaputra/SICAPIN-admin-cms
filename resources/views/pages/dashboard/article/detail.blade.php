@extends('layout.dashboard')
@section('title', 'Category' . ' ' . $article->title)

@section('content')
<div class="section-header">
  <h1 class="text-capitalize">@yield('title') Page</h1>
</div>
<div class="section-body">
  <div class="card">
    <div class="card-body">
      <div class="form-group">
        <label for="title">Title</label>
        <input id="title" type="text" class="form-control" value="{{ $article->title }}" readonly>
      </div>
      <div class="form-group">
        <label for="thumbnail">Thumbnail</label>
        <img src="{{ $article->thumbnail }}" class="img-fluid img-thumbnail d-block" alt="{{ $article->title }}" style="width: 200px; height: 200px; object-fit: cover;">
      </div>
      <div class="form-group">
        <label for="body">Body</label>
        <textarea id="body" name="body">
          @foreach ($article->body as $item)
            {{ $item }}
          @endforeach
        </textarea>
      </div>
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
    $('#body').summernote('disable');
  });
</script>
@endpush