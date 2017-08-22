/* ========================================================================
 * SUPER SOCCER
 * superunknown@dividewithin.hol.es
 * ========================================================================
 * Copyright 2014 KANA CIPTA MEDIA
 * ======================================================================== */
 $(document).ready(function () {
     $('.slideout-menu-toggle').on('click', function(event){
         event.preventDefault();
         // create menu variables
         var slideoutMenu = $('.slideout-menu');
         var slideoutMenuWidth = $('.slideout-menu').width();

         // toggle open class
         slideoutMenu.toggleClass("open");

         // slide menu
         if (slideoutMenu.hasClass("open")) {
             slideoutMenu.animate({
                 right: "0px"
             });
         } else {
             slideoutMenu.animate({
                 right: -slideoutMenuWidth
             }, 250);
         }
     });
 });
