  <div class="col-md-12 col-lg-4 sidebar">
    <div class="sidebar-box">
      <div class="bio text-center">
        <img src="https://scontent.fsgn13-2.fna.fbcdn.net/v/t1.6435-9/126224461_1316154408735324_1156186177161694527_n.jpg?_nc_cat=108&ccb=1-5&_nc_sid=174925&_nc_ohc=mnqC0DU_hZ8AX9LpAV9&_nc_ht=scontent.fsgn13-2.fna&oh=00_AT_JqG26qF_KHYJNDbivh8caa42thSgHJGyDbPgZ9oXMBw&oe=6271C1D5" alt="Image Placeholder" class="img-fluid">
        <div class="bio-body">
          <h2>{{ $setting->owner }}</h2>
           <p>{{ $setting->bio }}</p>
          <p><a href="{{ $setting->web_portfolio }}" class="btn btn-primary btn-sm rounded">My Profile</a></p>
          <p class="social">
            <a href="{{ $setting->fb }}" class="p-2"><span class="fa fa-facebook"></span></a>
            <a href="{{ $setting->twitter }}" class="p-2"><span class="fa fa-twitter"></span></a>
            <a href="{{ $setting->instagram }}" class="p-2"><span class="fa fa-instagram"></span></a>
          </p>
        </div>
      </div>
    </div>
    <!-- END sidebar-box -->
    <div class="sidebar-box">
      <h3 class="heading">Related Posts</h3>
      <div class="post-entry-sidebar">
        <ul>
          @foreach($random as $rand)
          <li>
            <a href="{{ url('/article/' . $rand->slug) }}">
              <img src="{{ $rand->header_articles }}" alt="{{ $rand->title }}" class="mr-4">
              <div class="text">
                <h4>{{$rand->title}}</h4>
                <div class="post-meta">
                  <span class="mr-2">{{$rand->created_at}} </span>
                </div>
              </div>
            </a>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
    <!-- END sidebar-box -->

    <div class="sidebar-box">
      <h3 class="heading">Categories</h3>
      <ul class="categories">
          @foreach($categories as $cat)
              <li><a href="{{ url('/category/' . $cat->slug) }}">{{$cat->name}}<span>{{$cat->article->count()}}</span></a></li>
          @endforeach
      </ul>
    </div>
    <!-- END sidebar-box -->
  </div>
  <!-- END sidebar -->
