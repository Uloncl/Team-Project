<x-app>
	<main class="container">
		<div class="container">
			<div class="row p-4 pb-0 m-4">
				
				<h1>{{ $product }}</h1>

				@if ($product == "Games")
					@forelse ($products as $product)
						<x-game-vert-card  :product="$product"/>
						@if ($loop->iteration % 4 == 0)
							<div class="w-100"></div>
						@endif
					@empty
						why is there nothing wtf
					@endforelse
				@endif

				<!--<div class="col">
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
				</div>-->
				
			</div>
		</div>
	</main>
</x-app>
