<div class="columns">
	<div class="column is-2"></div>

	<div class="column is-8 is-vertical-margin">
		<div class="content-padding">
			<h2 class="is-font-headline">View screenshots</h2>

			<p>
				Here you can view screenshots which are fetched from the Steam Community.
				You can sort them by top rated and recently uploaded screenshots.
			</p>

			<div class="header-frame">
				<span><a class="link-blue" id="link-steam-screenshots-top" href="javascript:void(0);" onclick="document.getElementById('steam-screens-content').innerHTML = ''; window.querySteamScreenshots('toprated'); this.classList.add('link-underlined'); document.getElementById('link-steam-screenshots-recent').classList.remove('link-underlined');">Top</a></span>
				<span>|</span>
				<span><a class="link-blue" id="link-steam-screenshots-recent" href="javascript:void(0);" onclick="document.getElementById('steam-screens-content').innerHTML = ''; window.querySteamScreenshots('mostrecent'); this.classList.add('link-underlined'); document.getElementById('link-steam-screenshots-top').classList.remove('link-underlined');">Recent</a></span>
			</div>

			<div class="screens-content" id="steam-screens-content"></div>
		</div>
	</div>

	<div class="column is-2"></div>
</div>