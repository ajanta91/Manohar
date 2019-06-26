/* Bootsnav */

!function(n){"use strict";var a={initialize:function(){this.event(),this.hoverDropdown(),this.navbarSticky(),this.navbarScrollspy()},event:function(){var a=n("nav.navbar.bootsnav"),o=a.hasClass("navbar-sticky");if(o&&a.wrap("<div class='wrap-sticky'></div>"),a.hasClass("brand-center")){var s=new Array,e=n("nav.brand-center"),t=e.find("ul.navbar-nav");e.prepend("<span class='storage-name' style='display:none;'></span>"),e.find("ul.navbar-nav > li").each(function(){if(n(this).hasClass("active")){var a=n("a",this).eq(0).text();n(".storage-name").html(a)}s.push(n(this).html())});var i=s.splice(0,Math.round(s.length/2)),l=s,d="",r=function(n){d="";for(var a=0;a<n.length;a++)d+="<li>"+n[a]+"</li>"};r(i),t.html(d),e.find("ul.nav").first().addClass("navbar-left"),r(l),t.after('<ul class="nav navbar-nav"></ul>').next().html(d),e.find("ul.nav").last().addClass("navbar-right"),e.find("ul.nav.navbar-left").wrap("<div class='col-half left'></div>"),e.find("ul.nav.navbar-right").wrap("<div class='col-half right'></div>"),e.find("ul.navbar-nav > li").each(function(){var a=n("ul.dropdown-menu",this),o=n("ul.megamenu-content",this);a.closest("li").addClass("dropdown"),o.closest("li").addClass("megamenu-fw")});var c=n(".storage-name").html();""==!c&&n("ul.navbar-nav > li:contains('"+c+"')").addClass("active")}a.hasClass("navbar-sidebar")?(n("body").addClass("wrap-nav-sidebar"),a.wrapInner("<div class='scroller'></div>")):n(".bootsnav").addClass("on"),a.find("ul.nav").hasClass("navbar-center")&&a.addClass("menu-center"),a.hasClass("navbar-full")?(n("nav.navbar.bootsnav").find("ul.nav").wrap("<div class='wrap-full-menu'></div>"),n(".wrap-full-menu").wrap("<div class='nav-full'></div>"),n("ul.nav.navbar-nav").prepend("<li class='close-full-menu'><a href='#'><i class='fa mdi-close'></i></a></li>")):a.hasClass("navbar-mobile")?a.removeClass("no-full"):a.addClass("no-full"),a.hasClass("navbar-mobile")&&(n(".navbar-collapse").on("shown.bs.collapse",function(){n("body").addClass("side-right")}),n(".navbar-collapse").on("hide.bs.collapse",function(){n("body").removeClass("side-right")}),n(window).on("resize",function(){n("body").removeClass("side-right")})),a.hasClass("no-background")&&n(window).on("scroll",function(){var a=n(window).scrollTop();a>34?n(".navbar-fixed").removeClass("no-background"):n(".navbar-fixed").addClass("no-background")}),a.hasClass("navbar-transparent")&&n(window).on("scroll",function(){var a=n(window).scrollTop();a>34?n(".navbar-fixed").removeClass("navbar-transparent"):n(".navbar-fixed").addClass("navbar-transparent")}),n(".btn-cart").on("click",function(n){n.stopPropagation()}),n("nav.navbar.bootsnav .attr-nav").each(function(){n("li.search > a",this).on("click",function(a){a.preventDefault(),n(".top-search").slideToggle()})}),n(".input-group-addon.close-search").on("click",function(){n(".top-search").slideUp()}),n("nav.navbar.bootsnav .attr-nav").each(function(){n("li.side-menu > a",this).on("click",function(a){a.preventDefault(),n("nav.navbar.bootsnav > .side").toggleClass("on"),n("body").toggleClass("on-side")})}),n(".side .close-side").on("click",function(a){a.preventDefault(),n("nav.navbar.bootsnav > .side").removeClass("on"),n("body").removeClass("on-side")})},hoverDropdown:function(){var a=n("nav.navbar.bootsnav"),o=n(window).width(),s=n(window).height(),e=a.find("ul.nav").data("in"),t=a.find("ul.nav").data("out");if(991>o){n(".scroller").css("height","auto"),n("nav.navbar.bootsnav ul.nav").find("li.dropdown").off("mouseenter"),n("nav.navbar.bootsnav ul.nav").find("li.dropdown").off("mouseleave"),n("nav.navbar.bootsnav ul.nav").find(".title").off("mouseenter"),n("nav.navbar.bootsnav ul.nav").off("mouseleave"),n(".navbar-collapse").removeClass("animated"),n("nav.navbar.bootsnav ul.nav").each(function(){n(".dropdown-menu",this).addClass("animated"),n(".dropdown-menu",this).removeClass(t),n("a.dropdown-toggle",this).off("click"),n("a.dropdown-toggle",this).on("click",function(a){return a.stopPropagation(),n(this).closest("li.dropdown").find(".dropdown-menu").first().stop().fadeToggle().toggleClass(e),n(this).closest("li.dropdown").first().toggleClass("on"),!1}),n("li.dropdown",this).each(function(){return n(this).find(".dropdown-menu").stop().fadeOut(),n(this).on("hidden.bs.dropdown",function(){n(this).find(".dropdown-menu").stop().fadeOut()}),!1}),n(".megamenu-fw",this).each(function(){n(".col-menu",this).each(function(){n(".content",this).addClass("animated"),n(".content",this).stop().fadeOut(),n(".title",this).off("click"),n(".title",this).on("click",function(){return n(this).closest(".col-menu").find(".content").stop().fadeToggle().addClass(e),n(this).closest(".col-menu").toggleClass("on"),!1}),n(".content",this).on("click",function(n){n.stopPropagation()})})})});var i=function(){n("li.dropdown",this).removeClass("on"),n(".dropdown-menu",this).stop().fadeOut(),n(".dropdown-menu",this).removeClass(e),n(".col-menu",this).removeClass("on"),n(".col-menu .content",this).stop().fadeOut(),n(".col-menu .content",this).removeClass(e)};n("nav.navbar.bootsnav").on("mouseleave",function(){i()}),n("nav.navbar.bootsnav .attr-nav").each(function(){n(".dropdown-menu",this).removeClass("animated"),n("li.dropdown",this).off("mouseenter"),n("li.dropdown",this).off("mouseleave"),n("a.dropdown-toggle",this).off("click"),n("a.dropdown-toggle",this).on("click",function(a){a.stopPropagation(),n(this).closest("li.dropdown").find(".dropdown-menu").first().stop().fadeToggle(),n(".navbar-toggle").each(function(){n(".mdi",this).removeClass("mdi-close"),n(".mdi",this).addClass("mdi-menu"),n(".navbar-collapse").removeClass("in"),n(".navbar-collapse").removeClass("on")})}),n(this).on("mouseleave",function(){return n(".dropdown-menu",this).stop().fadeOut(),n("li.dropdown",this).removeClass("on"),!1})}),n(".navbar-toggle").each(function(){n(this).off("click"),n(this).on("click",function(){n(".mdi",this).toggleClass("mdi-menu"),n(".mdi",this).toggleClass("mdi-close"),i()})})}else o>991&&(n(".scroller").css("height",s+"px"),a.hasClass("navbar-sidebar")?n("nav.navbar.bootsnav ul.nav").each(function(){n("a.dropdown-toggle",this).off("click"),n("a.dropdown-toggle",this).on("click",function(n){n.stopPropagation()}),n(".dropdown-menu",this).addClass("animated"),n("li.dropdown",this).on("mouseenter",function(){return n(".dropdown-menu",this).eq(0).removeClass(t),n(".dropdown-menu",this).eq(0).stop().fadeIn().addClass(e),n(this).addClass("on"),!1}),n(".col-menu").each(function(){n(".content",this).addClass("animated"),n(".title",this).on("mouseenter",function(){return n(this).closest(".col-menu").find(".content").stop().fadeIn().addClass(e),n(this).closest(".col-menu").addClass("on"),!1})}),n(this).on("mouseleave",function(){return n(".dropdown-menu",this).stop().removeClass(e),n(".dropdown-menu",this).stop().addClass(t).fadeOut(),n(".col-menu",this).find(".content").stop().fadeOut().removeClass(e),n(".col-menu",this).removeClass("on"),n("li.dropdown",this).removeClass("on"),!1})}):n("nav.navbar.bootsnav ul.nav").each(function(){n("a.dropdown-toggle",this).off("click"),n("a.dropdown-toggle",this).on("click",function(n){n.stopPropagation()}),n(".megamenu-fw",this).each(function(){n(".title",this).off("click"),n("a.dropdown-toggle",this).off("click"),n(".content").removeClass("animated")}),n(".dropdown-menu",this).addClass("animated"),n("li.dropdown",this).on("mouseenter",function(){return n(".dropdown-menu",this).eq(0).removeClass(t),n(".dropdown-menu",this).eq(0).stop().fadeIn().addClass(e),n(this).addClass("on"),!1}),n("li.dropdown",this).on("mouseleave",function(){n(".dropdown-menu",this).eq(0).removeClass(e),n(".dropdown-menu",this).eq(0).stop().fadeOut().addClass(t),n(this).removeClass("on")}),n(this).on("mouseleave",function(){return n(".dropdown-menu",this).removeClass(e),n(".dropdown-menu",this).eq(0).stop().fadeOut().addClass(t),n("li.dropdown",this).removeClass("on"),!1})}),n("nav.navbar.bootsnav .attr-nav").each(function(){n("a.dropdown-toggle",this).off("click"),n("a.dropdown-toggle",this).on("click",function(n){n.stopPropagation()}),n(".dropdown-menu",this).addClass("animated"),n("li.dropdown",this).on("mouseenter",function(){return n(".dropdown-menu",this).eq(0).removeClass(t),n(".dropdown-menu",this).eq(0).stop().fadeIn().addClass(e),n(this).addClass("on"),!1}),n("li.dropdown",this).on("mouseleave",function(){n(".dropdown-menu",this).eq(0).removeClass(e),n(".dropdown-menu",this).eq(0).stop().fadeOut().addClass(t),n(this).removeClass("on")}),n(this).on("mouseleave",function(){return n(".dropdown-menu",this).removeClass(e),n(".dropdown-menu",this).eq(0).stop().fadeOut().addClass(t),n("li.dropdown",this).removeClass("on"),!1})}));if(a.hasClass("navbar-full")){var l=n(window).height(),d=n(window).width();n(".nav-full").css("height",l+"px"),n(".wrap-full-menu").css("height",l+"px"),n(".wrap-full-menu").css("width",d+"px"),n(".navbar-collapse").addClass("animated"),n(".navbar-toggle").each(function(){var a=n(this).data("target");n(this).off("click"),n(this).on("click",function(o){return o.preventDefault(),n(a).removeClass(t),n(a).addClass("in"),n(a).addClass(e),!1}),n("li.close-full-menu").on("click",function(o){return o.preventDefault(),n(a).addClass(t),setTimeout(function(){n(a).removeClass("in"),n(a).removeClass(e)},500),!1})})}},navbarSticky:function(){var a=n("nav.navbar.bootsnav"),o=a.hasClass("navbar-sticky");if(o){var s=a.height();n(".wrap-sticky").height(s);var e=n(".wrap-sticky").offset().top;n(window).on("scroll",function(){var o=n(window).scrollTop();o>e?a.addClass("sticked"):a.removeClass("sticked")})}},navbarScrollspy:function(){var a=n(".navbar-scrollspy"),o=n("body"),s=n("nav.navbar.bootsnav"),e=s.outerHeight();if(a.length){o.scrollspy({target:".navbar",offset:e}),n(".scroll").on("click",function(a){a.preventDefault(),n(".scroll").removeClass("active"),n(this).addClass("active"),n(".navbar-collapse").removeClass("in"),n(".navbar-toggle").each(function(){n(".mdi",this).removeClass("mdi-close"),n(".mdi",this).addClass("mdi-menu")});var o=(n(window).scrollTop(),n(this).find("a")),e=n(o.attr("href")).offset().top,t=n(window).width(),i=s.data("minus-value-desktop"),l=s.data("minus-value-mobile"),d=s.data("speed");if(t>992)var r=e-i;else var r=e-l;n("html, body").stop().animate({scrollTop:r},d)});var t=function(){var n=o.data("bs.scrollspy");n&&(e=s.outerHeight(),n.options.offset=e,o.data("bs.scrollspy",n),o.scrollspy("refresh"))};n(window).on("resize",function(){clearTimeout(n);var n=setTimeout(t,200)})}}};n(document).ready(function(){a.initialize()}),n(window).on("resize",function(){a.hoverDropdown(),setTimeout(function(){a.navbarSticky()},500),n(".navbar-toggle").each(function(){n(".mdi",this).removeClass("mdi-close"),n(".mdi",this).addClass("mdi-menu"),n(this).removeClass("fixed")}),n(".navbar-collapse").removeClass("in"),n(".navbar-collapse").removeClass("on"),n(".navbar-collapse").removeClass("bounceIn")})}(jQuery);