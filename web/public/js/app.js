/**
 * Created by Frithjof on 12.11.2016.
 */

var app = {
        init: function () {
           window.onhashchange = function(){
               if(window.location.hash.length > 0){
                   app.navigateTo(window.location.hash.substr(1));
               }else{
                   app.navigateTo("/frontend/startFront");
               }
           };

           window.onhashchange();
        },

        navigateTo: function (relativePath) {
            $("#content").load(relativePath);
        }
    };

$(document).ready(function () {
    app.init();
});