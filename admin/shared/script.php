<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<script src="..\plugins\toaster\toastr.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<!-- Select2 -->
<script src="../bower_components/select2/dist/js/select2.full.min.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
    //Initialize Select2 Elements
    $('.select2').select2()
  
  $(window).on("load", function () {
    $(".overlays").fadeOut("slow");
  });
  setTimeout(() => {
    $("#snackbar").fadeOut();
  }, 5000);

 
    $('.bgb').wysihtml5()
  });

  $("#btnAnn").on("click", function (e) {
    e.preventDefault();

    $.ajax({
      url: "function/ann.php",
      type: "POST",
      data: $("#formAnn").serialize(),
      cache: false,
      success: function (response) {
        alert(response);
        location.reload();
      }
    })
  })

  $("#on").on("click", function (e) {
    e.preventDefault();
    var on = $("#on").attr("id");
    $.ajax({
      url: "function/on.php",
      type: "POST",
      data: {data: on},
      cache: false,
      success: function (response) {
        alert(response);
        location.reload();
      }
    })
  })

  $("#off").on("click", function (e) {
    e.preventDefault();
    var on = $("#off").attr("id");
    $.ajax({
      url: "function/off.php",
      type: "POST",
      data: {data: on},
      cache: false,
      success: function (response) {
        alert(response);
        location.reload();
      }
    })
  })


</script>