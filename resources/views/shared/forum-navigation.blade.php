

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand main-nav-brand" href="#">Forum</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-second"
        aria-controls="navbarSupportedContent-second" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-second">
        <ul class="navbar-nav mr-auto">
            @auth()
                <li class="nav-item">
                    <a class="nav-link" href="" data-bs-toggle="modal" data-bs-target="#novaObjava">Nova tema</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('forum.my-topics')}}">Moje objave</a>
                </li>
            @endauth

            <li class="nav-item">
                <a class="nav-link" href="#">Kategorije</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Popularno</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0 d-flex">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

   <!-- Modal for adding new post -->
   <div class="modal fade" id="novaObjava" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="color:green;">Objavi novu temu</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="form-outline mb-4">
        <div class="input-control">
                  <form action="{{route('forum.topic.store')}}" method="POST" id="form">
                    @csrf
                  <label class="form-label" for="title">Naslov</label>
                  <input type="text" id="naslov" name="title" class="form-control form-control-lg" />
                  <div class="error"></div>
  </div>
                </div>
                <div class="form-outline mb-4">
                <div class="input-control">
                  <label class="form-label" for="content">Sadrzaj</label>
                  <textarea class="form-control" id="sadrzaj" rows="3" name="content"></textarea>
                  <div class="error"></div>
                  </div>
                </div>
                <div class="d-flex justify-content-center">
                  <button type="submit" name="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Objavi</button>
                </div>
              </form>
      </div>
    </div>
  </div>
  </div>
