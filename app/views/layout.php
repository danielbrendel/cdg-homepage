<!doctype html>
<html lang="{{ getLocale() }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-with, initial-scale=1.0">
		<meta name="author" content="Daniel Brendel">
		<meta name="description" content="Official homepage of Casual Desktop Game">
		<meta name="tags" content="daniel brendel, cdg, casual desktop game, steam">

		<meta property="og:title" content="Casual Desktop Game{{ ((isset($page_title)) ? ' - ' . $page_title : '') }}">
		<meta property="og:description" content="Official homepage of Casual Desktop Game">
		<meta property="og:url" content="{{ url($_SERVER['REQUEST_URI']) }}">
		<meta property="og:image" content="{{ asset('img/steam_shop.png') }}">
		
		<title>
			Casual Desktop Game
			@if (isset($page_title))
				{{ ' - ' . $page_title }}
			@endif
		</title>

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
			<nav class="navbar is-fixed-top is-dark" role="navigation" aria-label="main navigation">
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
				@include('header.php')
			@endif

			{%content%}

			<nav class="footer navbar is-fixed-bottom">
				<div class="footer-content">&copy; 2018 - {{ date('Y') }} Daniel Brendel | <a title="Contact" href="mailto:{{ env('APP_CONTACT') }}"><i class="fas fa-envelope"></i></a>&nbsp;<a title="Steam" href="https://store.steampowered.com/app/1001860/Casual_Desktop_Game/"><i class="fab fa-steam"></i></a>&nbsp;<a title="Twitter" href="https://twitter.com/{{ env('APP_TWITTERHANDLE') }}"><i class="fab fa-twitter"></i></div>
			</nav>
		</div>

		<script src="{{ asset('js/app.js') }}"></script>
		<div class="is-hidden">{%javascript%}</div>
		<script>
			window.waitDescLoad = null;

			window.checkDescLoad = function() {
				let elDesc = document.getElementsByClassName('steam-app-description');
				if ((elDesc) && (elDesc.length > 0)) {
					elDesc[0].innerHTML = elDesc[0].innerHTML.trim().substring(0, 102) + '...';

					clearInterval(window.waitDescLoad);
				}
			};

			document.addEventListener('DOMContentLoaded', function(){
				window.vue.initNavbar();

				window.waitDescLoad = setInterval(window.checkDescLoad, 250);

				const obsoptions = {
					root: null,
					rootMargin: '0px',
					threshold: 0.2
				};

				const obscallback = function(entries, observer) {
					entries.forEach(entry => {
						if (entry.isIntersecting) {
							entry.target.classList.replace('fade-out', 'fade-in');
						}
					});
				};

				const observer = new IntersectionObserver(obscallback, obsoptions);

				let fadeElems = document.querySelectorAll('.fade');
				fadeElems.forEach(elem => observer.observe(elem));
			});
		</script>
	</body>
</html>