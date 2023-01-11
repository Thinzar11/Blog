@extends('layouts.app')
@section('content')
{{-- @dd($article); --}}
  <!-- singloe blog section -->
  <div class="container">
    @if ($errors->any())
    @foreach ($errors->all() as $err )
    <div class="alert alert-warning">{{$err}}</div>
    @endforeach
    @endif

    @if (session('info'))
    <div class="alert alert-warning">{{session('info')}}</div>
    @endif

    <div class="row">
      <div class="col-md-6 mx-auto text-center">
        <img src="{{"/uploads/articles/$article->photo"}}"
            class="card-img-top" style="height:200px"
            alt="..."
          />
        <h3 class="mt-3 mb-0">{{$article->title}}</h3>
        <p class="fs-6 text-secondary m-0">
            {{$article->user->name}}
            <span> - {{($article->created_at)->diffForHumans()}}</span>
          </p>
        <p class="lh-md">
          {{$article->body}}
        </p>
      </div>
    </div>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="bg-info text-white text-left text-bold px-3 py-2 fw-bolder mb-3 rounded">Comments</div>
            <ul class="list-group">
                @foreach ($article->comments as $comment )
                <li class="list-group-item me-0">
                    <div class="d-flex">
                    <img src="/uploads/articles/user.jpg" alt="" class="mt-1" style="width: 40px; height: 35px">
                    <div class="ms-2">
                    <strong class="mt-1 d-inline-block me-1">{{$comment->user->name}}</strong><small class="text-primary">({{($comment->created_at)->diffForHumans()}})</small>
                    <p class="text-muted">{{$comment->content}}</p>

                    </div>
                    </div>
                    <a href="{{url("/comment/delete/$comment->id")}}" class="float-end btn-close py-1 px-2 border shadow  d-inline" style="margin-right: -15px;
                    margin-bottom: -9px;"></a>
                </li>
                @endforeach
            </ul>
            <form action="{{url("/comment/add")}}" method="post">
            @csrf
            <input type="hidden" name="article_id" value="{{$article->id}}">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Add a comment" name="content">
                <button class="btn btn-outline-secondary" type="submit" >Button</button>
              </div>
            </form>
        </div>
    </div>

  </div>

  {{-- <section class="blogs_you_may_like">
    <div class="container">
      <h3 class="text-center my-4 fw-bold">Blogs You May Like</h3>
      <div class="row text-center">
        <div class="col-md-4 mb-4">
          <div class="card">
            <img
              src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
              class="card-img-top"
              alt="..."
            />
            <div class="card-body">
              <h3 class="card-title">Blog title</h3>
              <p class="fs-6 text-secondary">
                Hlaing Min Than
                <span> - 2days ago</span>
              </p>
              <div class="tags my-3">
                <span class="badge bg-primary">Html</span>
                <span class="badge bg-secondary">Css</span>
                <span class="badge bg-success">Php</span>
                <span class="badge bg-danger">Javascript</span>
                <span class="badge bg-warning text-dark">Frontend</span>
              </div>
              <p class="card-text">
                Some quick example text to build on the Blog title and make up
                the bulk of the card's content.
              </p>
              <a href="./single.html" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img
              src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
              class="card-img-top"
              alt="..."
            />
            <div class="card-body">
              <h3 class="card-title">Blog title</h3>
              <p class="fs-6 text-secondary">
                Hlaing Min Than
                <span> - 2days ago</span>
              </p>
              <div class="tags my-3">
                <span class="badge bg-primary">Html</span>
                <span class="badge bg-secondary">Css</span>
                <span class="badge bg-success">Php</span>
                <span class="badge bg-danger">Javascript</span>
                <span class="badge bg-warning text-dark">Frontend</span>
              </div>
              <p class="card-text">
                Some quick example text to build on the Blog title and make up
                the bulk of the card's content.
              </p>
              <a href="./single.html" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img
              src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
              class="card-img-top"
              alt="..."
            />
            <div class="card-body">
              <h3 class="card-title fw-bold">Blog title</h3>
              <p class="fs-6 text-secondary">
                Hlaing Min Than
                <span> - 2days ago</span>
              </p>
              <div class="tags my-3">
                <span class="badge bg-primary">Html</span>
                <span class="badge bg-secondary">Css</span>
                <span class="badge bg-success">Php</span>
                <span class="badge bg-danger">Javascript</span>
                <span class="badge bg-warning text-dark">Frontend</span>
              </div>
              <p class="card-text">
                Some quick example text to build on the Blog title and make up
                the bulk of the card's content.
              </p>
              <a href="./single.html" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> --}}
  <div class="bg-dark text-white p-5">
    <footer class="py-3">
      <p class="text-center">&copy; 2023 Blogs By Thinzar Nwe</p>
    </footer>
  </div>
@endsection
