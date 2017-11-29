    function skipAnimation(){
       shapeEl = jQuery('div.morph-shape');
       shapeEl.hide();

       if(jQuery('#qdu_q').length !== 0){
         var qdu_q_logo = new Snap('#qdu_q');
         qdu_q_logo.attr({
            "stroke-dashoffset": 0,
            "fill":"#ffffff"
          });  
       }  
       jQuery('.navbar-brand svg').css('visibility', 'visible'); 

    }

    function testAnimIcon(){
       var hamburger = new Snap('.shiftnav-toggle.stretto svg');
       var pathSx = hamburger.select( '.sxPath' );
       var pathHoverSx='M 5.092 42.957 L 59.052 20.575'
       var pathResetSx = pathSx.attr( 'd' );

       var pathDx = hamburger.select( '.dxPath' );
       var pathHoverDx='M 5.092 20.819 L 59.051 44.492'
       var pathResetDx = pathDx.attr( 'd' );

       var pathCentrale =  new Snap('.centerPath');
         
       
       var pulsante = document.querySelector(".shiftnav-toggle.stretto");
       pulsante.onmouseover = function(e) {
        pathDx.animate({ d:pathHoverDx }, 300, mina.easeinout);
        pathCentrale.animate({ "opacity" : 0 }, 200, mina.easeout );
        pathSx.animate({ d:pathHoverSx }, 300, mina.easeinout);
         
       };
       pulsante.onmouseout = function(e) {
        pathDx.animate({ d:pathResetDx }, 300, mina.easeinout);
        pathCentrale.animate({ "opacity" : 1 }, 200, mina.easeout );
        pathSx.animate({ d:pathResetSx }, 300, mina.easeinout);
         
       };
       
    }

    function startAnimLogo_30(){
      //scritta_sotto_30_logo
      //barra_30_logo
      //scritta_30_logo
      //logo_30_holder
      var logo30_holder = new Snap("#logo_30_anni_svg .scritta_30_logo");
      //var scritta_30_logo = logo30_holder.select(".scritta_30_logo");
      //var bbox = scritta_30_logo.getBBox(); //bounding box, get coords and centre
      console.log(logo30_holder)
      //scritta_30_logo.animate({ transform: "r360," + bbox.cx + ',' + bbox.cy + "s3,3," + bbox.cx + "," + bbox.cy}, 1000);
      //var myMatrix = new Snap.Matrix();
      //myMatrix.translate(0,0);
      //scritta_30_logo.animate({x:0}, 300, mina.easeout );
      
      console.log("startAnimLogo_30");
    }
    
    function startAnimLogo(){
        var altezza = jQuery(".home").height();
        shapeEl = jQuery('div.morph-shape');
        //shapeEl.hide();
        jQuery(shapeEl).css('visibility', 'hidden'); 

        // RESET OPACITY LOGO
        var qdu_quasar_logo =  new Snap('#qdu_quasar_svg');
         qdu_quasar_logo.attr({
          opacity: 0
        }); 
         var qdu_design_logo =  new Snap('#qdu_design_svg');
         qdu_design_logo.attr({
          opacity: 0
        }); 
         var qdu_university_logo =  new Snap('#qdu_university_svg');
         qdu_university_logo.attr({
          opacity: 0
        });
        // RESET BARRE WIDTH
        var qdu_barra_1_logo = new Snap('#qdu_barra_1');
        var w_barra_1=  qdu_barra_1_logo.attr( 'width' );
        qdu_barra_1_logo.attr({
          width: 0
        });         
        var qdu_barra_2_logo = new Snap('#qdu_barra_2');
        var w_barra_2=  qdu_barra_2_logo.attr( 'width' );
        qdu_barra_2_logo.attr({
          width: 0
        }); 
        // RESET BARRA SOTTO Q
        var qdu_barra_q_logo = new Snap('#qdu_barra_q');
        var w_barra_q=  qdu_barra_q_logo.attr( 'width' );
        qdu_barra_q_logo.transform( 'r180' ); 
        qdu_barra_q_logo.attr({
          width: 0
        });  
        
        //shapeEl.show();
        jQuery(shapeEl).css('visibility', 'visible'); 
        jQuery('.navbar-brand svg').show();
        jQuery('.navbar-brand svg').css('visibility', 'visible');


        

        // COMPARSA SCRITTE
        setTimeout(function () {
          qdu_quasar_logo.animate({ "opacity" : 1 }, 500, mina.easeout );
        }, 100);
        setTimeout(function () {
          qdu_design_logo.animate({ "opacity" : 1 }, 500, mina.easeout );
        }, 400);
        setTimeout(function () {
          qdu_university_logo.animate({ "opacity" : 1 }, 500, mina.easeout );
        }, 700);
        
        // ANIMAZIONI BARRE
        setTimeout(function () {
           qdu_barra_1_logo.animate({ width : w_barra_1 }, 500, mina.easeinout );       
        }, 1200);
        setTimeout(function () {
          qdu_barra_2_logo.animate({ width : w_barra_2 }, 500, mina.easeinout );
        }, 1200);
        
        // DRAWING Q LOGO
        var qdu_q_logo = new Snap('#qdu_q');
        qdu_q_logo.animate({ "stroke-dashoffset" : 0 }, 2000, mina.easeout );
        // CAMBIO COLORE Q
        setTimeout(function () {
          qdu_q_logo.animate({ "fill" : "#ffffff" }, 500, mina.easeinout );
        }, 1400);
        // ANIMAZIONE BARRA Q
        setTimeout(function () {
          qdu_barra_q_logo.animate({ width : w_barra_q }, 500, mina.easeinout );
        }, 1200);

        // ANIMAZIONE MASCHERA CONTENUTI
        var s = new Snap('div.morph-shape svg');
        var pathEl = s.select( 'path' );
        //console.log("shapeEl "+shapeEl);
        var morph_1 = shapeEl.attr( 'data-morph-1' );
        var morph_2 = shapeEl.attr( 'data-morph-2' );
        var morph_3 = shapeEl.attr( 'data-morph-3' );
        var pathReset = pathEl.attr( 'd' );

        /*
        var logo30_holder = new Snap("#logo_30_anni_svg .barra_30_logo");
        logo30_holder.animate({
            x: 150,
            y: 50,
            width:"30"
        }, 1000);
        */
 
        
        function nascondoSvg(){
                  startAnimLogo_30();
                  jQuery('div.morph-shape').hide();
                  Cookies.set('show_intro', 'false', { expires: 600 });
        }

        function fase_2(){
          pathEl.animate({ d:morph_2 }, 800, mina.easeout,nascondoSvg);
          console.log("fase_2");
        }
        function fase_3(){
            //pathEl.animate({ d:morph_3 }, 500, mina.easeout,nascondoSvg);
            console.log("fase_3");
        }
        

        // ANIMAZIONE MASCHERA CONTENUTI
        setTimeout(function () {
            pathEl.animate({ d:morph_1 }, 500, mina.easeinout, fase_2);
          }, 1800);
        
      }
        