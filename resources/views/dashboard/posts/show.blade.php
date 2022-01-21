@extends('dashboard.layouts.main')

@section('container')

  <div class="container">
    <div class="row my-3">
      <div class="col-lg-8">
        <h1 class="mb-3">{{ $post->title }}</h1>

        <a class="btn btn-success" href="/dashboard/posts">
          <span data-feather="arrow-left"></span>
          Back to all my posts
        </a>
        <a class="btn btn-warning" href="/dashboard/posts/{{ $post->slug }}/edit">
          <span data-feather="edit"></span>
          Edit
        </a>
        <a class="btn btn-danger" href="#deleteModal" data-bs-toggle="modal">
          <span data-feather="x-circle"></span>
          Delete
        </a>

        @if ($post->image)
          <div style="max-height: 350px; overflow: hidden">
            <img class="img-fluid mt-3" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}">
          </div>
        @else
          <img class="img-fluid mt-3" src="https://source.unsplash.com/1200x400/?{{ $post->category->name }}" alt="{{ $post->category->name }}">
        @endif

        <article class="my-3 fs-5">
          {!! $post->body !!}
        </article>

      </div>
    </div>
  </div>

  {{-- Delete Post Modal --}}
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

@endsection
