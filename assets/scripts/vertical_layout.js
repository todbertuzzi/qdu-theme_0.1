function verticalLayout_init(){
  console.log("daie");
  window.addEventListener('resize', resizeVertical, true);
  var hamburger = new Snap('.shiftnav-toggle.stretto svg');
      
  function resizeVertical(){
    var width = window.innerWidth
    console.log("resizeVertical "+width);
    if(width<1024){
      jQuery('.navbar-vertical-layout').addClass("navbar-expand-md")
      //hamburger.transform( 'r90' ); 
    }else{
      jQuery('.navbar-vertical-layout').removeClass("navbar-expand-md")
      //hamburger.transform( 'r90' ); 
    }
  }

  resizeVertical();
}

