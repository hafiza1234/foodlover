<x-app-layout>
	<x-slot name="py">2</x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
			Chinese 
		</h2>
    </x-slot>

    <div class="container ">
        <div class="row">
            @for($i = 0; $i < 9; $i++)
				<div class="col-md-4 mt-4">
					<div class="card">
						<img src="{{ asset("images/3-dragons-at-pearl (6).jpg") }}" class="card-img-top" alt="...">
						<div class="card-body">
							<h5 class="card-title">Card title</h5>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							<a href="{{ route('restaurants.show', ['id' => $i]) }}" class="btn btn-primary">Go somewhere</a>
						</div>
					</div>
				</div>
            @endfor
        </div>
    </div>
</x-app-layout>
