@extends('admin.layout')
@section('judul')
    TICKETING | ADMIN
@endsection
@section('tujuan')
    active
@endsection
@section('content')
<style>
.modal-backdrop{
    z-index: -1;
}
</style>
<link rel="stylesheet" href="{{ asset('datatables/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('datatables/datatables.min.css') }}">
<script src="{{ asset('datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('datatables/datatables.min.js') }}"></script>
<script src="{{ asset('datatables/dataTables.select.min.js') }}"></script>
<div class="section-body">
    <div class="row hariKerja">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Form Kota Tujuan</h4>
                </div>
                <div class="card-body">
                    <button class="btn btn-primary mb-2" id="tambah" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-plus"></i>
                        Tambah Kota Tujuan
                    </button>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Kota Tujuan</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0 ?>
                                @foreach($kota as $b)
                                <?php $i++?>
                                    <tr>
                                        <td>
                                            {{ $i }}
                                        </td>
                                        <td>
                                            {{ $b->kota_tujuan }}
                                        </td>
                                        <td>
                                            <a id="edit" class=" edit btn text-white btn-primary" data-kota="{{ $b->kota_tujuan }}" data-id="{{ $b->id }}"><i class="fa fa-edit"></i> Edit</a>
                                            <a href="kota-tujuan/hapus/{{ $b->id }}" class="hapus btn text-white btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"><i class="fa fa-trash"></i> Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Bis</h5>
            </div>
            <form action="admin/kota-tujuan/post" method="post">
                <div class="modal-body">
                {{csrf_field()}}
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="kota">Kota Tujuan : </label>
                        <input required type="text" name="kota" id="kota" class="form-control">
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('.table').dataTable();
    $('#tambah').click(function () {
        $('#id').val(" ");
        $('#kota').val(" ");
    })
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
    $('.edit').click(function () {
        $('#id').val($(this).data('id'));
        $('#kota').val($(this).data('kota'));
        $('#exampleModal').modal(true);
    })
</script>
@endsection