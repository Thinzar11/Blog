@extends('layouts.app')
@section('content')
        <header class="header">
           <div class="text-box ">
            <h1 class="heading-primary">
                <span class="heading-primary-main">welcome to</span>
                <spam class="heading-primary-sub">Inspirezone.teach</spam>
            </h1>
            <a href="{{"/articles"}}" class="button btn--white">Read Blogs</a>
           </div>
        </header>

        <section class="container" style="height: 100vh;">
            <div class="row">
                <div class="col-md-6 align-self-center col-sm-12">
                    <h2 class=" heading-secondary">About Us</h2>
                    <p class="heading-content">Inspirezone.teach presents articles related to Basic programming. You can
                        post your own article and then give comments other article that you interested. Every content in the blog Trustful & High Quality Content. There is an update blog everytime. You can check it out every day.</p>
                </div>
                <div class="col-md-6  col-sm-12">
                    <img src="./img/gummy-programming.svg" alt="" class="w-100">
                </div>
            </div>

        </section>

        <section class="blog container mb-4">
            <div class="row">
                <h2 class="heading-secondary text-center pt-3 pb-2">Latest Blogs</h2>
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
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <a href="{{url("/articles")}}" class="btn btn-primary text-white w-100">See all blogs</a>
                </div>
            </div>
        </section>
          <!-- footer -->
  <div class="bg-dark text-white p-5">
    <footer class="py-3">
      <p class="text-center">&copy; 2023 Blogs By Thinzar Nwe</p>
    </footer>
  </div>
@endsection
