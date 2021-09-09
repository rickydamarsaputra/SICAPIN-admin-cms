@extends('layout.dashboard')
@section('title', 'Article')

@section('content')
<div class="section-header d-flex justify-content-between">
  <h1>@yield('title') Page</h1>
  <a href="{{ route('article.create.view') }}" class="btn btn-primary text-capitalize">
    <i class="fas fa-plus-circle"></i> add article
  </a>
</div>
<div class="section-body">
  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped" id="table-1">
          <thead>
            <tr>
              <th class="text-center">
                #
              </th>
              <th>Article Name</th>
              <th>Thumbnail</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($articles as $article)
              <tr>
                <td class="align-middle">{{ $loop->iteration }}</td>
                <td class="align-middle">{{ $article->title }}</td>
                <td class="align-middle">
                  <img src="{{ $article->thumbnail }}" alt="{{ $article->title }}" class="img-thumbnail" style="width: 150px; height: 100px; object-fit: cover;">
                </td>
                <td class="align-middle">
                  <div class="d-flex">
                    <form action="{{ route('article.delete', $article->id) }}" method="post">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                    <a href="#" class="btn btn-success btn-sm mx-2">Update</a>
                    <a href="{{ route('article.detail', $article->id) }}" class="btn btn-info btn-sm">Detail</a>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection