<div class="card-body p-4 border-bottom">
    <div class="row">
        <a class="col-md-2 px-2 my-auto" href="{{ $product['link'] }}">
            <img src="{{ $product['img'] }}" class="img-fluid" alt="Generic placeholder image">
        </a>

        <div class="col-md-8 row px-2 mx-2 border-start border-end">
            <a class="w-100 text-dark text-decoration-none" href="{{ $product['link'] }}">{{ $product['title'] }}</a>
            <div class="pt-2 mx-0 border-top row">
                <div class="col row pt-2">
                    <p class="col-sm-3 small text-muted">Best Price</p>
                    <p class="col">£{{ $product['best'] }}</p>
                </div>
                <div class="col row pt-2">
                    <p class="col-sm-4 small text-muted">Average Price</p>
                    <p class="col w-100">£{{ $product['avg'] }}</p>
                </div>
            </div>
        </div>

        
        <div class="col-md-2 px-2">
            <a href="#" class="text-danger"><i class="bi bi-x"></i></a>
        </div>
    </div>
</div>