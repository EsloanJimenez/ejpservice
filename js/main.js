let btnMenu = document.getElementById('btnMenu');
let menu = document.getElementById('menu');

btnMenu.addEventListener('click', function() {
   'use strict';
   menu.classList.toggle('mostrar');
});


$(function() {
   var header = document.getElementById('header');

   var headroom = new Headroom(header);

   headroom.init();
});

$(".sub-menu1, .sub-sub-menu").click(function() {
   $(this).children(".sub-menu").slideToggle();
});

$("ul").click(function(p) {
   p.stopPropagation();
});
