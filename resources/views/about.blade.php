<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>{{ config('app.name', 'Laravel') }}</title>
		<script src="{{ asset('js/app.js') }}" ></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" type="text/javascript"></script>
		<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
		<!-- Font Awesome -->
		<link
		href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
		rel="stylesheet"
		/>
		<!-- Google Fonts -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
		<!-- MDB -->
		<link
		href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css"
		rel="stylesheet"
		/>
		<script src="https://kit.fontawesome.com/3b3d7324d5.js" crossorigin="anonymous"></script>
		<!-- MDB -->
		<script
		type="text/javascript"
		src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"
		></script>

	</head>
	<body class="bg-light" style="overflow-x:hidden; min-width: 1880px; width: auto;">
		<style>
            @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap');
            #about 
            {
                font-family: 'Montserrat', sans-serif;
            }
                
        </style>
        
        <div id="app">
			<x-navbar/>
            <div class="container" id="about">
                <div class="row text-center mt-5 mb-4">
                    <h1 style="font-weight: 900;">Meet The Team Behind Sahara</h1>
                </div>
            
                <div class="row bg-light mb-5">
                    <p>
                        Sahara is an online catalogue where users can find their favourite video games, the latest consoles, 
                        PC builds from various price points and all the components for your dream PC builds.
                        <br><br>
                        Made with <i class="bi bi-heart-fill" style="color: #dc3545"></i> by five students passionate about 
                        technology and videogames, as a university project. We consider it a stepping stone towards more
                        complex goals. We hope you'll enjoy using Sahara.
                    </p>
                </div>
            
                <div class="row mb-5">
                    <div class="col">
                        <div class="card">
                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                
                                <img
                                    src="/img/team/andrea.jpg"
                                    class="card-img-top"
                                    alt="Andrea"
                                />
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.068);"></div>
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="row card-title" style="font-size: 25px; font-weight: 600;">Andrea La Fauci</h5>
                                <p class="row card-text" style="font-size: 13px; font-weight: 400;">
                                    FRONTEND & SCRUM MASTER
                                </p>
                                <div class="row">
                                    <div class="col text-center">
                                        <a
                                            href="https://www.facebook.com/andrea.lafauci/"
                                        >
                                            <i
                                                style="font-size: 1.8rem"
                                                class="m-1 bi bi-facebook"
                                            ></i>
                                        </a>
                                    </div>
                                    <div class="col text-center">
                                        <a href="https://github.com/Bosurgi">
                                            <i
                                                style="font-size: 1.8rem"
                                                class="m-1 bi bi-github"
                                            ></i>
                                        </a>
                                    </div>
                                    <div class="col text-center">
                                        <a
                                            href="https://www.linkedin.com/in/andrea-lafaucideleo/"
                                        >
                                            <i
                                                style="font-size: 1.8rem"
                                                class="m-1 bi bi-linkedin"
                                            ></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <div class="col">
                        <div class="card">
                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                
                                <img
                                    src="/img/team/lewis.jpg"
                                    class="card-img-top"
                                    alt="Andrea"
                                />
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.068);"></div>
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="row card-title" style="font-size: 25px; font-weight: 600;">Lewis Mann</h5>
                                <p class="row card-text" style="font-size: 13px; font-weight: 400;">
                                    LEAD DEVELOPER
                                </p>
                                <div class="row">
                                    <div class="col text-center">
                                        <a
                                            href="#"
                                        >
                                            <i
                                                style="font-size: 1.8rem"
                                                class="m-1 bi bi-facebook"
                                            ></i>
                                        </a>
                                    </div>
                                    <div class="col text-center">
                                        <a href="https://github.com/Nebula6">
                                            <i
                                                style="font-size: 1.8rem"
                                                class="m-1 bi bi-github"
                                            ></i>
                                        </a>
                                    </div>
                                    <div class="col text-center">
                                        <a
                                            href="https://www.linkedin.com/in/lewis-mann-0/"
                                        >
                                            <i
                                                style="font-size: 1.8rem"
                                                class="m-1 bi bi-linkedin"
                                            ></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <div class="col">
                        <div class="card">
                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                
                                <img
                                    src="/img/team/aryan.jpg"
                                    class="card-img-top"
                                    alt="Andrea"
                                />
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.068);"></div>
                                </a>
                            </div>
                            
                            <div class="card-body">
                                <h5 class="row card-title" style="font-size: 25px; font-weight: 600;">Aryan Prince</h5>
                                <p class="row card-text" style="font-size: 13px; font-weight: 400;">
                                    FRONTEND & UI/UX DESIGN
                                </p>
                                <div class="row">
                                    <div class="col text-center">
                                        <a
                                            href="#"
                                        >
                                            <i
                                                style="font-size: 1.8rem"
                                                class="m-1 bi bi-facebook"
                                            ></i>
                                        </a>
                                    </div>
                                    <div class="col text-center">
                                        <a href="https://github.com/aryanprince">
                                            <i
                                                style="font-size: 1.8rem"
                                                class="m-1 bi bi-github"
                                            ></i>
                                        </a>
                                    </div>
                                    <div class="col text-center">
                                        <a
                                            href="https://www.linkedin.com/in/aryanprince/"
                                        >
                                            <i
                                                style="font-size: 1.8rem"
                                                class="m-1 bi bi-linkedin"
                                            ></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <div class="col">
                        <div class="card">
                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                
                                <img
                                    src="/img/team/ben.jpg"
                                    class="card-img-top"
                                    alt="Andrea"
                                />
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.068);"></div>
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="row card-title" style="font-size: 25px; font-weight: 600;">Benjamin Miles</h5>
                                <p class="row card-text" style="font-size: 13px; font-weight: 400;">
                                    BACKEND DEVELOPER
                                </p>
                                <div class="row">
                                    <div class="col text-center">
                                        <a
                                            href="#"
                                        >
                                            <i
                                                style="font-size: 1.8rem"
                                                class="m-1 bi bi-facebook"
                                            ></i>
                                        </a>
                                    </div>
                                    <div class="col text-center">
                                        <a href="https://github.com/Ben-Miles2601">
                                            <i
                                                style="font-size: 1.8rem"
                                                class="m-1 bi bi-github"
                                            ></i>
                                        </a>
                                    </div>
                                    <div class="col text-center">
                                        <a
                                            href="#"
                                        >
                                            <i
                                                style="font-size: 1.8rem"
                                                class="m-1 bi bi-linkedin"
                                            ></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <div class="col">
                        <div class="card">
                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                
                                <img
                                    src="/img/team/mabel.jpg"
                                    class="card-img-top"
                                    alt="Andrea"
                                />
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.068);"></div>
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="row card-title" style="font-size: 25px; font-weight: 600;">Mabel McDonald</h5>
                                <p class="row card-text" style="font-size: 13px; font-weight: 400;">
                                    FRONTEND DEVELOPER
                                </p>
                                <div class="row">
                                    <div class="col text-center">
                                        <a
                                            href="https://www.facebook.com/mabel.mcdonald.13"
                                        >
                                            <i
                                                style="font-size: 1.8rem"
                                                class="m-1 bi bi-facebook"
                                            ></i>
                                        </a>
                                    </div>
                                    <div class="col text-center">
                                        <a href="#">
                                            <i
                                                style="font-size: 1.8rem"
                                                class="m-1 bi bi-github"
                                            ></i>
                                        </a>
                                    </div>
                                    <div class="col text-center">
                                        <a
                                            href="https://www.linkedin.com/in/mabel-mcdonald-020350180/"
                                        >
                                            <i
                                                style="font-size: 1.8rem"
                                                class="m-1 bi bi-linkedin"
                                            ></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<x-footer/>
		</div>
		<x-flash/>
	</body>
</html>


