<x-app>
	<div class="container">
		<div class="p-4 pb-0 m-4">

			<div class="row">
				<h1 class="col">{{ ucfirst($category) }}</h1>
				<div class="col-sm-1 row">
					<a type="button" href="{{ url('/products/' . $category . '/horizontal') }}" class="col-sm-1 text-dark align-right float-end d-inline-block text-center p-2 px-3">
						<i class="text-dark bi bi-distribute-horizontal"></i>
					</a>
					<a type="button" href="{{ url('/products/' . $category . '/vertical') }}" class="col-sm-1 text-dark align-right float-end d-inline-block text-center p-2 px-3">
						<i class="text-dark bi bi-distribute-vertical"></i>
					</a>
				</div>
			</div>

			<div class="row">	
			@if ($orientation == "horizontal")
				@forelse ($products as $product)
					<x-card-hori-product class="product" :product="$product" :orientation="$orientation" :category="$category"/>
					@if ($loop->iteration % 5 == 0)
						<div class="w-100"></div>
					@endif
				@empty
					why is there nothing wtf
				@endforelse
			@elseif ($orientation == "vertical")
				@forelse ($products as $product)
					<x-card-vert-product class="product" :product="$product" :orientation="$orientation" :category="$category"/>
					@if ($loop->iteration % 1 == 0)
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
