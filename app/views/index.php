<div class="content">
	<div class="container">
		<div class="columns">
			<div class="column is-2"></div>

			<div class="column is-10">
				<h2 class="fade fade-out">Desktop Destroyer rebirth</h2>

				<div class="fade fade-out is-vertical-spacing">
					<div class="badge-padding is-inline-block" href="#"><img src="https://img.shields.io/badge/downloads-50k+-green" alt="downloads"/></div>
					<div class="badge-padding is-inline-block" href="#"><img src="https://img.shields.io/badge/price-free-success" alt="price"/></div>
					<div class="badge-padding is-inline-block" href="#"><img src="https://img.shields.io/badge/rating-4.5/5-blue" alt="rating"/></div>
				</div>

				<p class="fade fade-out">
					Many played the Desktop Destroyer / Stress Reducer back in the days
					and really loved it. It created so many fond memories in many peoples
					childhood days. 
				</p>

				<p class="fade fade-out">
					That's why Casual Desktop Game has been created. To bring back the old fun
					in a new and modern shape - which means downloadable community content and
					other community features. Thus the game is freely available to download and
					play via Steam. 
				</p>

				@if (env('APP_SHOWCASEVIDEO'))
				<p>
					<iframe class="is-video" src="{{ env('APP_SHOWCASEVIDEO') }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
				</p>
				@endif

				<p class="fade fade-out">
					Casual Desktop Game features AngelScript to create tools/entities.
				</p>

				<div class="feature-cards is-fixed-horizont">
					<div class="feature-card fade fade-out">
						<div class="feature-card-icon"><i class="fas fa-microchip fa-3x"></i></div>
						<div class="feature-card-info">x64 platform</div>
					</div>

					<div class="feature-card fade fade-out">
						<div class="feature-card-icon"><i class="fas fa-puzzle-piece fa-3x"></i></div>
						<div class="feature-card-info">Workshop</div>
					</div>

					<div class="feature-card fade fade-out">
						<div class="feature-card-icon"><i class="fas fa-code fa-3x"></i></div>
						<div class="feature-card-info">Development</div>
					</div>

					<div class="feature-card fade fade-out">
						<div class="feature-card-icon"><i class="fas fa-download fa-3x"></i></div>
						<div class="feature-card-info">50,000+</div>
					</div>

					<div class="feature-card fade fade-out">
						<div class="feature-card-icon"><i class="fas fa-star fa-3x"></i></div>
						<div class="feature-card-info">4.5/5 Stars</div>
					</div>
				</div>
			</div>

			<div class="column is-2"></div>
		</div>
	</div>
</div>

<a name="downloads" id="downloads-section"></a>
<div class="downloads">
	<div class="container">
		<div class="columns">
			<div class="column is-2"></div>

			<div class="column is-10 is-fixed-horizont">
				<h2 class="is-centered fade fade-out">Download</h2>

				<div class="is-centered fade fade-out">
					<div class="is-vertical-spacing">
						<iframe src="https://store.steampowered.com/widget/1001860/" frameborder="0" width="646" height="190"></iframe>
					</div>

					<div class="is-vertical-spacing">
						<iframe frameborder="0" src="https://itch.io/embed/227301?dark=true" width="552" height="167"><a href="https://danielbrendel.itch.io/casual-desktop-game">Casual Desktop Game by danielbrendel</a></iframe>
					</div>

					<div class="is-vertical-spacing">
						<a href="https://www.indiedb.com/games/casual-desktop-game" title="View Casual Desktop Game on Indie DB" target="_blank"><img src="https://button.indiedb.com/rating/medium/games/65487.png" alt="Casual Desktop Game" /></a>
					</div>

					<div class="is-vertical-spacing">
						<a class="button is-info" href="https://gamejolt.com/games/casual-desktop-game/785059">Download @ GameJolt</a>
					</div>
				</div>

				@if (env('APP_SHOWSTANDALONEDL'))
				<div class="tbl-downloads">
					<table class="fade fade-out">
						<thead>
							<tr>
								<td>Type</td>
								<td>Version</td>
								<td class="is-centered">Download</td>
							</tr>
						</thead>
						<tbody>
							@foreach (config('downloads') as $download)
								@if (($download->active) && (file_exists(public_path() . '/' . $download->resource)))
								<tr>
									<td><strong>{{ $download->name }}</strong></td>
									<td>Version: {{ $download->version }}</td>
									<td class="is-centered"><a class="button is-link" href="{{ asset($download->resource) }}"><i class="fas fa-download"></i>&nbsp;Download</a></td>
								</tr>
								@endif
							@endforeach
						</tbody>
					</table>
				</div>
				@endif
			</div>

			<div class="column is-2"></div>
		</div>
	</div>
</div>

<div class="screenshots">
	<div class="container">
		<div class="columns">
			<div class="column is-2"></div>

			<div class="column is-10">
				<h2 class="fade fade-out">Screenshots</h2>

				<p class="fade fade-out is-vertical-spacing">Get a visual impression of the game</p>

				<div class="is-centered-mobile">
					@for ($i = 1; $i < 7; $i++)
						<div class="screenshot fade fade-out">
							<a href="javascript:void(0);" onclick="window.vue.showImagePreview('{{ asset('img/screenshots/screen' . strval($i) . '.jpg') }}');"><img src="{{ asset('img/screenshots/screen' . strval($i) . '.jpg') }}" alt="Screenshot"/></a>
						</div>
					@endfor
				</div>

				<div class="screenshots-action">
					<a class="button is-link" href="{{ url('/screenshots') }}">View more</a>
				</div>
			</div>

			<div class="column is-2"></div>
		</div>
	</div>
</div>

@if (env('APP_ENABLEDONATION'))
<div class="donation">
	<div class="container">
		<div class="columns">
			<div class="column is-2"></div>

			<div class="column is-10 donation-transform">
				<h2 class="fade fade-out is-centered">Your support is greatly appreciated</h2>

				<p class="fade fade-out is-centered is-vertical-spacing">Your support helps to continue working on the project and providing the required infrastructure.</p>

				<div class="is-centered">
					<a href='https://ko-fi.com/C0C7V2ESD' target='_blank'><img height='36' style='border:0px;height:36px;' src='https://storage.ko-fi.com/cdn/kofi5.png?v=3' border='0' alt='Buy Me a Coffee at ko-fi.com' /></a>
				</div>
			</div>

			<div class="column is-2"></div>
		</div>
	</div>
</div>
@endif