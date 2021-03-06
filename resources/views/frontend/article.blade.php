@extends('layouts.frontend')

@section('title')
    <title>KyDev.id</title>
@endsection

@section('content')

  <section class="site-section py-sm">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
        <br>
          <h2 class="mb-4">Articles</h2>
        </div>
      </div>
      <div class="row blog-entries">
        <div class="col-md-12 col-lg-8 main-content">
          <div class="row">
          @forelse($articles as $row)
            <div class="col-md-6">
              <a href="{{ url('/article/' . $row->slug) }}" class="blog-entry element-animate" data-animate-effect="fadeIn">
                <img src="{{  $row->header_articles }}" alt="{{ $row->title }}">
                <div class="blog-content-body">
                <div class="post-meta">
                  <span class="author mr-2"><img src="https://scontent.fsgn13-2.fna.fbcdn.net/v/t1.6435-9/126224461_1316154408735324_1156186177161694527_n.jpg?_nc_cat=108&ccb=1-5&_nc_sid=174925&_nc_ohc=mnqC0DU_hZ8AX9LpAV9&_nc_ht=scontent.fsgn13-2.fna&oh=00_AT_JqG26qF_KHYJNDbivh8caa42thSgHJGyDbPgZ9oXMBw&oe=6271C1D5" alt="Colorlib"> {{$row->created_by}}</span>&bullet;
                  <span class="mr-2">{{$row->category->name}}</span> &bullet;
                  <span class="ml-2"><span class="fa fa-comments"></span> {{$row->publish_comments->count()}}</span>
                </div>
                <h2>{{ $row->title }}</h2>
                </div>
              </a>
            </div>
          @empty
          @endforelse
          </div>
          <div class="row mt-5">
            <div class="col-md-12 text-center">
              <nav aria-label="Page navigation" class="text-center">
                <ul class="pagination">
                  <li class="page-item">{{ $articles->links() }}</li>
                </ul>
              </nav>
            </div>
          </div>
        </div>

        <!-- END main-content -->

        @include('layouts.frontend.module.sidebar')

      </div>
    </div>
  </section>
@endsection
