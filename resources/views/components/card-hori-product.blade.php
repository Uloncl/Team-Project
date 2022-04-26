<div class="col my-3">
    <div class="card h-100">
        <img class="card-img-top" src="{{ $product->header_image }}" alt="Image loading error">
        <div class="card-body d-flex flex-column">
            <div class="mb-auto">
                <h5 class="card-title">{{ $product->title }}</h5>


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
                                url: "{{ route('wishlist.add') }}",
                                type: "POST",
                                data: {
                                    product_id: <?php echo $product->id ?>,
                                    type: "{{ $category }}"
                                },
                                success: function(data) {
                                    console.log(data);
                                    $(<?php echo $product->id ?>).removeClass('bi-heart');
                                    $(<?php echo $product->id ?>).addClass('bi-heart-fill');
                                },
                                statusCode: {
                                    200: function(data) {
                                        console.log(data);
                                    },
                                    500: function(data) {
                                        console.log(data);
                                    }
                                }
                            })
                        } else {
                            $.ajax({
                                url: "{{ route('wishlist.remove') }}",
                                type: "POST",
                                data: {
                                    product_id: <?php echo $product->id ?>,
                                    type: "{{ $category }}"
                                },
                                success: function() {
                                    console.log(data);
                                    $(<?php echo $product->id ?>).removeClass('bi-heart-fill');
                                    $(<?php echo $product->id ?>).addClass('bi-heart');
                                }
                            })
                        }
                    }
                </script>

                <a type="button" href="#" onclick="id<?php echo $product->id ?>()" href="#" class="text-dark align-right float-end d-inline-block text-center py-2">
                    <i id="id{{ $product->id }}" class="text-danger bi bi-heart"></i>
                </a>
            </div>
        </div>
    </div>
</div>