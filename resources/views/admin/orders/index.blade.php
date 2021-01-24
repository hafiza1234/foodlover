<x-app-layout :py=1>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Customer Order List
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>ID</th>
                                <th>Customer</th>
                                <th>Contact</th>
                                <th class="text-center">Amount</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orderList as $key => $order)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    <a href="{{ route('admin.order.show',[ 'id' => $order->id]) }}">
                                        #{{ $order->id }}
                                    </a>
                                </td>
                                <td>{{ $order->customer->name ?? '' }}</td>
                                <td>{{ $order->customer->mobile ?? '' }}</td>
                                <td class="text-right">{{ number_format($order->total_amount, 2) }}</td>
                                <td><span class="badge badge-{{ $order->status == 5 ? 'danger' : 'success' }}"> {{ $order->getStatus() }} </span></td>
                                <td>{{ Carbon\Carbon::parse($order->order_date)->format('M d, Y') }}</td>
                                <td> 
                                    @if($order->status != 5)
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{ $order->getStatus() }}
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="z-index: 99">
                                                <a class="dropdown-item" href="{{ route('admin.order.change_status', ['id' => $order->id, 'status' => 2]) }}"> {{ $order->getStatus(2) }}</a>
                                                <a class="dropdown-item" href="{{ route('admin.order.change_status', ['id' => $order->id, 'status' => 3]) }}"> {{ $order->getStatus(3) }}</a>
                                                <a class="dropdown-item" href="{{ route('admin.order.change_status', ['id' => $order->id, 'status' => 4]) }}"> {{ $order->getStatus(4) }}</a>
                                                <a class="dropdown-item" href="{{ route('admin.order.change_status', ['id' => $order->id, 'status' => 5]) }}"> {{ $order->getStatus(5) }}</a>
                                            {{-- <a class="dropdown-item" href="{{ route('my-order.show', ['id' => $order->id, 'status' => ]) }}">Something else here</a> --}}
                                            </div>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
