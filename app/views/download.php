<div class="container">
    <div class="columns">
        <div class="column is-2"></div>

        <div class="column is-8 is-vertical-margin">
            <div class="page content-padding">
                <h2 class="is-font-headline">Download Casual Desktop Game</h2>

                <p class="is-vertical-spacing">
                    @if (env('APP_SHOWSTANDALONEDL'))
                        Casual Desktop Game is available via <a class="is-link" href="https://store.steampowered.com/">Steam</a>
                        or via <a class="is-link" href="#standalone">Standalone download</a>. <br/> When using Steam you have to first 
                        download and install Steam from the official homepage.
                    @else
                        Casual Desktop Game is available via <a class="is-link" href="https://store.steampowered.com/">Steam</a>.
                        Therefore first download Steam from the official homepage.
                    @endif
                </p>

                <p class="is-vertical-spacing">
                    <code class="code">
                        Click <a href="https://store.steampowered.com/about/">here</a> to download Steam.
                    </code>
                </p>

                <p class="is-vertical-spacing">
                    After installing Steam you can then download Casual Desktop Game from the Steam Shop.
                </p>

                <p class="is-vertical-spacing">
                    <span class="is-inline-block"><a class="button is-success" href="steam://install/1001860">Download Casual Desktop Game</a></span>
                    <span class="is-inline-block is-top-5"><a href="https://store.steampowered.com/app/1001860/Casual_Desktop_Game/">View on Steam</a></span>
                </p>

                <p class="is-vertical-spacing">
                    After downloading and installing Casual Desktop Game you can then run the game from your Steam game library.
                </p>

                <p class="is-vertical-spacing">
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

                    <p class="is-vertical-spacing">
                        You can also download Casual Desktop Game as a standalone application. 
                        There is both a setup as well as a portable version available.
                        The setup is recommended for a permanent installation and the portable version 
                        is recommended for temporary usages. The setup does also install all the
                        neccessary dependencies.
                    </p>

                    <p class="is-vertical-spacing">
                        <span class="is-inline-block"><a class="button is-info" href="{{ asset('downloads/cdg_v' . env('APP_STANDALONEDLVER') . '_installer.msi') }}">Download</a></span><span class="is-inline-block dl-ident-top">&nbsp;Casual Desktop Game v{{ env('APP_STANDALONEDLVER') }} <strong>Setup</strong>&nbsp;<i class="fab fa-windows"></i></span>
                    </p>

                    <p class="is-vertical-spacing">
                        <span class="is-inline-block"><a class="button is-info" href="{{ asset('downloads/cdg_v' . env('APP_STANDALONEDLVER') . '.zip') }}">Download</a></span><span class="is-inline-block dl-ident-top">&nbsp;Casual Desktop Game v{{ env('APP_STANDALONEDLVER') }} <strong>Portable</strong>&nbsp;<i class="fab fa-windows"></i></span>
                    </p>

                    <p class="is-vertical-spacing">
                        Setup version of the game will install the standalone version to your system and register it with the installed applications.
                        When using the portable version you can just extract the archive anywhere and directly launch the game.
                    </p>

                    <p class="is-vertical-spacing">
                        The system requirements are the same as mentioned above in the Steam section.
                    </p>
                @endif
            </div>
        </div>

        <div class="column is-2"></div>
    </div>
</div>