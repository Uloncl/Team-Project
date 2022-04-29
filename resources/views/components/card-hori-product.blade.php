<div class="col my-3">
    <div class="card h-100">
        <a href="{{ url('/product', [$category, $product->id]) }}">
            <img class="card-img-top" src="{{ $product->header_image }}" alt="Image loading error">
        </a>
        <div class="card-body d-flex flex-column">
            <div class="mb-auto">
                <a class="text-decoration-none card-title text-reset" href="{{ url('/product', [$category, $product->id]) }}">
                    <h5 class="card-title">{{ $product->title }}</h5>
                </a>


                @if ($category == 'games')
                <div class="w-100 my-auto">
                    <p class="col w-100 card-text text-muted">{{ $product->developer }}</p>
                </div>
                <div class="w-100 my-auto">
                    <p class="col w-100 card-text text-muted">{{ $product->publisher }}</p>
                </div>

                @elseif ($category == 'components')
                <div class="w-100 my-auto">
                    <p class="col w-100 card-text">{{ $product->type }}</p>
                </div>
                @foreach($product->specs as $spec)
                <div class="w-100 my-auto">
                    <p class="col w-100 card-text">{{ $spec }}</p>
                </div>
                @endforeach

                @elseif ($category == 'prebuilds')
                <div class="w-100 my-auto">
                    <p class="col w-100 card-text">{{ $product->specs->cpu }}</p>
                </div>
                <div class="w-100 my-auto">
                    <p class="col w-100 card-text">{{ $product->specs->gpu }}</p>
                </div>
                <div class="w-100 my-auto">
                    <p class="col w-100 card-text">{{ $product->specs->ram }}</p>
                </div>

                @elseif ($category == 'consoles')
                <div class="w-100 my-auto">
                    <p class="col w-100 card-text">{{ $product->brand }}</p>
                </div>
                <div class="w-100 my-auto">
                    <p class="col w-100 card-text">{{ $product->desc }}</p>
                </div>
                @endif
            </div>
            <div class="mt-3">
                <a href="{{ $product->steam_url }}" class="btn btn-primary {{ $product->best_price == null ? 'invisible' : 'visible' }}">£{{ $product->best_price }}</a>

                <script>
                    function id<?php echo $product->id ?>() {
                        if ($("#id{{ $product->id }}").hasClass("bi-heart")) {
                            $.ajax({
                                url: "{{ url('/wishlist/add') }}",
                                type: "POST",
                                data: {
                                    _token: "{{ csrf_token() }}",
                                    product_id: <?php echo $product->id ?>,
                                    type: "{{ $category }}"
                                },
                                success: function(data) {
                                    $("#id{{ $product->id }}").removeClass('bi-heart');
                                    $("#id{{ $product->id }}").addClass('bi-heart-fill');
                                },
                                statusCode: {
                                    419: function(data) {
                                        console.error(data);
                                    },
                                    500: function(data) {
                                        console.error(data);
                                    }
                                }
                            })
                        } else {
                            $.ajax({
                                url: "{{ url('/wishlist/remove') }}",
                                type: "POST",
                                data: {
                                    _token: "{{ csrf_token() }}",
                                    product_id: <?php echo $product->id ?>,
                                    type: "{{ $category }}"
                                },
                                success: function(data) {
                                    $("#id{{ $product->id }}").removeClass('bi-heart-fill');
                                    $("#id{{ $product->id }}").addClass('bi-heart');
                                },
                                statusCode: {
                                    419: function(data) {
                                        console.error(data);
                                    },
                                    500: function(data) {
                                        console.error(data);
                                    }
                                }
                            })
                        }
                    }
                </script>

                @if (Auth::check())
                <a type="button" onclick="id<?php echo $product->id ?>()" class="text-dark align-right float-end d-inline-block text-center py-2">
                    <i id="id{{ $product->id }}" class="text-danger bi {{ $product->wishlist ? 'bi-heart-fill' : 'bi-heart' }}"></i>
                </a>
                @endif
            </div>
        </div>
    </div>
</div>