@extends('layout.dashboard')
@section('title', 'Quiz')

@section('content')
<div class="section-header d-flex justify-content-between">
  <h1>@yield('title') Page</h1>
  <a href="{{ route('category.create.view') }}" class="btn btn-primary text-capitalize">
    <i class="fas fa-plus-circle"></i> add quiz
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
              <th>Question</th>
              <th>Correct Answer</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection