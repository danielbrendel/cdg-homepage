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
		<meta property="og:image" content="{{ asset('img/preview.png') }}">
		
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
			<nav class="navbar is-fixed-top" role="navigation" aria-label="main navigation">
				<div class="navbar-brand">
					<a class="navbar-item navbar-item-brand is-font-title" href="{{ url('/') }}">
						<img src="{{ asset('img/logo.png') }}" alt="Logo"/>&nbsp;
						<img src="{{ asset('img/title.png') }}" alt="Title"/>
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

						<a class="navbar-item" href="{{ url('/backgrounds') }}">
							Backgrounds
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

			<div class="footer">
                <div class="columns">
                    <div class="column is-3"></div>

                    <div class="column is-3">
                        <div class="footer-margin-bottom-10">&copy; 2018 - {{ date('Y') }} by {{ env('APP_AUTHOR') }}.</div>

                        <div>
                            Casual Desktop Game is a free indie game developed with retro feelings and nostalgia in mind.
							
                            Please <a href="mailto:{{ env('APP_CONTACT') }}">contact our support</a> for any issues or feedback.
                        </div>
                    </div>

                    <div class="column is-3 footer-desktop-right">
						@foreach (config('socials') as $social)
							@if ((is_string($social->url)) && (strlen($social->url) > 0))
							<span>
								<a href="{{ $social->url }}" target="_blank">
									<i class="fab fa-{{ $social->descriptor }} fa-2x"></i>
								</a>
							</span>
							@endif
						@endforeach

						@if (env('APP_CONTACT'))
                        <span>
                            <a href="mailto:{{ env('APP_CONTACT') }}" target="_blank">
                                <i class="fas fa-envelope fa-2x"></i>
                            </a>
                        </span>
						@endif
                    </div>

                    <div class="column is-3"></div>
                </div>
            </div>

			<div class="modal" :class="{'is-active': bShowPreviewImageModal}">
				<div class="modal-background"></div>

				<div class="modal-content">
					<p class="image">
						<a href="javascript:void(0);" target="_blank">
							<img id="preview-image-modal-img" alt="image">
						</a>
					</p>
				</div>

				<button class="modal-close is-large" aria-label="close" onclick="window.vue.bShowPreviewImageModal = false;"></button>
			</div>
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

				window.hljs.highlightAll();

				window.waitDescLoad = setInterval(window.checkDescLoad, 250);

				document.getElementsByTagName('body')[0].addEventListener('scroll', function() {
					if ((document.body.scrollTop > document.getElementsByClassName('navbar')[0].offsetHeight + 10) || (document.documentElement.scrollTop > document.getElementsByClassName('navbar')[0].offsetHeight + 10)) {
						document.getElementsByClassName('navbar')[0].classList.add('navbar-background-color');
					} else {
						document.getElementsByClassName('navbar')[0].classList.remove('navbar-background-color');
					}
				});

				const obsoptions = {
					root: null,
					rootMargin: '0px',
					threshold: 0.7
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