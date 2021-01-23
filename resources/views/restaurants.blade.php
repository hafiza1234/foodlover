<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Restaurant List
        </h2>
    </x-slot>

    <div class="row">
        @foreach($restaurantList as $item)
            <div class="col-md-4 mt-4">
                <div class="card">
                    <img src="{{ asset($item->avatar_url ? $item->avatar_url : 'images/default-food.jpg') }}" class="card-img-top" alt="..." style="max-height: 240px">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name ?? '' }}</h5>
                        <p class="card-text">
                        {{ $item->description ?? '' }}
                        </p>
                        <a href="{{ route('restaurants.menus', ['rest_id' => $item->id]) }}" class="btn btn-info mt-3">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
