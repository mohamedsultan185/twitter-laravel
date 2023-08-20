<STYle>.button-spacing {
    margin-right: 250px;
}</STYle>
<div class="center-flex-container flex-item">
    <div class="home">
      <h1>Home</h1>
      <i class="fas fa-magic"></i>
    </div>

    <div class="post-tweet">
      <form action="{{route('tweets.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group-1">
          <img src="./img/profile.jpg" alt="profile-pics">
          <input type="text" name="content" placeholder="What's happening?">

          @error('name')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror

        </div>
        <div class="form-group">
            <div class="btn-group">
                <button type="button" class="btn btn-primary image-button"><i class="far fa-image"></i></button>
                <input type="file" class="d-none" id="imageInput" name="image" accept="image/*">
            </div>
                <button class="btn btn-primary" type="submit">Tweet</button>
            </a>
        </div>


      </form>

    </div>
