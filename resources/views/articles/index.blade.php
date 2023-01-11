@extends('layouts.app')
@section('content')

  <!-- blogs section -->
  <section class="container text-center" id="blogs">
      <div class="lists d-flex justify-content-between py-3">
            @foreach ($category as $cat)
            <a href="#" class="list shadow-sm" style="width: 170px">
                {{$cat->name}}
               </a>
            @endforeach
        </div>

    <form action="{{url('/')}}" class="my-3">
      <div class="input-group mb-3">
        <input
          type="text" name="q"
          autocomplete="false"
          class="form-control"
          placeholder="Search Blogs..."
        />
        <button
          class="input-group-text bg-primary text-light"
          id="basic-addon2"
          type="submit"
        >
          Search
        </button>
      </div>
    </form>
    <div class="row">
        {{$articles->links()}}
        @foreach ($articles as $article )
      <div class="col-md-4 mb-4">
        <div class="card">
          <img
            src="{{"uploads/articles/$article->photo"}}"
            class="card-img-top" style="height:200px"
            alt="..."
          />
          <div class="card-body">
            <h3 class="card-title text-bold">{{$article->title}}</h3>
            <p class="fs-6 text-secondary">
              {{$article->user->name}}
              <span> - {{($article->created_at)->diffForHumans()}}</span>
            </p>
            <div class="tags my-3">
                <span class="badge bg-primary" style="text-transform:capitalize;">{{$article->category->name}}</span>
                <span class="badge bg-secondary">General</span>
                <span class="badge bg-secondary">Frontend</span>
                <span class="badge bg-secondary ">Backend</span>
              </div>
            <p class="card-text">
             {{Illuminate\Support\Str::limit($article->body, 120)}}
            </p>
            <a href="{{url("/articles/detail/$article->id")}}" class="btn btn-primary">Read More</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </section>

  <!-- subscribe new blogs -->
  {{-- <section class="container my-4 text-center" id="subscribe">
    <div class="row">
      <div class="col-md-6 mx-auto">
        <h3 class="fw-bold mb-4">Subscribe For new blogs</h3>
        <form>
          <div class="mb-3">
            <input
              placeholder="Email Address"
              type="email"
              class="form-control"
              autocomplete="false"
            />
          </div>
          <button type="submit" class="btn btn-primary">Subscribe Now</button>
        </form>
      </div>
    </div>
  </section> --}}

  <!-- footer -->
  <div class="bg-dark text-white p-5">
    <footer class="py-3">
      <p class="text-center">&copy; 2023 Blogs By Thinzar Nwe</p>
    </footer>
  </div>
@endsection
