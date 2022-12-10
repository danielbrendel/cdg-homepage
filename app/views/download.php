<div class="columns">
	<div class="column is-2"></div>

	<div class="column is-8 is-vertical-margin">
		<div class="content-padding">
			<h2 class="is-font-headline">Download Casual Desktop Game</h2>

            <p>
                @if (env('APP_SHOWSTANDALONEDL'))
                    Casual Desktop Game is available via <a class="is-link" href="https://store.steampowered.com/">Steam</a>
                    or via <a class="is-link" href="#standalone">Standalone download</a>. <br/> When using Steam you have to first 
                    download and install Steam from the official homepage.
                @else
                    Casual Desktop Game is available via <a class="is-link" href="https://store.steampowered.com/">Steam</a>.
                    Therefore first download Steam from the official homepage.
                @endif
            </p>

            <p>
                <code class="code">
                    Click <a href="https://store.steampowered.com/about/">here</a> to download Steam.
                </code>
            </p>

            <p>
                After installing Steam you can then download Casual Desktop Game from the Steam Shop.
            </p>

            <p>
                <span class="is-inline-block"><a class="button is-success" href="steam://install/1001860">Download Casual Desktop Game</a></span>
                <span class="is-inline-block is-top-5"><a href="https://store.steampowered.com/app/1001860/Casual_Desktop_Game/">View on Steam</a></span>
            </p>

            <p>
                After downloading and installing Casual Desktop Game you can then run the game from your Steam game library.
            </p>

            <p>
                The following system requirements must be met in order to play the game:<br/>
                
                <ul>
                    <li>Windows 7 or above</li>
                    <li>Microsoft Visual C++ 2019 redist</li>
                    <li>DirectX version 9.0</li>
                    <li>64-bit processor and operating system</li>
                    <li>1.5 GHz processor or more</li>
                    <li>1024 MB RAM or more</li>
                    <li>Intel HD graphics chipcard or better</li>
                    <li>30 MB space on hard drive disk</li> 
                </ul>

                <br/>
                Note that Steam will install the neccessary dependencies such as Microsoft Visual C++ redistributable package and DirectX.
            </p>

            @if (env('APP_SHOWSTANDALONEDL'))
                <hr/>

                <a name="standalone"></a>

                <h2>Standalone version</h2>

                <p>
                    You can also download Casual Desktop Game as a standalone application.<br/>
                    This way you can run the game as a portable application without an installation or binding to a DRM system.
                </p>

                <div class="is-inline-block">
                    <a class="button is-info" href="{{ asset('downloads/cdg_v' . env('APP_STANDALONEDLVER') . '.zip') }}">Download version {{ env('APP_STANDALONEDLVER') }}</a>
                </div>

                @if (count($versions) > 0)
                <div class="is-inline-block">
                    <a href="javascript:void(0);" onclick="document.getElementById('oldversions').classList.remove('is-hidden');">Show older versions</a>
                </div>
                @endif

                <div id="oldversions" class="oldversions is-hidden">
                    <code class="code">
                        @foreach ($versions as $version)
                            <a href="{{ asset('downloads/cdg_v' . $version . '.zip') }}">{{ 'Casual Desktop Game x64 v' . $version }}</a><br/>
                        @endforeach
                    </code>
                </div>

                <p>
                    Usage instructions:<br/>

                    <ul>
                        <li>Download the prefered version of Casual Desktop Game</li>
                        <li>Extract the ZIP archive in a directory of your choice</li>
                        <li>Run dnyCasualDeskGame.exe to play the game</li>
                        <li>If desired you can place a shortcut to the game on your Desktop</li>
                    </ul>
                </p>

                <p>
                    The system requirements are the same as mentioned above in the Steam section.
                </p>
            @endif

            <hr/>

            <p>Official Workshop items</p>

            <div class="workshop-items">
                @foreach ($workshop_items as $item)
                    <div class="workshop-item">
                        <steam-workshop itemid="{{ $item }}" show-image="0"></steam-workshop>
                    </div>
                @endforeach
            </div>

            <p>Visit the <a href="https://steamcommunity.com/app/1001860/workshop/">Steam Workshop</a> for more community content</p>
		</div>
	</div>

	<div class="column is-2"></div>
</div>