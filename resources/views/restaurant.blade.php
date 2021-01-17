<x-app-layout>
    <x-slot name="header">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active" data-interval='3000'>
                <img src="{{ asset("images/3-dragons-at-pearl (6).jpg") }}" class="d-block w-100" style="max-height: 300px;" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h3>First slide label</h3>
                  <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                </div>
              </div>
              <div class="carousel-item" data-interval='3000'>
                <img  src="{{ asset("images/3-dragons-at-pearl (6).jpg") }}" class="d-block w-100" style="max-height: 300px;" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h3>Second slide label</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
              </div>
              <div class="carousel-item" data-interval='3000'>
                <img  src="{{ asset("images/3-dragons-at-pearl (6).jpg") }}" class="d-block w-100" style="max-height: 300px;" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h3>Third slide label</h3>
                  <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
    </x-slot>

    <div class="container ">
        <div class="row">
            @for($i = 0; $i < 9; $i++)
            <div class="col-md-4 mt-4">
                <div class="card">
                    <img src="{{ asset("images/3-dragons-at-pearl (6).jpg") }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="{{ route('restaurants.show', ['id' => $i]) }}" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>


</x-app-layout>
