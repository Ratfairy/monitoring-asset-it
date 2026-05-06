@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-gradient bg-primary text-white rounded-top-4 py-4">
            <h4 class="mb-0 fw-bold">
                <i class="fas fa-edit me-2"></i>Edit Asset
            </h4>
        </div>

        <div class="card-body p-5">
            <form action="{{ route('assets.update', $asset->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-dark">Nama Perangkat</label>
                            <input type="text"
                                   name="nama_perangkat"
                                   class="form-control form-control-lg rounded-3 border-2"
                                   placeholder="Masukkan nama perangkat"
                                   value="{{ $asset->nama_perangkat }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-dark">Jenis Perangkat</label>
                            <select name="jenis_perangkat" class="form-select form-select-lg rounded-3 border-2">
                                <option value="">-- Pilih Jenis Perangkat --</option>
                                <option value="Laptop" {{ $asset->jenis_perangkat == 'Laptop' ? 'selected' : '' }}>Laptop</option>
                                <option value="PC" {{ $asset->jenis_perangkat == 'PC' ? 'selected' : '' }}>PC</option>
                                <option value="Printer" {{ $asset->jenis_perangkat == 'Printer' ? 'selected' : '' }}>Printer</option>
                                <option value="Monitor" {{ $asset->jenis_perangkat == 'Monitor' ? 'selected' : '' }}>Monitor</option>
                                <option value="Router" {{ $asset->jenis_perangkat == 'Router' ? 'selected' : '' }}>Router</option>
                                <option value="Switch" {{ $asset->jenis_perangkat == 'Switch' ? 'selected' : '' }}>Switch</option>
                                <option value="Access Point" {{ $asset->jenis_perangkat == 'Access Point' ? 'selected' : '' }}>Access Point</option>
                                <option value="Server" {{ $asset->jenis_perangkat == 'Server' ? 'selected' : '' }}>Server</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-dark">Versi</label>
                            <input type="text"
                                   name="versi_perangkat"
                                   class="form-control form-control-lg rounded-3 border-2"
                                   placeholder="Masukkan versi"
                                   value="{{ $asset->versi_perangkat }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-dark">Pengguna</label>
                            <input type="text"
                                   name="pengguna"
                                   class="form-control form-control-lg rounded-3 border-2"
                                   placeholder="Masukkan nama pengguna"
                                   value="{{ $asset->pengguna }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-dark">Departemen</label>
                            <input type="text"
                                   name="departemen"
                                   class="form-control form-control-lg rounded-3 border-2"
                                   placeholder="Masukkan departemen"
                                   value="{{ $asset->departemen }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-dark">Tanggal Beli</label>
                            <input type="date"
                                   name="tanggal_beli"
                                   class="form-control form-control-lg rounded-3 border-2"
                                   value="{{ $asset->tanggal_beli }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-dark">Harga</label>
                            <input type="text"
                                name="harga"
                                id="harga"
                                class="form-control form-control-lg rounded-3 border-2"
                                placeholder="Rp 0"
                                value="Rp {{ number_format($asset->harga, 0, ',', '.') }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-dark">Status Asset</label>
                            <select name="status" class="form-select form-select-lg rounded-3 border-2">
                                <option value="Active" {{ $asset->status == 'Active' ? 'selected' : '' }}>
                                    Active
                                </option>
                                <option value="Maintenance" {{ $asset->status == 'Maintenance' ? 'selected' : '' }}>
                                    Maintenance
                                </option>
                                <option value="Rusak" {{ $asset->status == 'Rusak' ? 'selected' : '' }}>
                                    Rusak
                                </option>
                                <option value="Dipinjam" {{ $asset->status == 'Dipinjam' ? 'selected' : '' }}>
                                    Dipinjam
                                </option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="d-flex gap-2 mt-5">
                    <button type="submit" class="btn btn-primary btn-lg rounded-3 px-5 fw-semibold">
                        <i class="fas fa-save me-2"></i>Update Asset
                    </button>
                    <a href="{{ route('assets.index') }}" class="btn btn-secondary btn-lg rounded-3 px-5 fw-semibold">
                        <i class="fas fa-times me-2"></i>Batal
                    </a>
                </div>
            </form>
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