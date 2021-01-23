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
                <img src="{{ asset('images/chinese/1.jpg') }}" class="d-block w-100" style="max-height: 350px;" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h3 class="fs-1 fw-bold">Chinese</h3>
                  <p>Chinese food staples such as rice, soy sauce, noodles, tea, chili oil and tofu, and utensils such as chopsticks and the wok, can now be found worldwide.</p>
                </div>
              </div>
              <div class="carousel-item" data-interval='3000'>
                <img  src="{{ asset("images/fastfood/1.jpg") }}" class="d-block w-100" style="max-height: 350px;" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h3 class="fs-1 fw-bold">Fast Bood</h3>
                  <p>Fast food refers to food that can be prepared and served quickly..</p>
                </div>
              </div>
              <div class="carousel-item" data-interval='3000'>
                <img  src="{{ asset("images/homemade/1.jpg") }}" class="d-block w-100" style="max-height: 350px;" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h3 class="fs-1 fw-bold">Homemade Food</h3>
                  <p>Eating homemade foods is usually much cheaper than eating at a restaurant or buying processed foods from the market. </p>
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

    @foreach($menuList->groupBy('type') as $group  => $itemList)
      {{-- <header class="bg-white shadow"> --}}
          <h3 class="max-w-7xl mx-auto pt-3 pb-2 mt-4 pl-1">
              <span class="border-bottom border-warning"> {{ $group ?? '' }} </span>
          </h3>
      {{-- </header> --}}
      <div class="row">
        @foreach($itemList as $item)
          <div class="col-md-4 mt-2">
            <x-menu-item :item="$item"></x-menu-item>
          </div>
        @endforeach
      </div>
    @endforeach
</x-app-layout>
