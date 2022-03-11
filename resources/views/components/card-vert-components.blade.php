<div class="col my-3">
    <div class="card">
        <img class="card-img-top" src="{{ $product['img-vert'] }}" alt="Image loading error">
        <div class="card-body">
            <h5 class="card-title">{{ $product['name'] }}</h5>
            <p class="card-text">{{ $product['desc'] }}</p>
            <a href="{{ $product['link'] }}" class="btn btn-primary p-2">£{{ $product['best'] }}</a>

            <script>
                function {{ $product['name'] = str_replace(' ', '_', $product['name']) }}() {
                    var heart = document.getElementById("{{ $product['name'] = str_replace(' ', '_', $product['name']) }}");
                    heart.classList.toggle('bi-heart');
                    heart.classList.toggle('bi-heart-fill');
                }
            </script>

            <a type="button" onclick="{{ $product['name'] = str_replace(' ', '_', $product['name']) }}()" href="#" class="text-dark align-right float-end d-inline-block text-center p-2 px-3">
                <i id="{{ $product['name'] = str_replace(' ', '_', $product['name']) }}" class="text-danger bi bi-heart"></i>
            </a>
        </div>
    </div>
</div>