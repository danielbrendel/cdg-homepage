<div class="columns">
	<div class="column is-2"></div>

	<div class="column is-8 is-vertical-margin">
		<div class="content-padding">
			<a name="content"></a>

			<h2 class="is-font-headline">Welcome to Casual Desktop Game</h2>

			<p>
				Casual Desktop Game is a fanmade remake of the ancient Desktop Destroyer.
			</p>

			<p>
				The games style is the same like the original game, except that you can download
				new tools, entities and other stuff from the Steam Workshop.
			</p> 
			
			<p>
				Tools are made by programming them via AngelScript, a popular scripting engine in the game programming
				universe. 
			</p>

			<p>
				Become part of the community, play the game on Steam and revive your childhood.
			</p>

			<p>
				The game is free to play and there are no payable items since we believe that such kind
				of game must be totally free of charge. 
			</p>

			<div class="feature-cards">
				<div class="feature-card">
					<div class="feature-card-left">
						&#x25A0;
					</div>
					
					<div class="feature-card-right">
						Playable via Steam and available as x64 application for Windows Vista/7/10/11.
					</div>
				</div>

				<div class="feature-card">
					<div class="feature-card-left">
						&#x25A0;
					</div>

					<div class="feature-card-right">
						Download new items from the Workshop or share your own. The game supports Steam and own Workshop.
					</div>
				</div>

				<div class="feature-card">
					<div class="feature-card-left">
						&#x25A0;
					</div>

					<div class="feature-card-right">
						Developing and submitting own tools is very easy. Tools are created in AngelScript.
					</div>
				</div>

				<div class="feature-card">
					<div class="feature-card-left">
						&#x25A0;
					</div>

					<div class="feature-card-right">
						The game has been downloaded by more than 50k players worldwide where the count is still increasing.
					</div> 
				</div>

				<div class="feature-card">
					<div class="feature-card-left">
						&#x25A0;
					</div>

					<div class="feature-card-right">
						The game has been rated very positive (4.5 / 5 star rating) with very loving reviews.
					</div>
				</div>

				<div class="feature-card">
					<div class="feature-card-left">
						&#x25A0;
					</div>

					<div class="feature-card-right">
						You can share screenshots right out of the game which are posted on this website and Twitter.
					</div>
				</div>
			</div>

			<hr/>

			@if (count($reviews) > 0)
				<div class="reviews">
					<h2>Why players love the game</h2>

					@foreach ($reviews as $review)
						<div class="review">
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

			<p>
				Join the Desktop Destroyer Fan Group:
			</p>

			<p>
				<steam-group group="desktop-destroyer-fan-group" style-border="small"></steam-group>
			</p>

			<hr/>

			<p>
				If you have any questions, please create a discussion in the <a href="https://steamcommunity.com/app/1001860/discussions/">Steam forums</a>.
			</p>
		</div>
	</div>

	<div class="column is-2"></div>
</div>