<div class="col m-2">
    <div class="card" style="width: 15rem;">
        <img class="card-img-top" src="{{ $product['img'] }}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{ $product['name'] }}</h5>
            <p class="card-text">{{ $product['dev'] }}</p>
            <a href="{{ $product['link'] }}" class="btn btn-primary">£{{ $product['best'] }} on Steam</a>
        </div>
    </div>
</div>