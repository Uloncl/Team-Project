<x-app>

    <x-carousel />

    <div class="container">
        <div class="row my-5">
            <div class="col-sm">
                <a class="text-decoration-none text-dark" href="{{ url('/products/games') }}"><img class="m-auto d-flex w-50" src="../img/gaming.png" alt="Image missing because we are cool!">
                    <h3 class="text-center pt-2">Games</h3>
                </a>
            </div>
            <div class="col-sm">
                <a class="text-decoration-none text-dark" href="{{ url('/products/prebuilds') }}"><img class="m-auto d-flex w-50" src="../img/prebuild.png" alt="Image missing because we are cool!">
                    <h3 class="text-center pt-2">Computers</h3>
                </a>
            </div>
            <div class="col-sm">
                <a class="text-decoration-none text-dark" href="{{ url('/products/consoles') }}"><img class="m-auto d-flex w-50" src="../img/console.png" alt="Image missing because we are cool!">
                    <h3 class="text-center pt-2">Consoles</h3>
                </a>
            </div>
            <div class="col-sm">
                <a class="text-decoration-none text-dark" href="{{ url('/products/components') }}"><img class="m-auto d-flex w-50" src="../img/component.png" alt="Image missing because we are cool!">
                    <h3 class="text-center pt-2">Components</h3>
                </a>
            </div>
        </div>

        <div class="row">
            <hr class="my-3 solid">
            <a class="text-dark text-decoration-none" href="{{ url('/products/games') }}">
                <h4 class="text-dark text-decoration-none">
                    Featured Games
                </h4>
            </a>
            @forelse ($products as $product)
            <x-card-hori-product class="product" :product="$product" :orientation="$orientation" :category="$category" />
            @if ($loop->iteration % 5 == 0)
            <div class="w-100"></div>
            @endif
            @empty
            why is there nothing wtf
            @endforelse
            <a class="text-decoration-none d-flex flex-row justify-content-end" href="{{ url('/products/games') }}">
                <h4 class="text-dark text-right">
                    See More Games >
                </h4>
            </a>
            <hr class="my-3 mb-5 solid">
        </div>
    </div>
</x-app>