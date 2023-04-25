<div class="columns">
	<div class="column is-2"></div>

	<div class="column is-8 is-vertical-margin">
		<div class="content-padding">
			<a name="content"></a>

			<h2 class="is-font-headline fade fade-out">Welcome to Casual Desktop Game</h2>

			<p class="fade fade-out">
				Casual Desktop Game is a fanmade remake of the ancient Desktop Destroyer.
			</p>

			<p class="fade fade-out">
				The games style is the same like the original game, except that you can download
				new tools, entities and other stuff from the Steam Workshop.
			</p> 
			
			<p class="fade fade-out">
				Tools are made by programming them via AngelScript, a popular scripting engine in the game programming
				universe. 
			</p>

			<p class="fade fade-out">
				Become part of the community, play the game on Steam and revive your childhood.
			</p>

			<p class="fade fade-out">
				The game is free to play and there are no payable items since we believe that such kind
				of game must be totally free of charge. 
			</p>

			<hr/>

			<h2 class="fade fade-out">Casual Desktop Game is a modern product</h2>

			<div class="feature-cards">
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

			<hr/>

			<h2>Why players love the game</h2>

			@if (count($reviews) > 0)
				<div class="reviews is-centered">
					@foreach ($reviews as $review)
						<div class="review fade fade-out">
							<div class="review-content">
								&quot;{!! str_replace("\r\n", "<br/>", $review->get('content')) !!}&quot;
							</div>

							<div class="review-footer">
								<i class="fas fa-thumbs-up"></i>&nbsp;<a href="{{ $review->get('url') }}">{{ $review->get('type') }}</a>
							</div>
						</div>
					@endforeach
				</div>

				<hr/>
			@endif

			<h3 class="fade fade-out">Join the Desktop Destroyer Fan Group:</h3>

			<p class="fade fade-out steam-group-padding steam-group-margin-top">
				<steam-group group="desktop-destroyer-fan-group" style-border="small"></steam-group>
			</p>

			<hr/>

			<p class="fade fade-out">
				If you have any questions, please create a discussion in the <a href="https://steamcommunity.com/app/1001860/discussions/">Steam forums</a>.
			</p>
		</div>
	</div>

	<div class="column is-2"></div>
</div>