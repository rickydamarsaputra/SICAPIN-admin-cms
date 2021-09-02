@extends('layout.dashboard')
@section('title', 'Category')

@section('content')
<div class="section-header d-flex justify-content-between">
  <h1>@yield('title') Page</h1>
  <a href="{{ route('category.create.view') }}" class="btn btn-primary text-capitalize">
    <i class="fas fa-plus-circle"></i> add category
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
              <th>Category Name</th>
              <th>Icon</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $category)
              <tr>
                <td class="align-middle">{{ $loop->iteration }}</td>
                <td class="align-middle">{{ $category->title }}</td>
                <td class="align-middle">
                  <img alt="image" src="{{ $category->icon }}" class="shadow rounded-circle mr-1" style="width: 45px; height: 45px; object-fit: cover">
                </td>
                <td class="d-flex">
                  <form action="{{ route('category.delete', $category->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                  </form>
                  <form action="" class="ml-2">
                    <button type="submit" class="btn btn-success btn-sm">Update</button>
                  </form>
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