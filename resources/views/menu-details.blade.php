<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $menu->name }}
        </h2>
    </x-slot>

    <div class="row mt-4">
        <div class="col-md-12">
            {{-- <x-menu-item :item="$menu"></x-menu-item> --}}
            <div class="card mb-3" >
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="{{ asset($menu->image_url ? 'storage/' . $menu->image_url : 'images/default-food.jpg') }}" class="card-img-top" alt="..." style="height: 240px">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{{ $menu->name }}</h5>
                      <p class="card-text">{{ $menu->description }}</p>
                      <p class="card-text mb-0"><span class="text-muted">Price:</span> <strong>{{ $menu->price }} TK</strong></p>
                      <p class="card-text mt-1 mb-0"><span class="text-muted">Type: {{ $menu->type }}</span> </p>
                      <p class="card-text mt-1"><span class="text-muted">Vendor: {{ $menu->vendor->name }}</span> </p>
                      <a href="#" class="btn btn-warning">Add To Cart</a>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12  mt-5">
            <h4 class="txt-warning">Others Item</h4>
        </div>
    </div>

    <div class="row">
        @foreach($menuList as $item)
        <div class="col-md-4 mb-4">
            <x-menu-item :item="$item"></x-menu-item>
        </div>
        @endforeach
    </div>
</x-app-layout>
