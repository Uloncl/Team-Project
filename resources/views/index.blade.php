<x-app>
  
  <x-carousel/>

  <div class="container">
    <div class="row my-5">
      <div class="col-sm">
        <a class= "text-decoration-none text-dark" href="{{ url('/products/games') }}"><img class="m-auto d-flex w-50" src="../img/gaming.png" alt="Image missing because we are cool!"><h3 class="text-center pt-2">Games</h3></a>
      </div>
      <div class="col-sm">
        <a class= "text-decoration-none text-dark" href="{{ url('/products/prebuilds') }}"><img class="m-auto d-flex w-50" src="../img/prebuild.png" alt="Image missing because we are cool!"><h3 class="text-center pt-2">Computers</h3></a>
      </div>
      <div class="col-sm">
        <a class= "text-decoration-none text-dark" href="{{ url('/products/consoles') }}"><img class="m-auto d-flex w-50" src="../img/console.png" alt="Image missing because we are cool!"><h3 class="text-center pt-2">Consoles</h3></a>
      </div>
      <div class="col-sm">
        <a class= "text-decoration-none text-dark" href="{{ url('/products/components') }}"><img class="m-auto d-flex w-50" src="../img/component.png" alt="Image missing because we are cool!"><h3 class="text-center pt-2">Components</h3></a>
      </div>
    </div>

    <div class="row my-5">
      @for ($i = 1; $i < 13; $i++)
        <x-product/>
        @if ($i % 4 == 0)
          <div class="w-100"></div>
        @endif
      @endfor
    </div>
  </div>  
</x-app>
