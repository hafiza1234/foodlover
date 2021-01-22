<x-app-layout :py=1>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Menu List
            <a class="btn btn-success btn-sm float-right" href="{{ url('admin/menus/create') }}">Add New</a>
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
                                <th>Image</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Price</th>
                                <th> Description</th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($menuList as $key => $menu)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    <img src="{{ url('storage/' . $menu->image_url ) }}" width="30" >
                                </td>
                                <td>{{ $menu->name }}</td>
                                <td> {{ $menu->type }}</td>
                                <td> {{ $menu->price }}</td>
                                <td> {{ $menu->description }}</td>
                                <td> 
                                    <a href="{{url('admin/menus/' . $menu->id . '/edit')}}"> Edit </a>
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
