<div class="col my-3">
    <div class="card">
            <img class="card-img-top" src="{{ $product['img-hori'] }}" alt="Image loading error">
        <div class="card-body">
            <h5 class="card-title">{{ $product['name'] }}</h5>
            

            @if ($category == 'games')
                <div class="w-100 my-auto"><p class="col w-100 card-text">{{ $product['dev'] }}</p></div>
                <div class="w-100 my-auto"><p class="col w-100 card-text">{{ $product['pub'] }}</p></div>

            @elseif ($category == 'components')
                <div class="w-100 my-auto"><p class="col w-100 card-text">{{ $product['type'] }}</p></div>
                @foreach($product['specs'] as $spec)
                <div class="w-100 my-auto"><p class="col w-100 card-text">{{ $spec }}</p></div>
                @endforeach

            @elseif ($category == 'prebuilds')
                <div class="w-100 my-auto"><p class="col w-100 card-text">{{ $product['specs']['cpu'] }}</p></div>
                <div class="w-100 my-auto"><p class="col w-100 card-text">{{ $product['specs']['gpu'] }}</p></div>
                <div class="w-100 my-auto"><p class="col w-100 card-text">{{ $product['specs']['ram'] }}</p></div>

            @elseif ($category == 'consoles')
                <div class="w-100 my-auto"><p class="col w-100 card-text">{{ $product['brand'] }}</p></div>
                <div class="w-100 my-auto"><p class="col w-100 card-text">{{ $product['desc'] }}</p></div>
            @endif
            
            <a href="{{ $product['link'] }}" class="btn btn-primary mt-2">£{{ $product['best'] }}</a>

            <script>
                function <?php echo ($product['name'] = str_replace(' ', '_', $product['name'])) ?>() {
                    var heart = document.getElementById("<?php echo ($product['name'] = str_replace(' ', '_', $product['name'])) ?>");
                    heart.classList.toggle('bi-heart');
                    heart.classList.toggle('bi-heart-fill');
                }
            </script>

            <a type="button" onclick="<?php echo ($product['name'] = str_replace(' ', '_', $product['name'])) ?>()" href="#" class="text-dark align-right float-end d-inline-block text-center py-2 mt-1">
                <i id="<?php echo ($product['name'] = str_replace(' ', '_', $product['name'])) ?>" class="text-danger bi bi-heart"></i>
            </a>
        </div>
    </div>
</div>