@props(['item' => $item ?? null])
<div class="card">
    <img src="{{ asset($item->image_url ? 'storage/' . $item->image_url : 'images/default-food.jpg') }}" class="card-img-top" alt="..." style="height: 240px">
    <div class="card-body border-top">
        <h5 class="card-title">{{ $item->name ?? '' }}</h5>
        <p class="card-text mb-1"><span class="text-muted">Price:</span> <strong>{{ $item->price }} TK</strong></p>
        <p class="card-text mb-1 "><span class="text-muted">Type:</span> <span>{{ $item->type }}</span></p>
        <p class="card-text mb-1 "><span class="text-muted">Provider:</span> <a href="{{ route('restaurants.menus', ['rest_id' => $item->vendor_id])}}">{{ $item->vendor->name ?? ' ' }}</a></p>

        <a href="{{ route('menu.show', ['id' => $item->id]) }}" class="btn btn-info mt-3">View Details</a>
        @if ($item->canBeAddedToCart())
            <a class="btn btn-warning mt-3" href="{{ route('cart.add', ['id' => $item->id, 'qty' => 1]) }}">Add to Cart</a>
        @elseif($item->isAddedToCart())
          <a class="btn btn-danger mt-3" href="{{ route('cart.remove', ['id' => $item->id]) }}">Remove from Cart</a>
        @endif
    </div>
</div>