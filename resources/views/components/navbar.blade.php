<header class="bg-sahara site-header sticky-top py-1 text-dark">

<div class="profile-image" id="profile-image">
	<a href="/">
		<img src="{{ asset('../img/SaharaBW.png') }}" alt="Sahara Logo">
	</a>
</div>

	<nav class="navbar navbar-default d-flex flex-column flex-md-row justify-content-between">

	<div class="container">
		<div class="row">

			<div class="col-sm">
				<div class="dropdown mx-5">
					<a href="{{ url('/products/games') }}" class="py-2 d-none d-md-inline-block d-block link-dark text-decoration-none" id="dropdownUser1" data-bs-toggle="{{ url('/products/games') }}" aria-expanded="false">
						Games
					</a>
					<ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
						<li><a class="dropdown-item" href="#">PC</a></li>
						<li><a class="dropdown-item" href="#">Consoles</a></li>
					</ul>
				</div>
			</div>
		

		<div class="col-sm">
			<div class="dropdown mx-5">
				<a href="{{ url('/products/components') }}" class="py-2 d-none d-md-inline-block d-block link-dark text-decoration-none" id="dropdownUser1" data-bs-toggle="{{ url('/products/components') }}" aria-expanded="false">
					Components
				</a>
				<ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
					<li><a class="dropdown-item" href="#">CPU</a></li>
					<li><a class="dropdown-item" href="#">RAM</a></li>
					<li><a class="dropdown-item" href="#">Video Cards</a></li>
					<li><a class="dropdown-item" href="#">CPU Cooler</a></li>
					<li><a class="dropdown-item" href="#">Case</a></li>
					<li><a class="dropdown-item" href="#">Power Supply</a></li>
				</ul>
			</div>
		</div>
	
		<div class="col-sm">
			<div class="dropdown mx-5">
				<a href="{{ url('/products/consoles') }}" class="py-2 d-none d-md-inline-block d-block link-dark text-decoration-none" id="dropdownUser1" data-bs-toggle="{{ url('/products/consoles') }}" aria-expanded="false">
					Consoles
				</a>
				<ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
					<li><a class="dropdown-item" href="#">Microsoft</a></li>
					<li><a class="dropdown-item" href="#">Sony</a></li>
					<li><a class="dropdown-item" href="#">Nintendo</a></li>
				</ul>
			</div>
		</div>

	<div class="col-sm">
			<div class="dropdown">
				<a href="{{ url('/products/prebuilds') }}" class="py-2 d-none d-md-inline-block d-block link-dark text-decoration-none" id="dropdownUser1" data-bs-toggle="{{ url('/products/prebuilds') }}" aria-expanded="false">
					Pre-built PCs
				</a>
				<ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
					<li><a class="dropdown-item" href="#">High end</a></li>
					<li><a class="dropdown-item" href="#">Middle</a></li>
					<li><a class="dropdown-item" href="#">Low end</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
  
	


	@auth

		<div class="dropdown mx-5">
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

		<div class="dropdown mx-5">
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
