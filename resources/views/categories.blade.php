@extends('layouts.main')

@section('container')

  <h1 class="mb-5">Post Categories</h1>


  <div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
      @foreach ($categories as $category)
        <div class="col">
          <a href="/posts?category={{ $category->slug }}">
            <div class="card bg-dark text-white border-0">
              <img src="https://source.unsplash.com/500x500/?{{ $category->name }}" class="card-img" alt="{{ $category->name }}">
              <div class="card-img-overlay d-flex align-items-center p-0">
                <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color: rgba(0, 0, 0, 0.7)">{{ $category->name }}</h5>
              </div>
            </div>
          </a>
        </div>
      @endforeach
    </div>
  </div>

@endsection
