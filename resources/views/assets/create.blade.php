@extends('layouts.app')

@section('content')

<div class="card shadow">
    <div class="card-header">
        <h4>Tambah Asset</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('assets.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Nama Perangkat</label>
                <input type="text" name="nama_perangkat" class="form-control">
            </div>

            <div class="mb-3">
                <label>Jenis Perangkat</label>

                <select name="jenis_perangkat" class="form-select">

                    <option value="">-- Pilih Jenis Perangkat --</option>

                    <option value="Laptop">Laptop</option>
                    <option value="PC">PC</option>
                    <option value="Printer">Printer</option>
                    <option value="Monitor">Monitor</option>
                    <option value="Router">Router</option>
                    <option value="Switch">Switch</option>
                    <option value="Access Point">Access Point</option>
                    <option value="Server">Server</option>

                </select>
            </div>

            <div class="mb-3">
                <label>Versi Perangkat</label>
                <input type="text" name="versi_perangkat" class="form-control">
            </div>

            <div class="mb-3">
                <label>Dipakai Oleh</label>
                <input type="text" name="pengguna" class="form-control">
            </div>

            <div class="mb-3">
                <label>Departemen</label>
                <input type="text" name="departemen" class="form-control">
            </div>

            <div class="mb-3">
                <label>Tanggal Beli</label>
                <input type="date" name="tanggal_beli" class="form-control">
            </div>

            <div class="mb-3">
                <label>Harga</label>

                <input type="text"
                    name="harga"
                    id="harga"
                    class="form-control"
                    placeholder="Rp 0">

            </div>

            <div class="mb-3">
                <label>Foto Asset</label>
                <input type="file" name="foto" class="form-control">
            </div>

            <button class="btn btn-primary">
                Simpan
            </button>

        </form>

    </div>
</div>

<script>

    const hargaInput = document.getElementById('harga');

    hargaInput.addEventListener('keyup', function(e) {

        let angka = this.value.replace(/[^,\d]/g, '');

        let split = angka.split(',');
        let sisa = split[0].length % 3;

        let rupiah = split[0].substr(0, sisa);
        let ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {

            let separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');

        }

        rupiah = split[1] != undefined
            ? rupiah + ',' + split[1]
            : rupiah;

        this.value = 'Rp ' + rupiah;

    });

</script>

@endsection