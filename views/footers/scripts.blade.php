<script src="{{ asset('bootstrap/assets/vendor/libs/jquery/jquery.js')}}"></script>
<script src="{{ asset('bootstrap/assets/vendor/libs/popper/popper.js')}}"></script>
<script src="{{ asset('bootstrap/assets/vendor/js/bootstrap.js')}}"></script>
<script src="{{ asset('bootstrap/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{ asset('bootstrap/assets/vendor/js/menu.js')}}"></script>
<script src="{{ asset('bootstrap/assets/js/main.js')}}"></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>

@include('footers.confirm')
@include('footers.delete')

<script>
    function printDiv(divId) {
      var printContents = document.getElementById(divId).innerHTML;
      var originalContents = document.body.innerHTML;

      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
      location.reload(); // optional: reload to restore full page state (if needed)
    }
  </script>


</body>
</html>
