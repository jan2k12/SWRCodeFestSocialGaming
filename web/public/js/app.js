/**
 * Created by Frithjof on 12.11.2016.
 */

var app = {
        currentHash: "",
        init: function () {
           window.onhashchange = function(){
               if(window.location.hash.length > 0 && app.currentHash !== window.location.hash){
                   app.currentHash = window.location.hash;
                   app.navigateTo(window.location.hash.substr(1));
               }else{
                   app.navigateTo("/frontend/startFront");
               }
           };

           window.onhashchange();

            $(window).resize(function(){app.onWindowResized()});

            app.onWindowResized();

        },

        onWindowResized: function() {
            const appTitleBarBottom = $(".app-titlebar").outerHeight();
            $("#app-menu").css({"top": appTitleBarBottom });


            const docSize = {width: $(document).width(), height: $(document).height()- appTitleBarBottom};
            $("#app-menu-cover-area").css({"width": docSize.width, "height": docSize.height, "top": appTitleBarBottom});
        },

        navigateTo: function (relativePath) {
                $("#content").load(relativePath);
        },

        toggleMenu: function (show) {
            var menuIconClass = "";
            if(show === true) {
                $("#app-menu").show("blind");
                $("#app-menu-cover-area").show("fade");
            }else if(show === false){
                $("#app-menu").hide("blind");
                $("#app-menu-cover-area").hide("fade");
            }else{
                $("#app-menu").toggle("blind");
                $("#app-menu-cover-area").toggle("fade");
            }
            $("#app-menu-icon").removeClass("app-menu-icon");
            $("#app-menu-icon").removeClass("app-menu-icon-opened");

            $("#app-menu-icon").addClass($("#app-menu").is(":visible") ? "app-menu-icon-opened" : "app-menu-icon");
        },
        showMenuFor: function(username){
            if(username === "guest"){
                /*<div class="app-menu-user">
                 <div class="app-menu-title-bar">*/
                $(".app-menu-user").hide();
                $(".app-menu-guest").show("slide");
            }else{
                $(".app-menu-guest").hide();
                $(".app-menu-user").show("slide");
                $(".app-menu-title-bar",".app-menu-user").html(username.toString().toUpperCase());
            }
        }
    };

    var user = {

        login: function(){
            const username = $("#logon_username").removeClass("inputError").val();
            const password = $("#logon_password").removeClass("inputError").val();
            var credentialsValid = true;
            if(username === ""){
                credentialsValid = false;
                $("#logon_username").addClass("inputError");
            }
            if(password === ""){
                credentialsValid = false;
                $("#logon_password").addClass("inputError");
            }
            if(credentialsValid){
                $.get("user/login", function(isLoggedIn){
                    app.showMenuFor(username);
                    $("#logon_username").val("");
                    $("#logon_password").val("");
                    $(".embedded-login-form").hide("blind");
                    user.isLoggedIn = true;
                });
            }else{
                $(".embedded-login-form").effect("shake");
            }

        },
        logout: function(){
            $.get("user/logout", function(isLoggedOut){
                app.showMenuFor("guest");
                user.isLoggedIn = false;
            });
        },
        isLoggedIn: false

    };

$(document).ready(function () {
    app.init();
});