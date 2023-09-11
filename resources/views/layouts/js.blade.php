  <!-- JavaScript files-->
  <script src="/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/dashboard/vendor/just-validate/js/just-validate.min.js"></script>
    <script src="/dashboard/vendor/chart.js/Chart.min.js"></script>
    <script src="/dashboard/vendor/choices.js/public/assets/scripts/choices.min.js"></script>
    <script src="/dashboard/js/charts-home.js"></script>
    <!-- Main File-->
    <script src="/dashboard/js/front.js"></script>

     <!--Owl Carousel files-->
     <script src="/dashboard/js/charts-home.js"></script>
    <!--Sweet Alert-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if(session('status'))
      <script>
        swal("{{ session('status') }}");
      </script>
    @endif()

    <script>
      // ------------------------------------------------------- //
      //   Inject SVG Sprite - 
      //   see more here 
      //   https://css-tricks.com/ajaxing-svg-sprite/
      // ------------------------------------------------------ //
      function injectSvgSprite(path) {
      
          var ajax = new XMLHttpRequest();
          ajax.open("GET", path, true);
          ajax.send();
          ajax.onload = function(e) {
          var div = document.createElement("div");
          div.className = 'd-none';
          div.innerHTML = ajax.responseText;
          document.body.insertBefore(div, document.body.childNodes[0]);
          }
      }
      // this is set to BootstrapTemple website as you cannot 
      // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
      // while using file:// protocol
      // pls don't forget to change to your domain :)
      injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg'); 
    </script>

   
    <!-- inject:js -->
    <script src="/dashboard/tabledesign/assets/js/off-canvas.js"></script>
    <script src="/dashboard/tabledesign/assets/js/hoverable-collapse.js"></script>
    <script src="/dashboard/tabledesign/assets/js/misc.js"></script>


    <!-- Script function to view very picture in full screen mode(ex:in OwnerApprovalAction & EmailView) -->
    <script>
    var modal = document.getElementById('myModal');
    var span = document.getElementsByClassName("imageclose")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() { 
    modal.style.display = "none";
    }

    // Get all images and insert the clicked image inside the modal
    // Get the content of the image description and insert it inside the modal image caption
    var images = document.getElementsByTagName('img');
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("image-caption");
    var i;
    for (i = 0; i < images.length; i++) {
      images[i].onclick = function(){
          modal.style.display = "block";
          modalImg.src = this.src;
          modalImg.alt = this.alt;
          captionText.innerHTML = this.nextElementSibling.innerHTML;
      }
    }
</script>

   
 
 <!-- old file -->
 <!-- JavaScript files-->
 <!-- <script src="/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/dashboard/vendor/chart.js/Chart.min.js"></script>
    <script src="/dashboard/vendor/just-validate/js/just-validate.min.js"></script>
    <script src="/dashboard/vendor/choices.js/public/assets/scripts/choices.min.js"></script>
    <script src="/dashboard/js/charts-home.js"></script> -->
    
    <!-- Main File-->
    <!-- <script src="/dashboard/js/jquery-3.6.1.min.js"></script>
    <script src="/dashboard/js/owl.carousel.min.js"></script>
    <script src="/dashboard/js/front.js"></script>
    -->
    
 <!-- Owl Carousel-->
    <script>
      $('.featured-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        dots:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
                // items:3
            }
        }
      })
    </script>


<!-- //owner -->
<!-- <script src="/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/dashboard/vendor/chart.js/Chart.min.js"></script>
    <script src="/dashboard/vendor/just-validate/js/just-validate.min.js"></script>
    <script src="/dashboard/vendor/choices.js/public/assets/scripts/choices.min.js"></script>
    <script src="/dashboard/js/charts-home.js"></script>
   
    <script src="/dashboard/js/front.js"></script>
    <script>
     
      function injectSvgSprite(path) {
      
          var ajax = new XMLHttpRequest();
          ajax.open("GET", path, true);
          ajax.send();
          ajax.onload = function(e) {
          var div = document.createElement("div");
          div.className = 'd-none';
          div.innerHTML = ajax.responseText;
          document.body.insertBefore(div, document.body.childNodes[0]);
          }
      }
      
      injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg'); 
      
      
    </script> -->


<!-- admin -->

<!-- <script src="/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/dashboard/vendor/chart.js/Chart.min.js"></script>
    <script src="/dashboard/vendor/just-validate/js/just-validate.min.js"></script>
    <script src="/dashboard/vendor/choices.js/public/assets/scripts/choices.min.js"></script>
    <script src="/dashboard/js/charts-home.js"></script>

    <script src="/dashboard/js/front.js"></script>
    <script>
      function injectSvgSprite(path) {
      
          var ajax = new XMLHttpRequest();
          ajax.open("GET", path, true);
          ajax.send();
          ajax.onload = function(e) {
          var div = document.createElement("div");
          div.className = 'd-none';
          div.innerHTML = ajax.responseText;
          document.body.insertBefore(div, document.body.childNodes[0]);
          }
      }
      
      injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg'); 
      
      
    </script> -->