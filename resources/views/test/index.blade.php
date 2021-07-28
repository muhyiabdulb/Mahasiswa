<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test</title>
     <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
</head>
<body>
<div class="">
    <div class="card">
        <form action="{{ route('proses') }}" method="post" id="dynamic_form">
            @csrf
            <span id="result"></span>
            
            <div class="card-body">
                <table class="table table-bordered table-striped" id="table">
                    <thead>
                        <tr>
                            <th width="80px">No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Nilai Kehadiran</th>
                            <th>Nilai Midtest</th>
                            <th>Nilai UAS</th>
                            <th>
                                <button type="button" class="btn btn-success" id="add"><i class="fa fa-plus"></i> tambah</button>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="dynamic_field">

                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">
                                <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-save"></i> Save</button>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </form>
    </div>
</div>
  <!-- jQuery -->
<script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('template/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
  <script>
      $(document).ready(function(){
        getNumberOfTr();

        $('#add').click(function(){
            let index = $('#dynamic_field tr').length
            $('#dynamic_field').append(
                `<tr class="rowComponent">
                    <input type="hidden" width="10px" name="test[${index}][id]" value="${undefined}">
                    <td class="no">
                        <input type="text" value="${index + 1}" class="form-control" disabled>
                    </td>
                   
                    <td>
                        <input type="number" name="test[${index}][nim]" class="form-control" required>
                    </td>
                    <td>
                        <input type="text" name="test[${index}][nama]" class="form-control" required>
                    </td>
                    <td>
                        <input type="number" name="test[${index}][nilaiHadir]" class="form-control" required>
                    </td>
                    <td>
                        <input type="text" name="test[${index}][nilaiMidtest]" class="form-control" required>
                    </td>
                    <td>
                        <input type="number" name="test[${index}][nilaiUas]" class="form-control" required>
                    </td>
                    <td>
                        <button type="text" name="remove" class="btn btn-danger text-white btn_remove"><i class="fa fa-trash"></i> Hapus</button>
                    </td>
                </tr>`
            );

            transactionEachColumn(index)
        });

        $(document).on('click', '.btn_remove', function() {
            let parent = $(this).parent();
            let id = parent.data('id');

            let delete_data = $("input[name='delete_data']").val();
            if(id !== 'undefined' && id !== undefined) {
                $("input[name='delete_data']").val(delete_data + ';' + id);
            }

            $('.btn_remove').eq($('.btn_remove').index(this)).parent().parent().remove();
            getNumberOfTr()
        });
        
      });

      function getNumberOfTr() {
        $('#dynamic_field tr').each(function(index, tr) {
            $(this).find("td.no input").val(index + 1)
        });
      }

  </script>
</body>
</html>