<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Order Details <span class="badge badge-warning">{{ $order->getStatus() }}</span>
            @if($order->status == 1)
                <a href="{{ route('my-order.cancel', ['id' => $order->id]) }}" class="btn float-right btn-danger"> Cancel Order</a>
            @endif
        </h2>
    </x-slot>
    <form action="{{ route('cart.order') }}" id="order-form" method="POST">
      @csrf
    </form>
    <div class="row justify-content-center">
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
                @foreach($order->items as $key => $item)
                <tr>
                    <td class="pr-0">
                      {{ $key + 1 }}
                    </td>
                    <td class="pr-0 pl-0">
                        <img src="{{ url('storage/' . $item->menu->image_url ) }}" width="50" >
                    </td>
                    <td class="px-0">
                      {{ $item->menu->name }}
                      <div class="text-muted"> <small>{{ $item->menu->type }} </small></div>
                    </td>
                    <td class="text-right"> {{ $item->menu->price }}</td>
                    <td class="text-center">
                      {{ $item->menu->qty }}
                    </td>
                    <td class="text-right pr-3">
                      <small class="text-muted">{{ $item->amount}} x {{ $item->qty }}</small> = <strong>{{ number_format($item->amount * $item->qty, 2)  }}</strong>
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
            <div>Summary</div>
          </div>
          <div class="card-body">
            <div class="row justify-content-center">
              <div class="col-md-12">
                <table class="table w-100">
                  <tbody >
                    <tr>
                      <td>Total</td>
                      <th class="text-right"> {{ number_format($total = $order->total_amount, 2) }} TK</th>
                    </tr>
                    <tr>
                      <td class="">Payment</td>
                      <td class="text-right pl-0 text-muted">Cash on Delivery </td>
                    </tr>
                    <tr>
                        <td class="">Status</td>
                        <th class="text-right pl-0 text-warning">{{ $order->getStatus() }}</th>
                    </tr>
                    <tr>
                        <td class="">Date</td>
                        <td class="text-right text-muted pl-0">{{ Carbon\Carbon::parse($order->order_date)->format('M d, Y')  }}</td>
                    </tr>
                    <tr>
                      <td colspan="2"> 
                        <span class="text-muted">Shipping Address</span>
                        <address >
                            {{ $order->address }}
                        </address>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2 px-0">

                        <a href="{{ url('my-orders') }}" class="btn  btn-warning btn-block"> Go to Orders</a>
                       
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
