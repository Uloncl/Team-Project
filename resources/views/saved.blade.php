

<x-app>
    <div class="container h-100">

      <h2 class="pt-5 pb-3">Your Wishlist</h2>

      <div class="card mb-4 border-bottom-0">
        @forelse ($products as $product)
          <x-saved-product :product="$product"/>
        @empty
          <h3>No saved products</h3>
        @endforelse
      </div>
      
			{{ $products->links() }}
    </div>
</x-app>
