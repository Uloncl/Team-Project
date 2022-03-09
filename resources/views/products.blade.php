<x-app>
	<main class="container">
		<div class="container">
			<div class="row p-4 pb-0 m-4">
				
				<h1>{{ $category }}</h1>

				@if ($category == "Games")
					@forelse ($products as $product)
						<x-game-vert-card  :product="$product"/>
						@if ($loop->iteration % 4 == 0)
							<div class="w-100"></div>
						@endif
					@empty
						why is there nothing wtf
					@endforelse
				@endif
				
			</div>
		</div>
	</main>
</x-app>
