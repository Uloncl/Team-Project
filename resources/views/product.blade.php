<x-app>
    <div class="container">

        <div class="d-flex justify-content-center my-5">

            <div class="d-flex flex-column mx-3" style="width:65vw">
                <div class="mb-3">
                    <div class="card shadow bg-dark">
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
                    <div class="card shadow d-flex flex-column">
                        <div class="m-2">
                            <h5 class="card-title">{{ $package->option_text }}</h5>
                            {!! $package->option_description == "" ? null : '<p class="m-1">' . $package->option_description . '</p>' !!}
                            <div class="card_body d-flex flex-row justify-content-end">
                                <a href="{{ $product->steam_url }}" class="btn btn-sahara">£{{ $package->price }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="mb-3">
                    <div class="card shadow d-flex flex-column">
                        <h5 class="card-title">{{ $product->title }}</h5>
                        <div class="card_body d-flex flex-row justify-content-end">
                            @if($product->is_free == true)
                            <a href="{{ $product->steam_url }}" class="m-2 btn btn-sahara float-right">Free</a>
                            @endif
                            @if($product->best_price == null)
                            <a href="{{ $product->steam_url }}" class="m-2 btn btn-sahara float-right">not yet available</a>
                            @else
                            <a href="{{ $product->steam_url }}" class="m-2 btn btn-sahara float-right">£{{ $product->best_price }}</a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforelse

                <div class="mb-3">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">About this Game</h5>
                            <p class="card-text">{!! $product->about !!}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-column ml-3 h-0" style="width:30vw">

                <div class="mb-3">
                    <div class="card shadow h-100">
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

                <div class="mb-3">
                    <div class="card shadow h-100">
                        <div class="card-body">
                            <div class="d-flex flex-column">

                                @if(isset($product->release_date))
                                @if($product->coming_soon)
                                <div class="d-flex flex-row justify-content-between">
                                    <div>
                                        Coming Soon on:
                                    </div>
                                    <div class="w-50 text-center">
                                        {{ $product->release_date }}
                                    </div>
                                </div>
                                @else
                                <div class="d-flex flex-row justify-content-between">
                                    <div>
                                        Release Date:
                                    </div>
                                    <div class="w-50 text-center">
                                        {{ $product->release_date }}
                                    </div>
                                </div>
                                @endif
                                @endif
                                <hr class="my-3 solid">
                                @if(isset($product->tag_categories))
                                <div class="d-flex flex-row justify-content-between">
                                    <div class="w-100 text-left">
                                        <ul class="list-group list-group-flush">
                                            @foreach($product->tag_categories as $tag_category)
                                            <li class="list-group-item">{{ $tag_category->name }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                @endif
                                <hr class="my-3 solid">
                                @if(isset($product->genres))
                                <div class="d-flex flex-row justify-content-between">
                                    <div>
                                        Genres:
                                    </div>
                                    <div class="w-75 text-left">
                                        @foreach($product->genres as $genre)
                                        {{ $genre->name }},
                                        @endforeach
                                    </div>
                                </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>

                @if($product->children != [])
                <div class="mb-3">
                    <div class="card shadow h-100">
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
                                    <a href="{{ $child->steam_url }}" class="m-2 btn btn-sahara">£{{ $child->best_price }}</a>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <div class="mb-3">
                    <div class="card shadow h-100">
                        <h5 class="card-title mx-auto my-3">Requirements to Run</h5>
                        <div id="accordian d-flex flex-column" class="m-2">
                            @if($product->windows)
                            <div class="card d-flex flex-column">
                                <a class="text-decoration-none text-dark" data-bs-toggle="collapse" data-bs-target="#windowsColl" aria-expanded="false" aria-controls="windowsColl">
                                    <div class="card-header" id="windows">
                                        <h5 class="m-auto">
                                            Windows
                                        </h5>
                                    </div>
                                </a>
                                <div id="windowsColl" class="collapse" aria-labelledby="windows" data-parent="accordian">
                                    <div id="windowsAccordian">
                                        <div class="card d-flex flex-column">
                                            <a class="text-decoration-none text-dark" data-bs-toggle="collapse" data-bs-target="#windowsRecColl" aria-expanded="false" aria-controls="windowsRecColl">
                                                <div class="card-header" id="windows">
                                                    <h5 class="m-auto">
                                                        Recommended:
                                                    </h5>
                                                </div>
                                            </a>
                                            <div id="windowsRecColl" class="collapse" aria-labelledby="windows" data-parent="windowsAccordian">
                                                <div>
                                                    {!! $product->pc_recommended !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card d-flex flex-column">
                                            <a class="text-decoration-none text-dark" data-bs-toggle="collapse" data-bs-target="#windowsMinColl" aria-expanded="false" aria-controls="windowsMinColl">
                                                <div class="card-header" id="windows">
                                                    <h5 class="m-auto">
                                                        Minimum:
                                                    </h5>
                                                </div>
                                            </a>
                                            <div id="windowsMinColl" class="collapse" aria-labelledby="windows" data-parent="windowsAccordian">
                                                <div>
                                                    {!! $product->pc_minimum !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if($product->linux)
                            <div class="card d-flex flex-column">
                                <a class="text-decoration-none text-dark" data-bs-toggle="collapse" data-bs-target="#linuxColl" aria-expanded="false" aria-controls="linuxColl">
                                    <div class="card-header" id="linux">
                                        <h5 class="m-auto">
                                            Linux
                                        </h5>
                                    </div>
                                </a>
                                <div id="linuxColl" class="collapse" aria-labelledby="linux" data-parent="accordian">
                                    <div id="linuxAccordian">
                                        <div class="card d-flex flex-column">
                                            <a class="text-decoration-none text-dark" data-bs-toggle="collapse" data-bs-target="#linuxRecColl" aria-expanded="false" aria-controls="linuxRecColl">
                                                <div class="card-header" id="linux">
                                                    <h5 class="m-auto">
                                                        Recommended:
                                                    </h5>
                                                </div>
                                            </a>
                                            <div id="linuxRecColl" class="collapse" aria-labelledby="linux" data-parent="linuxAccordian">
                                                <div>
                                                    {!! $product->linux_recommended !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card d-flex flex-column">
                                            <a class="text-decoration-none text-dark" data-bs-toggle="collapse" data-bs-target="#linuxMinColl" aria-expanded="false" aria-controls="linuxMinColl">
                                                <div class="card-header" id="linux">
                                                    <h5 class="m-auto">
                                                        Minimum:
                                                    </h5>
                                                </div>
                                            </a>
                                            <div id="linuxMinColl" class="collapse" aria-labelledby="linux" data-parent="linuxAccordian">
                                                <div>
                                                    {!! $product->linux_minimum !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if($product->mac)
                            <div class="card d-flex flex-column">
                                <a class="text-decoration-none text-dark" data-bs-toggle="collapse" data-bs-target="#macColl" aria-expanded="false" aria-controls="macColl">
                                    <div class="card-header" id="mac">
                                        <h5 class="m-auto">
                                            Mac
                                        </h5>
                                    </div>
                                </a>
                                <div id="macColl" class="collapse" aria-labelledby="mac" data-parent="accordian">
                                    <div id="macAccordian">
                                        <div class="card d-flex flex-column">
                                            <a class="text-decoration-none text-dark" data-bs-toggle="collapse" data-bs-target="#macRecColl" aria-expanded="false" aria-controls="macRecColl">
                                                <div class="card-header" id="mac">
                                                    <h5 class="m-auto">
                                                        Recommended:
                                                    </h5>
                                                </div>
                                            </a>
                                            <div id="macRecColl" class="collapse" aria-labelledby="mac" data-parent="macAccordian">
                                                <div>
                                                    {!! $product->mac_recommended !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card d-flex flex-column">
                                            <a class="text-decoration-none text-dark" data-bs-toggle="collapse" data-bs-target="#macMinColl" aria-expanded="false" aria-controls="macMinColl">
                                                <div class="card-header" id="mac">
                                                    <h5 class="m-auto">
                                                        Minimum:
                                                    </h5>
                                                </div>
                                            </a>
                                            <div id="macMinColl" class="collapse" aria-labelledby="mac" data-parent="macAccordian">
                                                <div>
                                                    {!! $product->mac_minimum !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="h-100"></div>

    </div>
    </div>

    </div>
</x-app>