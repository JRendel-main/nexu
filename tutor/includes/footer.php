                    <!-- Bootstrap core JavaScript-->

<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../js/sb-admin-2.min.js"></script>
<script>
// Add the following script to enable searchable dropdown
$(document).ready(function() {
  $('.dropdown-menu .dropdown-item').click(function() {
    var selectedCourse = $(this).text();
    $('#exampleFormControlSelect1').val(selectedCourse);
  });
});
</script>

</body>

</html>