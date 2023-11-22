/**
 * app.js
 * 
 * Put here your application specific JavaScript implementations
 */

import './../sass/app.scss';

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.vue = new Vue({
    el: '#main',

    data: {
    },

    methods: {
    initNavbar: function() {
        const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

        if ($navbarBurgers.length > 0) {
            $navbarBurgers.forEach( el => {
                el.addEventListener('click', () => {
                    const target = el.dataset.target;
                    const $target = document.getElementById(target);
                    
                    el.classList.toggle('is-active');
                    $target.classList.toggle('is-active');
                });
            });
        }
    },

    ajaxRequest: function (method, url, data = {}, successfunc = function(data){}, finalfunc = function(){}, config = {})
    {
        let func = window.axios.get;
        if (method == 'post') {
            func = window.axios.post;
        } else if (method == 'patch') {
            func = window.axios.patch;
        } else if (method == 'delete') {
            func = window.axios.delete;
        }

        func(url, data, config)
            .then(function(response){
                successfunc(response.data);
            })
            .catch(function (error) {
                console.log(error);
            })
            .finally(function(){
                    finalfunc();
                }
            );
    },

    renderNewsItem: function(item) {
        let date = new Date(item.date * 1000);
        let options = { year: 'numeric', month: 'short', day: 'numeric' };

        let html = `
            <div class="news-item">
                <div class="news-item-title">` + item.title + `</div>

                <div class="news-item-content">
                    ` + item.contents + `
                </div>

                <div class="news-item-footer">
                    <div class="news-item-footer-date">` + date.toLocaleDateString('en-US', options) + `</div>
                    <div class="news-item-footer-link"><a href="` + item.url + `">Read on Steam</a></div>
                </div>
            </div>
        `;

        return html;
    },

    renderScreenshot: function(item) {
        let html = `
            <div class="screen-item">
                <div class="screen-item-header">
                    <div class="screen-item-header-avatar"><img src="` + item.profile.avatar + `" width="32" height="32" alt="avatar"></div>
                    <div class="screen-item-header-name">` + item.profile.personaname + `</div>
                </div>

                <div class="screen-item-screenshot">
                    <a href="` + window.location.origin + '/img/screenshots/' + item.screenshot + `"><img src="` + window.location.origin + '/img/screenshots/' + item.thumb + `" alt="screenshot"></a>
                </div>

                <div class="screen-item-footer">
                    <div class="screen-item-footer-date">` + item.diff + `</div>
                    <div class="screen-item-footer-action"><a href="` + window.location.origin + '/img/screenshots/' + item.screenshot + `">View screenshot</a></div>
                </div>
            </div>
        `;

        return html;
    },

    renderSteamScreenshot: function(item) {
        let html = `
            <div class="screen-item">
                <div class="screen-item-screenshot">
                    <a href="` + item + `"><img src="` + item + `" alt="screenshot"></a>
                </div>
            </div>
        `;

        return html;
    },
    }
});