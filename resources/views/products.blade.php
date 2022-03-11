<x-app>
	<div class="container">
		<div class="p-4 pb-0 m-4">
			
			<h1>{{ $category }}</h1>

			<div class="row">
				@if ($category == "Games")
					@forelse ($products as $product)
						<x-card-vert-game  :product="$product"/>
						@if ($loop->iteration % 5 == 0)
							<div class="w-100"></div>
						@endif
					@empty
						why is there nothing wtf
					@endforelse
				@endif

				@if ($category == "Consoles")
					@forelse ($products as $product)
						<x-card-vert-consoles  :product="$product"/>
						@if ($loop->iteration % 5 == 0)
							<div class="w-100"></div>
						@endif
					@empty
						why is there nothing wtf
					@endforelse
				@endif

				@if ($category == "Prebuilds")
					@forelse ($products as $product)
						<x-card-vert-prebuilds  :product="$product"/>
						@if ($loop->iteration % 5 == 0)
							<div class="w-100"></div>
						@endif
					@empty
						why is there nothing wtf
					@endforelse
				@endif

				@if ($category == "Components")
					@forelse ($products as $product)
						<x-card-vert-components  :product="$product"/>
						@if ($loop->iteration % 5 == 0)
							<div class="w-100"></div>
						@endif
					@empty
						why is there nothing wtf
					@endforelse
				@endif
			</div>
		</div>
	</div>
</x-app>
