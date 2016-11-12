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

            const appTitleBarBottom = $(".app-titlebar").outerHeight();
            $("#app-menu").css({"top": appTitleBarBottom });


            const docSize = {width: $(document).height(), height: $(document).height()- appTitleBarBottom};
            $("#app-menu-cover-area").css({"width": docSize.width, "height": docSize.height, "top": appTitleBarBottom});
        },

        navigateTo: function (relativePath) {
            $("#content").load(relativePath);
        },

        toggleMenu: function (show) {
            var menuIconClass = "";
            if(show === true) {
                $("#app-menu").show();
                $("#app-menu-cover-area").show();
            }else if(show === false){
                $("#app-menu").hide();
                $("#app-menu-cover-area").hide();
            }else{
                $("#app-menu").toggle();
                $("#app-menu-cover-area").toggle();
            }
            $("#app-menu-icon").removeClass("app-menu-icon");
            $("#app-menu-icon").removeClass("app-menu-icon-opened");

            $("#app-menu-icon").addClass($("#app-menu").is(":visible") ? "app-menu-icon-opened" : "app-menu-icon");
        }
    };

$(document).ready(function () {
    app.init();
});