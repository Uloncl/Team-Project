<header class="bg-sahara site-header sticky-top py-1 text-dark">

<div class="profile-image" id="profile-image">
	<a href="/">
		<img src="{{ asset('../img/SaharaBW.png') }}" alt="Sahara Logo">
	</a>
	
</div>

  <nav class="navbar navbar-default d-flex flex-column flex-md-row justify-content-between">
	

	<div class="justify-content-lg-start mx-5">
		<a class="py-2 d-none d-md-inline-block nav-link text-dark" href="{{ url('/products/games') }}">Games</a>
		<a class="py-2 d-none d-md-inline-block nav-link text-dark" href="{{ url('/products/components') }}">PC Components</a>
		<a class="py-2 d-none d-md-inline-block nav-link text-dark" href="{{ url('/products/prebuilds') }}">Prebuilt PCs</a>
		<a class="py-2 d-none d-md-inline-block nav-link text-dark" href="{{ url('/products/consoles') }}">Consoles</a>
	</div>

	@auth

		<div class="dropdown text-end  mx-5">
			<a href="#" class="py-2 d-none d-md-inline-block d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
				<img src="https://external-preview.redd.it/I298iZdWplRbjz9GUMAm8qGgZ8rAKdeC3Q0wl9n1CVM.jpg?auto=webp&s=0a990e77e6bb0faadd35be60365e472485a2fa4e" alt="mdo" width="32" height="32" class="rounded-circle">
			</a>
			<ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
				<li><a class="dropdown-item" href="{{ url('/settings') }}">Settings</a></li>
				<li><a class="dropdown-item" href="{{ url('/profile') }}">Profile</a></li>
				<li><hr class="dropdown-divider"></li>
				<li><a class="dropdown-item" href="{{ url('/saved') }}">Your Saved Products</a></li>
				<li><hr class="dropdown-divider"></li>
				<li><a class="dropdown-item" href="{{ url('/logout') }}">Log out</a></li>
			</ul>
		</div>

	@else

		<div class="dropdown text-end  mx-5">
			<a href="#" class="py-2 d-none d-md-inline-block d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
				<img src="../img/default-pfp.png" alt="mdo" width="32" height="32" class="rounded-circle">
			</a>
			<ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
				<li><a class="dropdown-item" href="{{ url('/login') }}">Login</a></li>
				<li><a class="dropdown-item" href="{{ url('/register') }}">Register</a></li>
			</ul>
		</div>

	@endauth
  </nav>
</header>
