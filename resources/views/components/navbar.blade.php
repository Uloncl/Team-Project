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
<header class="bg-dark site-header sticky-top py-1 text-light">
  <nav class="container d-flex flex-column flex-md-row justify-content-between">
    <a class="py-2 " href="#" aria-label="Product">
      <!--<svg width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img" viewBox="0 0 24 24"><title>Product</title><circle cx="15" cy="15" r="15"></circle><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"></path></svg> -->
      <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="white" class="bi bi-playstation" viewBox="0 0 16 16">
  <path d="M15.858 11.451c-.313.395-1.079.676-1.079.676l-5.696 2.046v-1.509l4.192-1.493c.476-.17.549-.412.162-.538-.386-.127-1.085-.09-1.56.08l-2.794.984v-1.566l.161-.054s.807-.286 1.942-.412c1.135-.125 2.525.017 3.616.43 1.23.39 1.368.962 1.056 1.356ZM9.625 8.883v-3.86c0-.453-.083-.87-.508-.988-.326-.105-.528.198-.528.65v9.664l-2.606-.827V2c1.108.206 2.722.692 3.59.985 2.207.757 2.955 1.7 2.955 3.825 0 2.071-1.278 2.856-2.903 2.072Zm-8.424 3.625C-.061 12.15-.271 11.41.304 10.984c.532-.394 1.436-.69 1.436-.69l3.737-1.33v1.515l-2.69.963c-.474.17-.547.411-.161.538.386.126 1.085.09 1.56-.08l1.29-.469v1.356l-.257.043a8.454 8.454 0 0 1-4.018-.323Z"/>
</svg>
    </a>
    <a class="py-2 d-none d-md-inline-block nav-link text-light" href="#">Tour</a>
    <a class="py-2 d-none d-md-inline-block nav-link text-light" href="#">Product</a>
    <a class="py-2 d-none d-md-inline-block nav-link text-light" href="#">Features</a>
    <a class="py-2 d-none d-md-inline-block nav-link text-light" href="#">Enterprise</a>
    <a class="py-2 d-none d-md-inline-block nav-link text-light" href="#">Support</a>
    <a class="py-2 d-none d-md-inline-block nav-link text-light" href="#">Pricing</a>
    <a class="py-2 d-none d-md-inline-block nav-link text-light" href="#">Cart</a>
  </nav>
</header>
