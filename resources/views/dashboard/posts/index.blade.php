@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Posts</h1>
  </div>

  @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <div class="col-lg my-3">
    <a class="btn btn-primary mb-3" href="/dashboard/posts/create">
      <span data-feather="plus"></span>
      Create New Post
    </a>

    <table id="myTable" class="table responsive nowrap table-bordered table-striped align-middle" style="width:100%">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Category</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->category->name }}</td>
            <td>
              <a class="btn btn-sm btn-info" href="/dashboard/posts/{{ $post->slug }}">
                <span data-feather="eye"></span>
              </a>
              <a class="btn btn-sm btn-warning" href="/dashboard/posts/{{ $post->slug }}/edit">
                <span data-feather="edit"></span>
              </a>
              <a class="btn btn-sm btn-danger" href="#deleteModal{{ $loop->iteration }}" data-bs-toggle="modal">
                <span data-feather="x-circle"></span>
              </a>
            </td>
          </tr>

          {{-- Delete Post Modal --}}
          <div class="modal fade" id="deleteModal{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Delete Post</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/dashboard/posts/{{ $post->slug }}" method="post">
                  @method('delete')
                  @csrf
                  <div class="modal-body">
                    <p class="fs-6">Are you sure want to delete this post?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          {{-- End Delete Post Modal --}}

        @endforeach
      </tbody>
    </table>
  </div>

@endsection
