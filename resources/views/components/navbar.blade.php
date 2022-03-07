<header class="bg-sahara site-header sticky-top py-1 text-dark">
  <nav class="container d-flex flex-column flex-md-row justify-content-between">
	<div class="justify-content-lg-start">
		<a class="py-2 d-none d-md-inline-block nav-link" href="{{ url('/') }}" aria-label="Product">
			<img src="{{ asset('img/Sahara-32px.png') }}" alt="Sahara Logo">
		</a>
		<a class="py-2 d-none d-md-inline-block nav-link text-dark" href="{{ url('/products/games') }}">Games</a>
		<a class="py-2 d-none d-md-inline-block nav-link text-dark" href="{{ url('/products/components') }}">PC Components</a>
		<a class="py-2 d-none d-md-inline-block nav-link text-dark" href="{{ url('/products/prebuids') }}">Prebuilt PCs</a>
		<a class="py-2 d-none d-md-inline-block nav-link text-dark" href="{{ url('/products/consoles') }}">Consoles</a>
	</div>

	@auth

		<div class="dropdown text-end">
			<a href="#" class="py-2 d-none d-md-inline-block d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
				<img src="https://external-preview.redd.it/I298iZdWplRbjz9GUMAm8qGgZ8rAKdeC3Q0wl9n1CVM.jpg?auto=webp&s=0a990e77e6bb0faadd35be60365e472485a2fa4e" alt="mdo" width="32" height="32" class="rounded-circle">
			</a>
			<ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
				<li><a class="dropdown-item" href="{{ url('/settings') }}">Settings</a></li>
				<li><a class="dropdown-item" href="{{ url('/profile') }}">Profile</a></li>
				<li><hr class="dropdown-divider"></li>
				<li><a class="dropdown-item" href="{{ url('/logout') }}">Log out</a></li>
			</ul>
		</div>

	@else

		<div class="row">
			<a class="col-sm py-2 d-none d-md-inline-block nav-link text-dark" href="{{ url('/login') }}" role="button">Login</button>
			<a class="col-sm py-2 d-none d-md-inline-block nav-link text-dark" href="{{ url('/register') }}" role="button">Register</a>
		</div>

	@endauth
  </nav>
</header>
