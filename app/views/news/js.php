<script>
    document.addEventListener('DOMContentLoaded', function() {
        window.newsIndex = 0;

        window.queryNewsContent();
    });

    window.queryNewsContent = function() {
        let newsContent = document.getElementById('news-content');
        
        window.vue.ajaxRequest('get', '{{ url('/news/query') }}', {}, function(response){
            if (response.code == 200) {
                newsContent.innerHTML = '';
                
                response.data.appnews.newsitems.forEach(function(elem, index) {
                    let html = window.vue.renderNewsItem(elem);

                    newsContent.innerHTML += html;
                });
            }
        });
    };
</script>