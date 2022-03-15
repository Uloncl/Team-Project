<script>
	var prevScrollpos = window.pageYOffset;
	window.onscroll = function() {
		var currentScrollPos = window.pageYOffset;
		if (prevScrollpos > currentScrollPos) {
			document.getElementById("navbar").style.top = "0";
		} else {
			document.getElementById("navbar").style.top = "-100px";
		}
		prevScrollpos = currentScrollPos;
	}
</script>
<style>
	.navbar {
		transition: top 0.2s ease;
	}
</style>
<header id="navbar" class="navbar navbar-expand-md bg-light site-header sticky-top text-dark">
	<div class="row mx-5 w-100">
		<div class="col-sm-1 text-center">
			<a href="/" class="text-decoration-none">
				<h2 class="my-3 text-sahara fst-italic">Sahara</h2>
			</a>
		</div>


		<div class="col row my-1">

			<div class="col dropdown" id="dropdownUser1">
				<a data-target="{{ url('/products/games') }}" target="_self" href="{{ url('/products/games') }}" class="text-center text-decoration-none d-block py-2 p-3">
					<h6 class="text-dark p-2 my-2 rounded-pill">
						Games
					</h6>
				</a>
				<ul class="dropdown-menu text-small border-0 bg-light">
					<li><a class="dropdown-item" href="{{ url('/products/games') }}">PC</a></li>
					<li><a class="dropdown-item" href="{{ url('/products/games') }}">Consoles</a></li>
				</ul>
			</div>

			<div class="col dropdown" id="dropdownUser1">
				<a data-target="{{ url('/products/components') }}" target="_self" href="{{ url('/products/components') }}" class="text-center text-decoration-none d-block py-2 p-3">
					<h6 class="text-dark p-2 my-2 rounded-pill">
						Components
					</h6>
				</a>
				<ul class="dropdown-menu text-small border-0 bg-light">
					<li><a class="dropdown-item" href="#">CPU</a></li>
					<li><a class="dropdown-item" href="#">RAM</a></li>
					<li><a class="dropdown-item" href="#">Video Cards</a></li>
					<li><a class="dropdown-item" href="#">CPU Cooler</a></li>
					<li><a class="dropdown-item" href="#">Case</a></li>
					<li><a class="dropdown-item" href="#">Power Supply</a></li>
				</ul>
			</div>

			<div class="col dropdown" id="dropdownUser1">
				<a data-target="{{ url('/products/consoles') }}" target="_self" href="{{ url('/products/consoles') }}" class="text-center text-decoration-none d-block py-2 p-3">
					<h6 class="text-dark p-2 my-2 rounded-pill">
						Consoles
					</h6>
				</a>
				<ul class="dropdown-menu text-small border-0 bg-light">
					<li><a class="dropdown-item" href="#">Xbox's</a></li>
					<li><a class="dropdown-item" href="#">Playstations</a></li>
					<li><a class="dropdown-item" href="#">Nintendo</a></li>
				</ul>
			</div>

			<div class="col dropdown" id="dropdownUser1">
				<a data-target="{{ url('/products/prebuilds') }}" target="_self" href="{{ url('/products/prebuilds') }}" class="text-center text-decoration-none d-block py-2 p-3">
					<h6 class="text-dark p-2 my-2 rounded-pill">
						Computers
					</h6>
				</a>
				<ul class="dropdown-menu text-small border-0 bg-light">
					<li><a class="dropdown-item" href="#">High end</a></li>
					<li><a class="dropdown-item" href="#">Middle</a></li>
					<li><a class="dropdown-item" href="#">Low end</a></li>
				</ul>
			</div>

		</div>

		<div class="w-50"></div>

		@auth

		<div class="col-sm-1 dropdown my-4 text-center">
			<a href="#" class="text-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
				<img src="https://external-preview.redd.it/I298iZdWplRbjz9GUMAm8qGgZ8rAKdeC3Q0wl9n1CVM.jpg?auto=webp&s=0a990e77e6bb0faadd35be60365e472485a2fa4e" alt="mdo" width="32" height="32" class="rounded-circle">
			</a>
			<ul class="dropdown-menu text-small border-0 bg-light" aria-labelledby="dropdownUser1">
				<li><a class="dropdown-item" href="{{ url('/settings') }}">Settings</a></li>
				<li><a class="dropdown-item" href="{{ url('/profile') }}">Profile</a></li>
				<li>
					<hr class="dropdown-divider">
				</li>
				<li><a class="dropdown-item" href="{{ url('/saved') }}">Your Saved Products</a></li>
				<li>
					<hr class="dropdown-divider">
				</li>
				<li><a class="dropdown-item" href="{{ url('/logout') }}">Log out</a></li>
			</ul>
		</div>

		@else

		<div class="col-sm-1 dropdown my-4 text-center">
			<a href="#" class="text-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
				<img src="../img/default-pfp.png" alt="mdo" width="32" height="32" class="rounded-circle">
			</a>
			<ul class="dropdown-menu text-small border-0 bg-light" aria-labelledby="dropdownUser1">
				<li><a class="dropdown-item" href="{{ url('/login') }}">Login</a></li>
				<li><a class="dropdown-item" href="{{ url('/register') }}">Register</a></li>
			</ul>
		</div>

		@endauth

	</div>






	</nav>
</header>