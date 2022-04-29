<div class="col my-3">
    <div class="card">
        <div class="row">
            <div class="col-sm-3">
                <img class="card-img" src="{{ $product->header_image }}" alt="Image loading error">
            </div>

            <script>
                function <?php echo ($product->title = str_replace(' ', '_', $product->title)) ?>() {
                    var heart = document.getElementById("<?php echo ($product->title = str_replace(' ', '_', $product->title)) ?>");
                    heart.classList.toggle('bi-heart');
                    heart.classList.toggle('bi-heart-fill');
                }
            </script>

            <div class="col-sm-8 row">
                <div class="w-100 my-auto"><h5 class="col w-100 card-title mt-2">{{ $product->title = str_replace('_', ' ', $product->title) }}</h5></div>

                @if ($category == 'games')
                    <div class="w-100 my-auto"><p class="col w-100 card-text">{{ $product->dev }}</p></div>
                    <div class="w-100 my-auto"><p class="col w-100 card-text">{{ $product->pub }}</p></div>

                @elseif ($category == 'components')
                    <div class="w-100 my-auto"><p class="col w-100 card-text">{{ $product->type }}</p></div>
                    @foreach($product->specs as $spec)
                    <div class="w-100 my-auto"><p class="col w-100 card-text">{{ $spec }}</p></div>
                    @endforeach

                @elseif ($category == 'prebuilds')
                    <div class="w-100 my-auto"><p class="col w-100 card-text">{{ $product->specs->cpu }}</p></div>
                    <div class="w-100 my-auto"><p class="col w-100 card-text">{{ $product->specs->gpu }}</p></div>
                    <div class="w-100 my-auto"><p class="col w-100 card-text">{{ $product->specs->ram }}</p></div>

                @elseif ($category == 'consoles')
                    <div class="w-100 my-auto"><p class="col w-100 card-text">{{ $product->brand }}</p></div>
                    <div class="w-100 my-auto"><p class="col w-100 card-text">{{ $product->desc }}</p></div>
                @endif

                <div class="w-100 my-auto"><a href="{{ $product->steam_url }}" class="col btn btn-primary mb-2">£{{ $product->best }}</a></div>
            </div>
            
            <div class="col-sm-1 row">
                <div class="w-100 my-auto">
                    <a type="button" onclick="<?php echo ($product->title = str_replace(' ', '_', $product->title)) ?>()" href="#" class="text-dark align-right float-end d-inline-block text-center p-2 px-3">
                        <i id="<?php echo ($product->title = str_replace(' ', '_', $product->title)) ?>" class="text-danger bi bi-heart"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>