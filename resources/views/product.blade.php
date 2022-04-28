<x-app>
    <div class="container">

        <div class="d-flex justify-content-center my-5">

            <div class="d-flex flex-column mx-3" style="width:65vw">
                <div class="mb-3">
                    <div class="card bg-dark">
                        <div class="card-body">
                            <div class="position-relative overflow-hidden text-center">
                                <div id="myCarousel" class="carousel slide w-100" data-bs-interval="false">
                                    <div class="carousel-inner">
                                        @for($i = 0; $i < count($product->promo); $i++)
                                            @if($product->promo[$i]->type == 'video')
                                            <div class="carousel-item {{ $i == 0 ? 'active' : null }}" style="height:40vh">
                                                <video class="d-block mx-auto h-100 rounded" controls name="media">
                                                    <source src="{{ $product->promo[$i]->video_max }}" type="video/mp4">
                                                </video>
                                            </div>
                                            @elseif($product->promo[$i]->type == 'thumbnail')
                                            <div class="carousel-item {{ $i == 0 ? 'active' : null }}" style="height:40vh">
                                                <img class="d-block mx-auto h-100 rounded" src="{{ $product->promo[$i]->full }}"></img>
                                            </div>
                                            @endif
                                            @endfor
                                    </div>
                                    <button class="carousel-control-prev" style="width:5%" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" style="width:5%" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @forelse ($product->packages as $package)
                <div class="mb-3">
                    <div class="card d-flex flex-column">
                        <h5 class="card-title">{{ $package->option_text }}</h5>
                        <div class="card_body">
                            {!! $package->option_description == "" ? null : '<p>' . $package->option_description . '</p>' !!}
                            <a href="{{ $product->steam_url }}" class="btn btn-primary">£{{ $package->price }}</a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="mb-3">
                    <div class="card d-flex flex-column">
                        <h5 class="card-title">{{ $product->title }}</h5>
                        <div class="card_body d-flex flex-row justify-content-end">
                            @if($product->best_price == null)
                            <a href="{{ $product->steam_url }}" class="m-2 btn btn-primary float-right">not yet available</a>
                            @elseif($product->is_free == true)
                            <a href="{{ $product->steam_url }}" class="m-2 btn btn-primary float-right">Free</a>
                            @else
                            <a href="{{ $product->steam_url }}" class="m-2 btn btn-primary float-right">£{{ $product->best_price }}</a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforelse

                <div class="mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">About this Game</h5>
                            <p class="card-text">{!! $product->about !!}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-column ml-3 h-0" style="width:30vw">

                <div class="mb-3">
                    <div class="card h-100">
                        <img class="card-img-top" src="{{ $product->header_image->full }}" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">{{ $product->short_about }}</p>
                            <div class="row">
                                @if(isset($product->developer->name))
                                <div class="col-sm-4">
                                    Developer:
                                </div>
                                <div class="col">
                                    {{ $product->developer->name }}
                                </div>
                                <div class="w-100"></div>
                                @endif
                                @if(isset($product->publisher->name))
                                <div class="col-sm-4">
                                    Publisher:
                                </div>
                                <div class="col">
                                    {{ $product->publisher->name }}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                @if($product->children != [])
                <div class="mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">DLC</h5>
                            <div class="d-flex flex-column">
                                @foreach($product->children as $child)
                                <div class="card d-flex flex-column m-2">
                                    <a class="d-flex flex-row text-decoration-none" href="{{ url('/product', [$category, $child->id]) }}">
                                        <img class="mr-2 rounded" style="width: 144px; height: 64px" src="{{ $child->header_image->full }}">
                                        <div class="mx-2"></div>
                                        <div class="ml-1 d-flex justify-content-center w-100 align-items-center">
                                            <p class="text-dark m-auto">{{ $child->title }}</p>
                                        </div>
                                    </a>
                                    @if($child->best_price != null)
                                    <a href="{{ $child->steam_url }}" class="m-2 btn btn-primary">£{{ $child->best_price }}</a>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <div class="h-100"></div>

            </div>
        </div>

    </div>
</x-app>