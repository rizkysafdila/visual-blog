@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Category</h1>
  </div>

  <div class="col-lg-4 mb-5">
    <form action="/dashboard/categories" method="post">
      @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Category Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" autofocus required>
        @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" value="{{ old('slug') }}" required>
        @error('slug')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="text-end">
        <button type="submit" class="btn btn-primary">Create Category</button>
      </div>
    </form>
  </div>

  <script>
    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');

    name.addEventListener('change', function() {
      fetch('/dashboard/categories/createSlug?name=' + name.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });
  </script>
@endsection
