<x-app>
    <div class="container h-100">

      <h2 class="pt-5 pb-3">Your Saved Products</h2>

      <div class="card mb-4 border-bottom-0">
          <x-saved-product/>
          <x-saved-product/>
          <x-saved-product/>
      </div>

      <div class="card mb-5">
        <div class="card-body p-4">
          <div class="float-end">
            <p class="mb-0 me-5 d-flex align-items-center">
              <span class="small text-muted me-2">Total Price:</span> <span class="lead fw-normal">£5400</span>
            </p>
          </div>
        </div>
      </div>

      <div class="d-flex justify-content-end">
        <a href="{{ url('/') }}" type="button" class="btn btn-light btn-lg me-2">Continue shopping</a>
      </div>
    </div>
</x-app>
