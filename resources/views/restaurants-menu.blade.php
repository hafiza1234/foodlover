<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Menu List of <span class="text-info"> {{ $vendor->name }} </span>
        </h2>
    </x-slot>

    <div class="container ">
        <div class="row">
          @foreach($menuList as $item)
            <div class="col-md-4 mt-2">
                <div class="card">
                    <img src="{{ asset($item->image_url ? 'storage/' . $item->image_url : 'images/default-food.jpg') }}" class="card-img-top" alt="..." style="max-height: 240px">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name ?? '' }}</h5>
                        <p class="card-text">
                          {{ $item->description ?? '' }}
                        </p>
                        <a href="{{ route('restaurants.show', ['id' => $item->id]) }}" class="btn btn-info mt-3">View Details</a>
                    </div>
                </div>
            </div>
          @endforeach
    </div>
</x-app-layout>
