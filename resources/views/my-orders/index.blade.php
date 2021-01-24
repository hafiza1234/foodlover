<x-app-layout :py=1>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Order List
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
                                <th>Vendor</th>
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
                                    <a href="{{ url('my-orders/' . $order->id) }}">
                                        #{{ $order->id }}
                                    </a>
                                </td>
                                <td>{{ $order->vendor->name ?? '' }}</td>
                                <td class="text-right">{{ number_format($order->total_amount, 2) }}</td>
                                <td><span class="badge badge-{{ $order->status == 5 ? 'danger' : 'success' }}"> {{ $order->getStatus() }} </span></td>
                                <td>{{ Carbon\Carbon::parse($order->order_date)->format('M d, Y') }}</td>
                                <td> 
                                    <a class="btn btn-info btn-sm" href="{{ route('my-order.show', ['id' => $order->id]) }} ">Details</a>
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
