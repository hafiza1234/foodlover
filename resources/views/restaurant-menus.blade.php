<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Menu List of <span class="text-info"> {{ $vendor->name }} </span>
        </h2>
    </x-slot>

        <div class="row">
          @foreach($menuList as $item)
            <div class="col-md-4 mt-4">
                <x-menu-item :item="$item"></x-menu-item>
            </div>
          @endforeach
</x-app-layout>
