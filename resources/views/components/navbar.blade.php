<script>
	var prevScrollpos = window.pageYOffset;
	window.onscroll = function() {
		var currentScrollPos = window.pageYOffset;
		if (prevScrollpos > currentScrollPos) {
			document.getElementById("navbar").style.top = "0";
		} else {
			document.getElementById("navbar").style.top = "-150px";
		}
		prevScrollpos = currentScrollPos;
	}

	var toggle_icon = document.getElementById('theme-toggle');
	var body = document.getElementsByTagName('body')[0];
	var sun_class = 'icon-sun';
	var moon_class = 'icon-moon';
	var dark_theme_class = 'dark-theme';

	toggle_icon.addEventListener('click', function() {
		if (body.classList.contains(dark_theme_class)) {
			toggle_icon.classList.add(moon_class);
			toggle_icon.classList.remove(sun_class);

			body.classList.remove(dark_theme_class);

			setCookie('theme', 'light');
		} else {
			toggle_icon.classList.add(sun_class);
			toggle_icon.classList.remove(moon_class);

			body.classList.add(dark_theme_class);

			setCookie('theme', 'dark');
		}
	});

	function setCookie(name, value) {
		var d = new Date();
		d.setTime(d.getTime() + (365 * 24 * 60 * 60 * 1000));
		var expires = "expires=" + d.toUTCString();
		document.cookie = name + "=" + value + ";" + expires + ";path=/";
	}
</script>

<header id="navbar" class="navbar navbar-expand-md bg-{{ $theme == 'light' ? 'light' : 'navy' }} site-header sticky-top text-dark shadow">
	<div class="row mx-5 w-100">
		<div class="col-sm-1 d-flex flex-column justify-content-center">
			<a href="/" class="d-block text-decoration-none">
				<h2 class="text-center text-sahara fst-italic">Sahara</h2>
			</a>
		</div>

		<div class="col d-flex justify-content-around">

			<div class="dropdown" id="dropdownUser1">
				<a data-target="{{ url('/products/games') }}" target="_self" href="{{ url('/products/games') }}" class="text-center text-decoration-none d-block d-flex justify-content-center flex-column h-100">
					<h6 class="text-{{ $theme == 'light' ? 'dark' : 'light' }} rounded-pill m-0">
						Games
					</h6>
				</a>
				<ul class="dropdown-menu text-small border-0 bg-{{ $theme == 'light' ? 'light' : 'navy' }} shadow">
					<li><a class="dropdown-item text-{{ $theme == 'light' ? 'dark' : 'light' }}" href="#">PC</a></li>
					<li><a class="dropdown-item text-{{ $theme == 'light' ? 'dark' : 'light' }}" href="#">Consoles</a></li>
				</ul>
			</div>

			<div class="dropdown" id="dropdownUser1">
				<a data-target="#" target="_self" href="#" class="text-center text-decoration-none d-block d-flex justify-content-center flex-column h-100">
					<h6 class="text-{{ $theme == 'light' ? 'dark' : 'light' }} rounded-pill m-0">
						Components
					</h6>
				</a>
				<ul class="dropdown-menu text-small border-0 bg-{{ $theme == 'light' ? 'light' : 'navy' }} shadow">
					<li><a class="dropdown-item text-{{ $theme == 'light' ? 'dark' : 'light' }}" href="#">CPU</a></li>
					<li><a class="dropdown-item text-{{ $theme == 'light' ? 'dark' : 'light' }}" href="#">CPU Cooler</a></li>
					<li><a class="dropdown-item text-{{ $theme == 'light' ? 'dark' : 'light' }}" href="#">RAM</a></li>
					<li><a class="dropdown-item text-{{ $theme == 'light' ? 'dark' : 'light' }}" href="#">Graphics card</a></li>
					<li><a class="dropdown-item text-{{ $theme == 'light' ? 'dark' : 'light' }}" href="#">Case</a></li>
					<li><a class="dropdown-item text-{{ $theme == 'light' ? 'dark' : 'light' }}" href="#">Power Supply</a></li>
				</ul>
			</div>

			<div class="dropdown" id="dropdownUser1">
				<a data-target="#" target="_self" href="#" class="text-center text-decoration-none d-block d-flex justify-content-center flex-column h-100">
					<h6 class="text-{{ $theme == 'light' ? 'dark' : 'light' }} rounded-pill m-0">
						Consoles
					</h6>
				</a>
				<ul class="dropdown-menu text-small border-0 bg-{{ $theme == 'light' ? 'light' : 'navy' }} shadow">
					<li><a class="dropdown-item text-{{ $theme == 'light' ? 'dark' : 'light' }}" href="#">PlayStation</a></li>
					<li><a class="dropdown-item text-{{ $theme == 'light' ? 'dark' : 'light' }}" href="#">Xbox</a></li>
					<li><a class="dropdown-item text-{{ $theme == 'light' ? 'dark' : 'light' }}" href="#">Nintendo</a></li>
				</ul>
			</div>

			<div class="dropdown" id="dropdownUser1">
				<a data-target="#" target="_self" href="#" class="text-center text-decoration-none d-block d-flex justify-content-center flex-column h-100">
					<h6 class="text-{{ $theme == 'light' ? 'dark' : 'light' }} rounded-pill m-0">
						Computers
					</h6>
				</a>
				<ul class="dropdown-menu text-small border-0 bg-{{ $theme == 'light' ? 'light' : 'navy' }} shadow">
					<li><a class="dropdown-item text-{{ $theme == 'light' ? 'dark' : 'light' }}" href="#">High end</a></li>
					<li><a class="dropdown-item text-{{ $theme == 'light' ? 'dark' : 'light' }}" href="#">Compact and tiny</a></li>
					<li><a class="dropdown-item text-{{ $theme == 'light' ? 'dark' : 'light' }}" href="#">Budget builds</a></li>
					<li><a class="dropdown-item text-{{ $theme == 'light' ? 'dark' : 'light' }}" href="#">Workstation PCs</a></li>
				</ul>
			</div>

		</div>

		<div class="w-25"></div>

		<div class="col-sm-2 my-4" id="searchbar">
			<form method="GET" action="{{ url('/search/games') }}">
				<input type="text" class="form-control" id="fname" name="query" placeholder="Search">
			</form>
		</div>

		@auth

		<div class="col-sm-1 dropdown my-4 text-center">
			<a href="#" class="text-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
				<img src="https://external-preview.redd.it/I298iZdWplRbjz9GUMAm8qGgZ8rAKdeC3Q0wl9n1CVM.jpg?auto=webp&s=0a990e77e6bb0faadd35be60365e472485a2fa4e" alt="mdo" width="32" height="32" class="rounded-circle">
			</a>
			<ul class="dropdown-menu text-small border-0 bg-{{ $theme == 'light' ? 'light' : 'navy' }} shadow" aria-labelledby="dropdownUser1">
				<li><a class="dropdown-item text-{{ $theme == 'light' ? 'dark' : 'light' }}" href="{{ url('/settings') }}">Settings</a></li>
				<li><a class="dropdown-item text-{{ $theme == 'light' ? 'dark' : 'light' }}" href="{{ url('/profile') }}">Profile</a></li>
				@if (Auth::user()->is_admin)
				<li>
					<hr class="dropdown-divider">
				</li>
				<li><a class="dropdown-item text-{{ $theme == 'light' ? 'dark' : 'light' }}" href="{{ route('admin.panel') }}">admin panel</a></li>
				@endif
				<li>
					<hr class="dropdown-divider">
				</li>
				<li><a class="dropdown-item text-{{ $theme == 'light' ? 'dark' : 'light' }}" href="{{ url('/saved') }}">Your Wishlist</a></li>
				<li>
					<hr class="dropdown-divider">
				</li>
				<li><a class="dropdown-item text-{{ $theme == 'light' ? 'dark' : 'light' }}" href="{{ url('/logout') }}">Log out</a></li>
			</ul>
		</div>

		@else

		<div class="col-sm-1 dropdown my-4 text-center">
			<a href="#" class="text-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
				<img src="../img/default-pfp.png" alt="mdo" width="32" height="32" class="rounded-circle">
			</a>
			<ul class="dropdown-menu text-small border-0 bg-{{ $theme == 'light' ? 'light' : 'navy' }} shadow" aria-labelledby="dropdownUser1">
				<li><a class="dropdown-item text-{{ $theme == 'light' ? 'dark' : 'light' }}" href="{{ url('/login') }}">Login</a></li>
				<li><a class="dropdown-item text-{{ $theme == 'light' ? 'dark' : 'light' }}" href="{{ url('/register') }}">Register</a></li>
			</ul>
		</div>

		@endauth

	</div>
</header>