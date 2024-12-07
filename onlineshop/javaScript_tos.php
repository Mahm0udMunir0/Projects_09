<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/toastr.css">
    <title></title>
</head>
<body>
   
<script src="./js/jquery-3.7.1.min.js"></script>
  <script src="./js/toastr.min.js"></script>
  <script>
      function addSucces(){
        toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
      } 
  </script>
  <script src="./js/feather.min.js"></script>
  <script>feather.replace();
</script>
</body>
</html>