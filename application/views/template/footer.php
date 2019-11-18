 <!-- Optional JavaScript -->
 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"
 	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
 	integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
 </script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
 	integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
 </script>
 <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"> </script>
 <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>


 <script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>


 </body>
 <script>
 	$(function () {
 		$(document).on('click', ".mahasiswa-edit", function () {
 			var nik = $(this).data('nik'),
 				nama = $(this).data('nama'),
 				alamat = $(this).data('alamat')
 			$('#nik').val(nik)
 			$('#nama').val(nama)
 			$('#alamat').val(alamat)
 		})
 		$(document).on('click', ".spp-edit", function () {
 			var nik = $(this).data('nik'),
 				id = $(this).data('id'),
 				tgl = $(this).data('tgl'),
 				total = $(this).data('total'),
 				cek = $('#nik option')
 			$('#nik').val(nik)
 			$('#tgl').val(tgl)
 			$('#total').val(total)
 			$('#id').val(id)
 			cek.map(function () {
 				var sel = $(this).val();

 				if (nik == sel)
 					$(sel).attr('selected', true)
 			})
 		})
 		$('#tabless').DataTable({
 			dom: 'Bfrtip',
 			buttons: [
 				'excel'
 			]
 		});
 	})

 </script>

 </html>
