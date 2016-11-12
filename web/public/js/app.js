/**
 * Created by Frithjof on 12.11.2016.
 */

var app = {
    init: function(){
        console.log("init app...");
    },

    navigateTo: function(relativePath){
        $("#content").load(relativePath);
    }

};

$(document).ready(function(){
    app.init();
});