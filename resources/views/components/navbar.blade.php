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
		<div class="col-sm-1 text-center">
			<a href="/" class="text-decoration-none">
				<h2 class="my-3 text-sahara fst-italic">Sahara</h2>
			</a>
		</div>

		<div class="col row my-1">

			<div class="col-sm-2 dropdown" id="dropdownUser1">
				<a data-target="{{ url('/products/games') }}" target="_self" href="{{ url('/products/games') }}" class="text-center text-decoration-none d-block py-2 p-3">
					<h6 class="text-{{ $theme == 'light' ? 'dark' : 'light' }} p-2 my-2 rounded-pill">
						Games
					</h6>
				</a>
				<ul class="dropdown-menu text-small border-0 bg-{{ $theme == 'light' ? 'light' : 'navy' }} shadow">
					<li><a class="dropdown-item text-{{ $theme == 'light' ? 'dark' : 'light' }}" href="{{ url('/products/games') }}">PC</a></li>
					<li><a class="dropdown-item text-{{ $theme == 'light' ? 'dark' : 'light' }}" href="{{ url('/products/games') }}">Consoles</a></li>
				</ul>
			</div>

			<div class="col-sm-2 dropdown" id="dropdownUser1">
				<a data-target="{{ url('/products/components') }}" target="_self" href="{{ url('/products/components') }}" class="text-center text-decoration-none d-block py-2 p-3">
					<h6 class="text-{{ $theme == 'light' ? 'dark' : 'light' }} p-2 my-2 rounded-pill">
						Components
					</h6>
				</a>
				<ul class="dropdown-menu text-small border-0 bg-{{ $theme == 'light' ? 'light' : 'navy' }} shadow">
					<li><a class="dropdown-item text-{{ $theme == 'light' ? 'dark' : 'light' }}" href="#">CPU</a></li>
					<li><a class="dropdown-item text-{{ $theme == 'light' ? 'dark' : 'light' }}" href="#">RAM</a></li>
					<li><a class="dropdown-item text-{{ $theme == 'light' ? 'dark' : 'light' }}" href="#">Video Cards</a></li>
					<li><a class="dropdown-item text-{{ $theme == 'light' ? 'dark' : 'light' }}" href="#">CPU Cooler</a></li>
					<li><a class="dropdown-item text-{{ $theme == 'light' ? 'dark' : 'light' }}" href="#">Case</a></li>
					<li><a class="dropdown-item text-{{ $theme == 'light' ? 'dark' : 'light' }}" href="#">Power Supply</a></li>
				</ul>
			</div>

			<div class="col-sm-2 dropdown" id="dropdownUser1">
				<a data-target="{{ url('/products/consoles') }}" target="_self" href="{{ url('/products/consoles') }}" class="text-center text-decoration-none d-block py-2 p-3">
					<h6 class="text-{{ $theme == 'light' ? 'dark' : 'light' }} p-2 my-2 rounded-pill">
						Consoles
					</h6>
				</a>
				<ul class="dropdown-menu text-small border-0 bg-{{ $theme == 'light' ? 'light' : 'navy' }} shadow">
					<li><a class="dropdown-item text-{{ $theme == 'light' ? 'dark' : 'light' }}" href="#">Xbox's</a></li>
					<li><a class="dropdown-item text-{{ $theme == 'light' ? 'dark' : 'light' }}" href="#">Playstations</a></li>
					<li><a class="dropdown-item text-{{ $theme == 'light' ? 'dark' : 'light' }}" href="#">Nintendo</a></li>
				</ul>
			</div>

			<div class="col-sm-2 dropdown" id="dropdownUser1">
				<a data-target="{{ url('/products/prebuilds') }}" target="_self" href="{{ url('/products/prebuilds') }}" class="text-center text-decoration-none d-block py-2 p-3">
					<h6 class="text-{{ $theme == 'light' ? 'dark' : 'light' }} p-2 my-2 rounded-pill">
						Computers
					</h6>
				</a>
				<ul class="dropdown-menu text-small border-0 bg-{{ $theme == 'light' ? 'light' : 'navy' }} shadow">
					<li><a class="dropdown-item text-{{ $theme == 'light' ? 'dark' : 'light' }}" href="#">High end</a></li>
					<li><a class="dropdown-item text-{{ $theme == 'light' ? 'dark' : 'light' }}" href="#">Middle</a></li>
					<li><a class="dropdown-item text-{{ $theme == 'light' ? 'dark' : 'light' }}" href="#">Low end</a></li>
				</ul>
			</div>

		</div>

		<div class="w-25"></div>

		<!--<div class="col-1 d-flex">
			<div id="theme-toggle" class="my-3 justify-content-end btn btn-sahara">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="{{ $theme == 'light' ? 'black' : 'white' }}" class="align-middle bi bi-{{ $theme == 'light' ? 'sun' : 'moon' }}-fill" viewBox="0 0 16 16">
					<path fill-rule="evenodd" d="{{ $theme == 'light' ? 'M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z' : 'M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z' }}"/>
				</svg>
			</div>
		</div>-->

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