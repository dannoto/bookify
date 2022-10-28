<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script src="<?=base_url() ?>assets/js/jquery.maskMoney.min.js"></script>
<script src="<?=base_url() ?>assets/js/jquery.min.js"></script>
<script src="<?=base_url() ?>assets/js/owl.carousel.min.js"></script>
<script>
    $(".tickets-quantity").on('click','li',function (){
                    alert($(this).text());
    });


  


    function toggleNav() {
        const nav = document.getElementById("sideNav")
        if (nav.style.width == "0px") {
          nav.style.width = "90%"
          nav.style.display = "block"
        } else {
          nav.style.width = "0px"
          nav.style.display = "none"
        }
    }

</script>


<script>

$(document).ready(function(){
  $(".owl-carousel").owlCarousel(
    {
      loop:true,
      margin:10,
      nav:false,
      dots:false,
      loop:false,

      responsive:{
          0:{
              items:2
          },
          600:{
              items:2
          },
          1000:{
              items:5
          }
      }
    }
  );
});
</script>