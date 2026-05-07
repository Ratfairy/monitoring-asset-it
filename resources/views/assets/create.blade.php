@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-gradient text-white rounded-top" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <h4 class="mb-0"><i class="fas fa-plus-circle"></i> Tambah Asset Baru</h4>
                </div>

                <div class="card-body p-5">

                    <form action="{{ route('assets.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label class="form-label fw-semibold text-dark">Nama Perangkat</label>
                            <input type="text" name="nama_perangkat" class="form-control form-control-lg border-2" placeholder="Masukkan nama perangkat" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold text-dark">Jenis Perangkat</label>
                            <select name="jenis_perangkat" class="form-select form-select-lg border-2" required>
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

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-semibold text-dark">Versi Perangkat</label>
                                <input type="text" name="versi_perangkat" class="form-control form-control-lg border-2" placeholder="Contoh: v2.1" required>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-semibold text-dark">Dipakai Oleh</label>
                                <input type="text" name="pengguna" class="form-control form-control-lg border-2" placeholder="Nama pengguna" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-semibold text-dark">Departemen</label>
                                <input type="text" name="departemen" class="form-control form-control-lg border-2" placeholder="Departemen" required>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-semibold text-dark">Tanggal Beli</label>
                                <input type="date" name="tanggal_beli" class="form-control form-control-lg border-2" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold text-dark">Harga</label>
                            <input type="text" name="harga" id="harga" class="form-control form-control-lg border-2" placeholder="Rp 0" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold text-dark">Foto Asset</label>
                            <input type="file" name="foto" class="form-control form-control-lg border-2" accept="image/*">
                        </div>

                        <div class="d-grid gap-2 pt-3">
                            <button type="submit" class="btn btn-lg rounded-lg" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; font-weight: 600;">
                                <i class="fas fa-save"></i> Simpan Asset
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
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