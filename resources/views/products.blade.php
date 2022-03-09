<x-app>
	<main class="container">
		<div class="container">
			<div class="row p-4 pb-0 m-4">
				
<<<<<<< HEAD
				<h1>{{ $title }}</h1>

				@forelse ($products as $product)
					<x-game-vert-card  :product="$product"/>
					@if ($loop->iteration % 4 == 0)
						<div class="w-100"></div>
					@endif
				@empty
					why is there nothing wtf
				@endforelse


				<!--<div class="col">
=======
				<div class="col">
					<div class="card" style="width: 15rem;">
						<img class="card-img-top" src="https://cdn2.steamgriddb.com/file/sgdb-cdn/grid/13e02498b2ae3df0c9078db2f9eb9b2d.webp" alt="Card image cap">
						<div class="card-body">
						  <h5 class="card-title">Elden Ring</h5>
						  <p class="card-text">FromSoftware</p>
						  <a href="https://store.steampowered.com/app/1245620/ELDEN_RING/" class="btn btn-primary">£49.99 on Steam</a>
						  <a href="#" class="btn btn-danger align-right" style="float: right;"><i class="bi bi-heart"></i></a>
						</div>
					</div>
				</div>

				<div class="col">
					<div class="card" style="width: 15rem;">
						<img class="card-img-top" src="https://cdn2.steamgriddb.com/file/sgdb-cdn/grid/561adbb4e6094bef3c29e38ceb6bd929.png" alt="Card image cap">
						<div class="card-body">
						  <h5 class="card-title">Cyberpunk 2077</h5>
						  <p class="card-text">CD Projekt Red</p>
						  <a href="https://www.gog.com/en/game/cyberpunk_2077" class="btn btn-primary">£49.90 on GOG</a>
						  <a href="#" class="btn btn-danger align-right" style="float: right;"><i class="bi bi-heart"></i></a>
						</div>
					</div>
				</div>

				<div class="col">
					<div class="card" style="width: 15rem;">
						<img class="card-img-top" src="https://cdn2.steamgriddb.com/file/sgdb-cdn/grid/914179592aa3523210dd00c0bb030c30.png" alt="Card image cap">
						<div class="card-body">
						  <h5 class="card-title">AC Valhalla</h5>
						  <p class="card-text">Ubisoft Montreal</p>
						  <a href="https://store.ubi.com/uk/game?pid=5e849c6c5cdf9a21c0b4e731&dwvar_5e849c6c5cdf9a21c0b4e731_Platform=pcdl&edition=Standard%20Edition&source=detail" class="btn btn-primary">£49.99 on Ubisoft</a>
						  <a href="#" class="btn btn-danger align-right" style="float: right;"><i class="bi bi-heart"></i></a>
						</div>
					</div>
				</div>
				
				<div class="col">
>>>>>>> 8d43fe6263883e7e0a7a401f3d6c665e2dcde05a
					<div class="card" style="width: 15rem;">
						<img class="card-img-top" src="https://cdn2.steamgriddb.com/file/sgdb-cdn/grid/5855660034a74cfe0e5fc8d57d17f4ac.png" alt="Card image cap">
						<div class="card-body">
							<h5 class="card-title">God of War</h5>
							<p class="card-text">Santa Monica Studio</p>
							
							<a href="https://www.epicgames.com/store/en-US/p/dying-light-2-stay-human" class="btn btn-primary">£39.99 on Epic</a>
							<a href="#" class="btn btn-danger align-right" style="float: right;"><i class="bi bi-heart"></i></a>
						</div>
					</div>
				</div>
				
			</div>

			<div class="row p-4 pt-2 m-4">
				
				<div class="col">
					<div class="card" style="width: 15rem;">
						<img class="card-img-top" src="https://cdn2.steamgriddb.com/file/sgdb-cdn/grid/43f6943d7a020cdcb8d27aebb9d96221.png" alt="Card image cap">
						<div class="card-body">
						  <h5 class="card-title">GTA V</h5>
						  <p class="card-text">Rockstar Games</p>
						  <a href="https://www.epicgames.com/store/en-US/p/grand-theft-auto-v" class="btn btn-primary">£14.99 on Epic</a>
						  <a href="#" class="btn btn-danger align-right" style="float: right;"><i class="bi bi-heart"></i></a>
						</div>
					</div>
				</div>

				<div class="col">
					<div class="card" style="width: 15rem;">
						<img class="card-img-top" src="https://cdn2.steamgriddb.com/file/sgdb-cdn/grid/0ea50e88822a30ab6cd93ba4a082d614.png" alt="Card image cap">
						<div class="card-body">
						  <h5 class="card-title">Arkham Knight</h5>
						  <p class="card-text">Rocksteady Studios</p>
						  <a href="https://store.steampowered.com/app/208650/Batman_Arkham_Knight/" class="btn btn-primary">£15.99 on Steam</a>
						  <a href="#" class="btn btn-danger align-right" style="float: right;"><i class="bi bi-heart"></i></a>
						</div>
					</div>
				</div>

				<div class="col">
					<div class="card" style="width: 15rem;">
						<img class="card-img-top" src="https://cdn2.steamgriddb.com/file/sgdb-cdn/grid/3d02d7d499c5801377ccbddcf8b0759e.png" alt="Card image cap">
						<div class="card-body">
						  <h5 class="card-title">Riders Republic</h5>
						  <p class="card-text">Ubisoft Annecy</p>
						  <a href="https://www.epicgames.com/store/en-US/p/riders-republic" class="btn btn-primary">£24.99 on Epic</a>
						  <a href="#" class="btn btn-danger align-right" style="float: right;"><i class="bi bi-heart"></i></a>
						</div>
					</div>
				</div>

				<div class="col">
					<div class="card" style="width: 15rem;">
						<img class="card-img-top" src="https://cdn2.steamgriddb.com/file/sgdb-cdn/grid/458e998ed46376eb777b4df39beb02ce.png" alt="Card image cap">
						<div class="card-body">
						  <h5 class="card-title">Ghostrunner</h5>
						  <p class="card-text">505 Games</p>
						  <a href="https://store.steampowered.com/app/1139900/Ghostrunner/" class="btn btn-primary">£9.99 on Steam</a>
						  <a href="#" class="btn btn-danger align-right" style="float: right;"><i class="bi bi-heart"></i></a>
						</div>
					</div>
<<<<<<< HEAD
				</div>-->
				
=======
				</div>

>>>>>>> 8d43fe6263883e7e0a7a401f3d6c665e2dcde05a
			</div>
		</div>
	</main>
</x-app>
