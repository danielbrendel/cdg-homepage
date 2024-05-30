<script>
    document.addEventListener('DOMContentLoaded', function() {
        window.backgroundsIndex = null;

        window.queryBackgrounds();
    });

    window.queryBackgrounds = function() {
        let backgroundsContent = document.getElementById('backgrounds-content');

        backgroundsContent.innerHTML += "<div id='steam-spinner'><br/><center><i class='fas fa-spinner fa-spin'></i></center></div>";

        window.vue.ajaxRequest('post', '{{ url('/backgrounds/query') }}', {}, function(response){
            if (response.code == 200) {
                let spinner = document.getElementById('steam-spinner');
                if (spinner) {
                    spinner.remove();
                }
                
                response.data.forEach(function(elem, index) {
                    let html = window.vue.renderBackground(elem);

                    backgroundsContent.innerHTML += html;
                });
            }
        });
    };
</script>