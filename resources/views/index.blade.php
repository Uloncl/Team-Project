<x-app>
  
  <x-carousel/>

  <div class="row m-5">
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

  <div class="row mx-5">
    <x-product/>
    <x-product/>
    <x-product/>
    <x-product/>
    <div class="w-100"></div>
    <x-product/>
    <x-product/>
    <x-product/>
    <x-product/>
    <div class="w-100"></div>
    <x-product/>
    <x-product/>
    <x-product/>
    <x-product/>
  <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</x-app>
