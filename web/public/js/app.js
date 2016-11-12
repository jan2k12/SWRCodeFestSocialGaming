/**
 * Created by Frithjof on 12.11.2016.
 */

var app = {
    init: function(){
        window.onhashchange = function(){
            var currentHash = window.location.hash;
            if(currentHash.length > 0){
                currentHash = currentHash.substr(1);
                app.navigateTo(currentHash);
            }
        };

        window.onhashchange();
    },

    navigateTo: function(relativePath){
        $("#content").load(relativePath);
    }

};

$(document).ready(function(){
    app.init();
});