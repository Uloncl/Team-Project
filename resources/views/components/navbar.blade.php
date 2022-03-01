<!--<header class="p-3 mb-3 border-bottom">
	<div class="container">
		<div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
			<ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
				<li><a href="{{ url('/') }}" class="nav-link px-2 text-black">{{ config('app.name', 'Laravel') }}</a></li>
				<li><a href="{{ url('/about') }}" class="nav-link px-2 text-black">About</a></li>
				<li><a href="{{ url('/project') }}" class="nav-link px-2 text-black">Map</a></li>
			</ul>

			<form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
				<input type="search" class="form-control" placeholder="Search..." aria-label="Search">
			</form>

			@auth

				<div class="dropdown text-end">
					<a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
						<img src="https://external-preview.redd.it/I298iZdWplRbjz9GUMAm8qGgZ8rAKdeC3Q0wl9n1CVM.jpg?auto=webp&s=0a990e77e6bb0faadd35be60365e472485a2fa4e" alt="mdo" width="32" height="32" class="rounded-circle">
					</a>
					<ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
						<li><a class="dropdown-item" href="{{ url('/settings') }}">Settings</a></li>
						<li><a class="dropdown-item" href="{{ url('/profile') }}">Profile</a></li>
						<li><hr class="dropdown-divider"></li>
						<li><a class="dropdown-item" href="{{ url('/logout') }}">log out</a></li>
					</ul>
				</div>

			@else

				<div class="col-md-3">
					<a class="btn btn-outline-secondary me-2" href="{{ url('/login') }}" role="button">Login</button>
					<a class="btn btn-secondary" href="{{ url('/register') }}" role="button">Register</a>
				</div>

			@endauth

		</div>
	</div>
</header>

-->
<header class="bg-dark site-header sticky-top py-1 text-black">
  <nav class="container d-flex flex-column flex-md-row justify-content-between">
    <a class="py-2" href="#" aria-label="Product">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img" viewBox="0 0 24 24"><title>Product</title><circle cx="12" cy="12" r="10"></circle><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"></path></svg>
    </a>
    <a class="py-2 d-none d-md-inline-block nav-link text-black" href="#">Tour</a>
    <a class="py-2 d-none d-md-inline-block nav-link text-black" href="#">Product</a>
    <a class="py-2 d-none d-md-inline-block nav-link text-black" href="#">Features</a>
    <a class="py-2 d-none d-md-inline-block nav-link text-black" href="#">Enterprise</a>
    <a class="py-2 d-none d-md-inline-block nav-link text-black" href="#">Support</a>
    <a class="py-2 d-none d-md-inline-block nav-link text-black" href="#">Pricing</a>
    <a class="py-2 d-none d-md-inline-block nav-link text-black" href="#">Cart</a>
  </nav>
</header>
