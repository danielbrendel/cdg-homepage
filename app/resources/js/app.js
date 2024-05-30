/**
 * app.js
 * 
 * Put here your application specific JavaScript implementations
 */

import './../sass/app.scss';

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import hljs from 'highlight.js';
import 'highlight.js/scss/github.scss';

window.hljs = hljs;

window.vue = new Vue({
    el: '#main',

    data: {
        bShowPreviewImageModal: false,
        clsLastImagePreviewAspect: '',
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
                        <a href="javascript:void(0);" onclick="window.vue.showImagePreview('` + item + `')"><img src="` + item + `" alt="screenshot"></a>
                    </div>
                </div>
            `;

            return html;
        },

        renderBackground: function(item) {
            let html = `
                <div class="background-item">
                    <div class="background-preview" style="background-image: url('` + item.preview + `');"></div>

                    <div class="background-info">
                        <div class="background-info-name">` + item.name + `</div>

                        <div class="background-info-description">` + (((item.description !== null) && (item.description.length > 0)) ? item.description : 'N/A') + `</div>
                    </div>

                    <div class="background-download">
                        <a class="button is-success" href="` + item.asset + `"><i class="fas fa-download"></i>&nbsp;Download</a>
                    </div>

                    <div class="background-footer">
                        By <a href="` + item.link + `">` + item.author + `</a>
                    </div>
                </div>
            `;

            return html;
        },

        showImagePreview: function(asset, aspect = 'is-5by3') {
            let img = document.getElementById('preview-image-modal-img');
            if (img) {
                img.src = asset;
                img.parentNode.href = asset;

                if (window.vue.clsLastImagePreviewAspect.length > 0) {
                    img.parentNode.classList.remove(window.vue.clsLastImagePreviewAspect);
                }

                window.vue.clsLastImagePreviewAspect = aspect;
                img.parentNode.classList.add(window.vue.clsLastImagePreviewAspect);

                window.vue.bShowPreviewImageModal = true;
            }
        },
    }
});