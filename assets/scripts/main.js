/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    'allButHome':{
      init: function() {
        // JavaScript to be fired on all pages
        //var draw = SVG('#qdu_barra_2')
        //draw.animate().move(100, 100)
         console.log("not show_intro not home");
         skipAnimation();
        //startAnimLogo();
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
        //var draw = SVG('#qdu_barra_2')
        //draw.animate().move(100, 100)
       
         
        //var hWrap = jQuery(."wrap.container-fluid.holder_A").height;
        //var hNavInner = jQuery(".navbar-vertical-layout").height;      
        //var eTop = jQuery('.navbar-footer-inner').offset().top; //get the offset top of the element
        //console.log("eTop "+eTop)

        document.addEventListener('scroll', function (event) {
                esiteWrapB = jQuery(".wrap.container-fluid.holder_B").height();
                if(esiteWrapB==0){
                  if($(window).scrollTop() + $(window).height() == $(document).height()) {
                      // alert("bottom!");
                      jQuery('.navbar-footer-inner').css({'bottom' : 35 + 'px'}); 
                   }else{
                       jQuery('.navbar-footer-inner').css({'bottom' : 0 + 'px'});  
                   }
                }else{
                  jQuery('.navbar-footer-inner').css({'position' : 'absolute'});
                  jQuery('.navbar-footer-inner').css({'bottom' : '0px'});
                }
        }, true /*Capture event*/);
         console.log("commonaa");
        
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },

    // Home page
    'home': {
      init: function() {
        console.log("home")
        /*

        var cookie_anim_logo= Cookies.get('show_intro');
        if(cookie_anim_logo!=="false" || !cookie_anim_logo  ){
          console.log("show_intro "+cookie_anim_logo);
          startAnimLogo();
        }else{
          console.log("not show_intro "+cookie_anim_logo);
         // skipAnimation();
          startAnimLogo();
        }

        */
        skipAnimation();
         testAnimIcon();
          verticalLayout_init(); 
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    'vertical_layout':{
      init: function() {
          console.log("vertical_layout");
          testAnimIcon();
          verticalLayout_init();  
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    'archive_docenti':{
      init: function() {
          console.log("archive_docenti");
          [].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {  
          new SelectFx(el);
          } );

          jQuery("body").on("change", "#filterCourses", function(e){
          console.log("filterCourses change");
          var val = jQuery(this).find(":selected").val();
          jQuery('.singleDocentList').fadeOut();
          jQuery("."+val).fadeIn().delay(500); 

          jQuery('.cs-select ul').scroll(function(e){
              e.stopPropagation();
          })
          
        });
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    'single_progetti_studenti': {
      init: function() {
        console.log("single_progetti_studenti");
         jQuery('.flexslider').flexslider({
           animation: "slide",
           prevText: "",
           nextText: "",
           controlNav: false
           //controlsContainer: jQuery(".custom-controls-container"),
           //customDirectionNav: jQuery(".custom-navigation a")
        });
        // JavaScript to be fired on the about us page
      }
    },
    'single_storie_di_successo': {
      init: function() {
        console.log("storie_di_succss");
         jQuery('.flexslider').flexslider({
           animation: "slide",
           prevText: "",
           nextText: "",
           controlNav: false
           //controlsContainer: jQuery(".custom-controls-container"),
           //customDirectionNav: jQuery(".custom-navigation a")
        });
        // JavaScript to be fired on the about us page
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    },
    // About us page, note the change from about-us to about_us.
    'single': {
      init: function() {
        console.log("singleee");
        // JavaScript to be fired on the about us page
      }
    },
    // About us page, note the change from about-us to about_us.
    'vertical_layout_alt': {
      init: function() {
        console.log("vertical_layout_alt");

        //.page-template-template-vertical-layout-alt navbar-brand
        //.page-template-template-vertical-layout-alt wrapper-vertical-header-inner nav
        //415
          var height = window.innerHeight;
          console.log("resizeVertical "+height);
          var marginTop= (height-315)/2
          //marginTop = marginTop-20;
          // jQuery('.page-template-template-vertical-layout-alt .navbar-brand').css("margin-top",marginTop  )
           jQuery('.page-template-template-vertical-layout-alt .wrapper-vertical-header-inner nav').css("margin-top",marginTop  )
              
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
