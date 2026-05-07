@extends('layouts.app')

@section('content')

<style>
    .modern-form-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 2.5rem;
        border-radius: 12px 12px 0 0;
        position: relative;
        overflow: hidden;
    }

    .modern-form-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 300px;
        height: 300px;
        background: rgba(255,255,255,0.1);
        border-radius: 50%;
    }

    .modern-form-header h4 {
        position: relative;
        z-index: 1;
        font-size: 1.8rem;
        font-weight: 700;
    }

    .modern-card {
        border: none;
        box-shadow: 0 10px 40px rgba(102, 126, 234, 0.15);
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .modern-card:hover {
        box-shadow: 0 15px 50px rgba(102, 126, 234, 0.25);
    }

    .form-group-wrapper {
        margin-bottom: 1.8rem;
    }

    .form-label {
        font-size: 0.95rem;
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 0.6rem;
        display: block;
    }

    .form-control, .form-select {
        border: 1.5px solid #e2e8f0;
        border-radius: 8px;
        padding: 0.75rem 1rem;
        font-size: 1rem;
        transition: all 0.3s ease;
        background-color: #f8fafc;
    }

    .form-control:focus, .form-select:focus {
        border-color: #667eea;
        background-color: white;
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        outline: none;
    }

    .form-control::placeholder {
        color: #a0aec0;
    }

    .form-row-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
    }

    .submit-btn {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        padding: 1rem 2rem;
        font-size: 1.05rem;
        font-weight: 600;
        border-radius: 8px;
        transition: all 0.3s ease;
        margin-top: 1.5rem;
        cursor: pointer;
        box-shadow: 0 5px 20px rgba(102, 126, 234, 0.3);
    }

    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 30px rgba(102, 126, 234, 0.4);
    }

    .submit-btn:active {
        transform: translateY(0);
    }

    .peminjaman-alert {
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.05) 100%);
        border: 1.5px solid #667eea;
        border-radius: 8px;
        padding: 1.8rem;
        margin-bottom: 1.8rem;
    }

    .peminjaman-alert h6 {
        color: #667eea;
        font-weight: 600;
        margin-bottom: 1.2rem;
    }

    @media (max-width: 768px) {
        .modern-form-header {
            padding: 1.5rem;
        }

        .modern-form-header h4 {
            font-size: 1.4rem;
        }

        .form-row-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="modern-card">
                <div class="modern-form-header">
                    <h4 class="mb-0"><i class="fas fa-edit me-2"></i>Edit Data Perangkat</h4>
                </div>

                <div class="card-body p-5">
                    <form action="{{ route('assets.update', $asset->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Row 1: Nama dan Jenis Perangkat -->
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-dark mb-2">
                                    <i class="fas fa-tag text-primary me-2"></i>Nama Perangkat
                                </label>
                                <input type="text"
                                       name="nama_perangkat"
                                       class="form-control form-control-lg rounded-3 border-light shadow-sm"
                                       placeholder="Masukkan nama perangkat"
                                       value="{{ $asset->nama_perangkat }}"
                                       style="background-color: #f8f9fa; border-color: #e9ecef !important;">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-dark mb-2">
                                    <i class="fas fa-laptop text-primary me-2"></i>Jenis Perangkat
                                </label>
                                <select name="jenis_perangkat" class="form-select form-select-lg rounded-3 shadow-sm" style="background-color: #f8f9fa; border-color: #e9ecef !important;">
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

                        <!-- Row 2: Versi dan Pengguna -->
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-dark mb-2">
                                    <i class="fas fa-code-branch text-primary me-2"></i>Versi
                                </label>
                                <input type="text"
                                       name="versi_perangkat"
                                       class="form-control form-control-lg rounded-3 shadow-sm"
                                       placeholder="Masukkan versi"
                                       value="{{ $asset->versi_perangkat }}"
                                       style="background-color: #f8f9fa; border-color: #e9ecef !important;">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-dark mb-2">
                                    <i class="fas fa-user text-primary me-2"></i>Pengguna
                                </label>
                                <input type="text"
                                       name="pengguna"
                                       class="form-control form-control-lg rounded-3 shadow-sm"
                                       placeholder="Masukkan nama pengguna"
                                       value="{{ $asset->pengguna }}"
                                       style="background-color: #f8f9fa; border-color: #e9ecef !important;">
                            </div>
                        </div>

                        <div class="row g-3 mb-4">

                            <div class="col-md-6">

                                <label>Departemen</label>

                                <select name="departemen" class="form-select">

                                    <option value="">-- Pilih Departemen --</option>

                                    <option value="Produksi"
                                        {{ $asset->departemen == 'Produksi' ? 'selected' : '' }}>
                                        Produksi
                                    </option>

                                    <option value="Quality"
                                        {{ $asset->departemen == 'Quality' ? 'selected' : '' }}>
                                        Quality
                                    </option>

                                    <option value="Design"
                                        {{ $asset->departemen == 'Design' ? 'selected' : '' }}>
                                        Design
                                    </option>

                                    <option value="Marketing"
                                        {{ $asset->departemen == 'Marketing' ? 'selected' : '' }}>
                                        Marketing
                                    </option>

                                    <option value="Purchasing"
                                        {{ $asset->departemen == 'Purchasing' ? 'selected' : '' }}>
                                        Purchasing
                                    </option>

                                    <option value="Finance"
                                        {{ $asset->departemen == 'Finance' ? 'selected' : '' }}>
                                        Finance
                                    </option>

                                </select>

                            </div>

                            <div class="col-md-6">

                                <label class="form-label fw-semibold text-dark mb-2">
                                    <i class="fas fa-calendar text-primary me-2"></i>Tanggal Beli
                                </label>

                                <input type="date"
                                    name="tanggal_beli"
                                    class="form-control form-control-lg rounded-3 shadow-sm"
                                    value="{{ $asset->tanggal_beli }}"
                                    style="background-color: #f8f9fa; border-color: #e9ecef !important;">

                            </div>


                        <!-- Row 4: Harga dan Status -->
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-dark mb-2">
                                    <i class="fas fa-money-bill-wave text-primary me-2"></i>Harga
                                </label>
                                <input type="text"
                                    name="harga"
                                    id="harga"
                                    class="form-control form-control-lg rounded-3 shadow-sm"
                                    placeholder="Rp 0"
                                    value="Rp {{ number_format($asset->harga, 0, ',', '.') }}"
                                    style="background-color: #f8f9fa; border-color: #e9ecef !important;">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-dark mb-2">
                                    <i class="fas fa-info-circle text-primary me-2"></i>Status Asset
                                </label>
                                <select name="status" id="status" class="form-select form-select-lg rounded-3 shadow-sm" style="background-color: #f8f9fa; border-color: #e9ecef !important;">
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

                        <!-- Peminjaman Fields (Conditional) -->
                        <div id="peminjaman-fields"
                            style="{{ $asset->status == 'Dipinjam' ? '' : 'display:none;' }}"
                            class="alert alert-info rounded-3 p-4 mb-4" role="alert">
                            <h6 class="alert-heading fw-bold mb-3">
                                <i class="fas fa-hand-holding text-info me-2"></i>Informasi Peminjaman
                            </h6>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold text-dark mb-2">Dipinjam Ke</label>
                                    <input type="text"
                                        name="dipinjam_ke"
                                        class="form-control form-control-lg rounded-3 shadow-sm"
                                        placeholder="Nama peminjam"
                                        value="{{ $asset->dipinjam_ke }}"
                                        style="background-color: #fff; border-color: #e9ecef !important;">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold text-dark mb-2">Tanggal Pinjam</label>
                                    <input type="date"
                                        name="tanggal_pinjam"
                                        class="form-control form-control-lg rounded-3 shadow-sm"
                                        value="{{ $asset->tanggal_pinjam }}"
                                        style="background-color: #fff; border-color: #e9ecef !important;">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold text-dark mb-2">Tanggal Kembali</label>
                                    <input type="date"
                                        name="tanggal_kembali"
                                        class="form-control form-control-lg rounded-3 shadow-sm"
                                        value="{{ $asset->tanggal_kembali }}"
                                        style="background-color: #fff; border-color: #e9ecef !important;">
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex gap-3 mt-5 pt-3 border-top">
                            <button type="submit" class="btn btn-primary btn-lg rounded-3 px-5 fw-semibold shadow-sm" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none;">
                                <i class="fas fa-save me-2"></i>Update Asset
                            </button>
                            <a href="{{ route('assets.index') }}" class="btn btn-outline-secondary btn-lg rounded-3 px-5 fw-semibold">
                                <i class="fas fa-times me-2"></i>Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    const hargaInput = document.getElementById('harga');
    const status = document.getElementById('status');


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

    const peminjamanFields =
        document.getElementById('peminjaman-fields');

    function togglePeminjaman() {

        if(status.value === 'Dipinjam') {

            peminjamanFields.style.display = 'block';

        } else {

            peminjamanFields.style.display = 'none';

        }

    }

    status.addEventListener('change', togglePeminjaman);

    togglePeminjaman();

</script>

@endsection