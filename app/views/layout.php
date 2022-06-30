<!doctype html>
<html lang="{{ getLocale() }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-with, initial-scale=1.0">
		<meta name="author" content="Daniel Brendel">
		<meta name="description" content="Official homepage of Casual Desktop Game">
		<meta name="tags" content="daniel brendel, cdg, casual desktop game, steam">
		
		<title>Casual Desktop Game</title>

		<link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}"/>
		<link rel="stylesheet" type="text/css" href="{{ asset('css/bulma.css') }}"/>

		@if (env('APP_DEBUG'))
        <script src="{{ asset('js/vue.js') }}"></script>
        @else
        <script src="{{ asset('js/vue.min.js') }}"></script>
        @endif
		<script src="{{ asset('js/fontawesome.js') }}"></script>
	</head>
	
	<body>
		<div id="main">
			<nav class="navbar is-dark" role="navigation" aria-label="main navigation">
				<div class="navbar-brand">
					<a class="navbar-item navbar-item-brand is-font-title" href="{{ url('/') }}">
						<img src="{{ asset('img/logo.png') }}" alt="Logo"/>&nbsp;Casual Desktop Game
					</a>

					<a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
						<span aria-hidden="true"></span>
						<span aria-hidden="true"></span>
						<span aria-hidden="true"></span>
					</a>
				</div>

				<div id="navbarBasicExample" class="navbar-menu">
					<div class="navbar-end">
						<a class="navbar-item" href="{{ url('/') }}">
							Home
						</a>

						<a class="navbar-item" href="{{ url('/news') }}">
							News
						</a>

						<a class="navbar-item" href="{{ url('/download') }}">
							Download
						</a>

						<a class="navbar-item" href="{{ url('/tools') }}">
							Tools
						</a>

						<a class="navbar-item" href="{{ url('/screenshots') }}">
							Screenshots
						</a>

						<div class="navbar-item has-dropdown is-hoverable">
							<a class="navbar-link">
								Community
							</a>

							<div class="navbar-dropdown">
								<a class="navbar-item" href="https://steamcommunity.com/app/1001860/workshop/">
									Workshop
								</a>

								<a class="navbar-item" href="https://steamcommunity.com/app/1001860/discussions/">
									Discussions
								</a>
							</div>
						</div>

						<a class="navbar-item" href="{{ url('/api') }}">
							API
						</a>
					</div>
				</div>
			</nav>

			@if ((isset($show_header)) && ($show_header))
			<div class="header" style="background-image: url('{{ asset('img/header.png') }}');">
				<div class="header-inner">
					<div class="columns">
						<div class="column is-2"></div>

						<div class="column is-8">
							<div class="header-content">
								<div class="header-left">
									<img src="{{ asset('img/header_image.png') }}" alt="Steam"/>
								</div>

								<div class="header-right">
									<h1 class="is-font-headline">Desktop Destroyer rebirth</h1>

									<hr/>

									<p>
										Many played the Desktop Destroyer / Stress Reducer back in the days
										and really loved it. It created so much fond memories in many peoples
										childhood days. 
									</p>

									<p>
										That's why Casual Desktop Game has been created. To bring back the old fun
										in a new and modern shape - which means downloadable community content and
										other community features. Thus the game is freely available to download and
										play via Steam. 
									</p>

									<div>
										<div class="badge-padding is-inline-block" href="#"><img src="https://img.shields.io/badge/downloads-50k+-green" alt="downloads"/></div>
										<div class="badge-padding is-inline-block" href="#"><img src="https://img.shields.io/badge/price-free-success" alt="price"/></div>
										<div class="badge-padding is-inline-block" href="#"><img src="https://img.shields.io/badge/rating-4.5/5-blue" alt="rating"/></div>
									</div>
								</div>
							</div>
						</div>

						<div class="column is-2"></div>
					</div>
				</div>
			</div>
			@endif

			<div class="content">
				{%content%}
			</div>

			<div class="footer">
				<div class="columns">
        			<div class="column is-4"></div>

					<div class="column is-4">
						<div class="footer-frame">
							<div class="footer-content">
								&copy; {{ date('Y') }} by Daniel Brendel | <span class="is-pointer" title="Steam" onclick="window.open('https://store.steampowered.com/app/1001860/Casual_Desktop_Game/');"><i class="fab fa-steam"></i></span>&nbsp;&nbsp;&nbsp;<span class="is-pointer" title="Twitter" onclick="window.open('https://twitter.com/dbrendel_dev');"><i class="fab fa-twitter"></i></span>
							</div>
						</div>
					</div>

					<div class="column is-4"></div>
				</div>
			</div>
		</div>

		<script src="{{ asset('js/app.js') }}"></script>
		<div class="is-hidden">{%javascript%}</div>
		<script>
			document.addEventListener('DOMContentLoaded', function(){
				window.vue.initNavbar();
			});
		</script>
	</body>
</html>