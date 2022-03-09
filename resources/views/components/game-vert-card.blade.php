<div class="col my-3">
    <div class="card">
        <img class="card-img-top" src="{{ $product['img'] }}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{ $product['name'] }}</h5>
            <p class="card-text">{{ $product['dev'] }}</p>
            <a href="{{ $product['link'] }}" class="btn btn-primary p-2">£{{ $product['best'] }}</a>
            <a href="#" class="text-dark align-right float-end d-inline-block text-center p-2 px-3"><i class="bi bi-heart"></i></a>
        </div>
    </div>
</div>