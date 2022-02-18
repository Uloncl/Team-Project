<x-app>
	<x-slot name="navbar">
		
		<header class="p-3 mb-3 border-bottom">
			<div class="container">
				<div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
					<ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
						<li><a href="{{ url('/') }}" class="nav-link px-2 link-dark">{{ config('app.name', 'Laravel') }}</a></li>
						<li><a href="{{ url('/about') }}" class="nav-link px-2 link-dark">About</a></li>
						<li><a href="{{ url('/project') }}" class="nav-link px-2 link-dark">Map</a></li>
					</ul>

					<form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
						<input type="search" class="form-control" placeholder="Search..." aria-label="Search">
					</form>

					<div class="dropdown text-end">
						<a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="https://external-preview.redd.it/I298iZdWplRbjz9GUMAm8qGgZ8rAKdeC3Q0wl9n1CVM.jpg?auto=webp&s=0a990e77e6bb0faadd35be60365e472485a2fa4e" alt="mdo" width="32" height="32" class="rounded-circle">
						</a>
						<ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
							<li><a class="dropdown-item" href="#">this stuff doesnt work</a></li>
							<li><a class="dropdown-item" href="{{ url('/settings') }}">Settings</a></li>
							<li><a class="dropdown-item" href="{{ url('/profile') }}">Profile</a></li>
							<li><hr class="dropdown-divider"></li>
							<li><a class="dropdown-item" href="{{ url('/') }}">Sign out</a></li>
						</ul>
					</div>
				</div>
			</div>
		</header>

	</x-slot>
<x-app>
