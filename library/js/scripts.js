/*
 * Scripts File
 * Author: Vic Lobins
 *
*/

/*
 * Get Viewport Dimensions
*/
function updateViewportDimensions() {
	"use strict";
	var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
	return { width:x,height:y };
}
// setting the viewport width
var viewport = updateViewportDimensions();

if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
	document.body.className += ' ' + 'is-mobile';
}

var menuButton = document.querySelector(".menu-button"),
    subMenuButton = document.querySelectorAll(".primary-nav li.menu-item-has-children"),
    expandButton = document.querySelector(".expand-acc"),
    headerEl = document.querySelector("header.header"),
    primaryNav = document.querySelector(".primary-nav"),
    subMenuLink = document.querySelectorAll(".sub-menu .menu-item"),
    captionLink = document.querySelectorAll(".ranges-wrapper .wp-caption"),
    w = window;

menuButton.addEventListener("click", function(){
    headerEl.classList.toggle("active");
});

[].forEach.call(subMenuButton, function(div) {
    div.addEventListener("click", function(){
        div.firstChild.classList.toggle("active");
    });
});

[].forEach.call(subMenuButton, function(div) {
    div.addEventListener("mouseover", function(){
        div.querySelector(".sub-menu").classList.toggle("active");
    });
});

[].forEach.call(subMenuButton, function(div) {
    div.addEventListener("mouseout", function(){
        div.querySelector(".sub-menu").classList.toggle("active");
    });
});

[].forEach.call(subMenuLink, function(div) {
    div.addEventListener("click", function(){
        var linkHref = div.firstChild.href;
        window.location.href = linkHref;
    });
});

[].forEach.call(captionLink, function(div) {
    div.addEventListener("click", function(){
        var linkHref = div.firstChild.href;
        window.location.href = linkHref;
    });
});

if( typeof(expandButton) != 'undefined' && expandButton != null ) {
    expandButton.addEventListener("click", function(){
        expandButton.classList.toggle("active");
        expandButton.nextElementSibling.classList.toggle("active");
    });
}

function menuResize(){
    viewport = updateViewportDimensions();
    var headerHeight = headerEl.offsetHeight;
    
    if( viewport.width < 1030 || /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        primaryNav.style.top = headerHeight+'px';
    } else {
        primaryNav.style.top = 'auto';
    }
}

w.onresize = function(){
    menuResize();
};

w.onload = function(){
    menuResize();
};

w.onscroll = function(){
    menuResize();
    
    if( w.scrollY >= 200 ) {
        headerEl.classList.add('scrolled');
    } else {
        headerEl.classList.remove('scrolled');
    }
};