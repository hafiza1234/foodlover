@props(['item' => $item ?? null])
<div class="card">
    <img src="{{ asset($item->image_url ? 'storage/' . $item->image_url : 'images/default-food.jpg') }}" class="card-img-top" alt="..." style="height: 240px">
    <div class="card-body">
        <h5 class="card-title">{{ $item->name ?? '' }}</h5>
        <p class="card-text">
          {{ $item->description ?? '' }}
        </p>
        <a href="{{ route('menu.show', ['id' => $item->id]) }}" class="btn btn-info mt-3">View Details</a>
    </div>
</div>