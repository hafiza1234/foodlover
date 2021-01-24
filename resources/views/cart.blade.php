<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Cart Details <span class="badge badge-warning">{{ $menuList->count() }}</span>
        </h2>
    </x-slot>
    <form action="{{ route('cart.order') }}" id="order-form" method="POST">
      @csrf
    </form>
    <div class="row  justify-content-center">
      <div class="col-md-8 mt-3">
        <div class="card">
          <table class="table">
            <thead>
                <tr>
                    <th class="text-center">SL</th>
                    <th colspan="2" class="text-center pl-0">Name</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Qty</th>
                    <th class="text-center">Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menuList as $key => $menu)
                <tr>
                    <td class="pr-0">
                      <a href="{{ route('cart.remove', ['id' => $menu->id]) }}" class="text-danger mr-2 "> <strong>X</strong> </a>
                      <a href="{{ route('menu.show', ['id' => $menu->id]) }}" class="mr-3">Edit</a>

                      {{ $key + 1 }}
                    </td>
                    <td class="pr-0 pl-0">
                        <img src="{{ url('storage/' . $menu->image_url ) }}" width="50" >
                    </td>
                    <td class="px-0">
                      {{ $menu->name }}
                      <div class="text-muted"> <small>{{ $menu->type }} </small></div>
                    </td>
                    <td class="text-right"> {{ $menu->price }}</td>
                    <td class="text-center">
                      {{ $menu->qty }}
                      <input form="order-form" name="menu[{{$menu->id}}][qty]" type="hidden" min=1 value="{{ $menu->qty }}">
                      <input form="order-form" name="menu[{{$menu->id}}][amount]" type="hidden" min=1 value="{{ $menu->price }}">
                      <input form="order-form" name="menu[{{$menu->id}}][menu_id]" type="hidden" min=1 value="{{ $menu->id }}">
                      <input form="order-form" name="menu[{{$menu->id}}][total_amount]" type="hidden" min=1 value="{{ $menu->total }}">
                    </td>
                    <td class="text-right pr-3">
                      <small class="text-muted">{{ $menu->price }} x {{ $menu->qty }}</small> = <strong>{{ number_format($menu->price * $menu->qty, 2)  }}</strong>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-md-4 mt-3">
        <div class="card">
          <div class="card-header">
            <div>Summery</div>
          </div>
          <div class="card-body">
            <div class="row justify-content-center">
              <div class="col-md-12">
                <table class="table w-100">
                  <tbody >
                    <tr>
                      <td>Total</td>
                      <th class="text-right"> {{ number_format($total = $menuList->sum('total'), 2) }} TK</th>
                      <input class="p-0 w-10" form="order-form" name="total" type="hidden" min=1 value="{{ $total }}">
                    </tr>
                    <tr>
                      <td class="">Payment</td>
                      <td class="text-right pl-0 text-muted">Cash on Delivery </td>
                    </tr>
                    <tr>
                      <td colspan="2"> 
                        <label for="address" class="form-label">Shipping Address</label>
                        <input form="order-form" name="vendor_id" type="hidden" min=1 value="{{ $menu->vendor_id }}">

                        <textarea required form="order-form" name="address" class="form-control" id="address"></textarea>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2 px-0">
                        <input type="submit" form="order-form" value="Place Order" class="btn btn-block btn-warning" name="checkout">
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</x-app-layout>
