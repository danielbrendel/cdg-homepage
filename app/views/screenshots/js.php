<script>
    document.addEventListener('DOMContentLoaded', function() {
        window.screensIndex = null;

        document.getElementById('link-steam-screenshots-top').click();
    });

    window.querySteamScreenshots = function(sorting) {
        let screensContent = document.getElementById('steam-screens-content');

        screensContent.innerHTML += "<div id='steam-spinner'><br/><center><i class='fas fa-spinner fa-spin'></i></center></div>";

        window.vue.ajaxRequest('post', '{{ url('/screenshots/query/steam') }}', { sorting: sorting }, function(response){
            if (response.code == 200) {
                let spinner = document.getElementById('steam-spinner');
                if (spinner) {
                    spinner.remove();
                }
                
                response.data.forEach(function(elem, index) {
                    let html = window.vue.renderSteamScreenshot(elem);

                    screensContent.innerHTML += html;
                });

                setTimeout(function(){
                    location.href = window.location.origin + '/screenshots#screens-area';
                }, 1000);
            }
        });
    };
</script>