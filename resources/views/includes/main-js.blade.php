
<!-- js -->
<script src="{{ asset('assets/vendors/scripts/core.js') }}"></script>
<script src="{{ asset('assets/vendors/scripts/script.min.js') }}"></script>
<script src="{{ asset('assets/vendors/scripts/process.js') }}"></script>
<script src="{{ asset('assets/vendors/scripts/layout-settings.js') }}"></script>
<script src="{{ asset('assets/src/plugins/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/vendors/scripts/dashboard.js') }}"></script>

<!-- Toastr -->
<script src="{{ asset('assets/src/plugins/toastr/toastr.min.js') }}"></script>
{{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}

<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">



<script>
    document.querySelectorAll('input[type-currency="IDR"]').forEach((element) => {
  element.addEventListener('keyup', function(e) {
  let cursorPostion = this.selectionStart;
    let value = parseInt(this.value.replace(/[^,\d]/g, ''));
    let originalLenght = this.value.length;
    if (isNaN(value)) {
      this.value = "";
    } else {    
      this.value = value.toLocaleString('id-ID', {
        currency: 'IDR',
        style: 'currency',
        minimumFractionDigits: 0
      });
      cursorPostion = this.value.length - originalLenght + cursorPostion;
      this.setSelectionRange(cursorPostion, cursorPostion);
    }
  });
});
</script>

<script type="text/javascript">
  $(function() {


      $('.delete').click(function() {
          var data = $(this).attr('data-id');
          // swal({
          //         title: "Anda yakin?",
          //         text: "Anda akan menghapus data ini!",
          //         icon: "warning",
          //         buttons: true,
          //         dangerMode: true,
          //     })
          //     .then((willDelete) => {
          //         if (willDelete) {
          //             // window.location = "penyakits/delete/" + data;
          //         } else {
          //             swal("Your data is safe!");
          //         }
          //     });

  

      });

      // $(".datetimepicker").datepicker({
      //               timepicker:!0,
      //               startDate: new Date(),
      //               language:"en",
      //               autoClose:!0,
      //               dateFormat:"dd/mm/yyyy"

      //       }).on('dp.change', function (e) {  
      //           // alert('hahhahaha');
      //           console.log(e);
      //       });
      
  });
</script>


@yield('js')

@livewireScripts
