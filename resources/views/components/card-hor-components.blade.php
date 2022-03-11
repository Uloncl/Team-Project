<div class="col my-3">
    <div class="card" style="width: 1140px;">
        <div class="row no-gutters">
            <div class="col-sm-3">
                <img class="card-img" src="{{ $product['img-hor'] }}" alt="Image loading error">
            </div>



            <div class="col-sm-9">
                <div class="card-body">
                    <h5 class="card-title">{{ $product['name'] }}</h5>
                    <p class="card-text">{{ $product['desc'] }}</p>
                    <a href="{{ $product['link'] }}" class="btn btn-primary p-2">£{{ $product['best'] }}</a>
                </div>
            </div>

        </div>
    </div>
</div>