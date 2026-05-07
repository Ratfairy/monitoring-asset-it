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
        width: 100%;
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

    .file-input-wrapper {
        position: relative;
    }

    .file-input-wrapper input[type="file"] {
        cursor: pointer;
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
                    <h4 class="mb-0"><i class="fas fa-plus-circle me-2"></i>Tambah Asset Baru</h4>
                </div>

                <div class="card-body p-5">
                    <form action="{{ route('assets.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group-wrapper">
                            <label class="form-label">Nama Perangkat</label>
                            <input type="text" name="nama_perangkat" class="form-control" placeholder="Masukkan nama perangkat" required>
                        </div>

                        <div class="form-group-wrapper">
                            <label class="form-label">Jenis Perangkat</label>
                            <select name="jenis_perangkat" class="form-select" required>
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

                        <div class="form-row-grid">
                            <div class="form-group-wrapper">
                                <label class="form-label">Versi Perangkat</label>
                                <input type="text" name="versi_perangkat" class="form-control" placeholder="Contoh: v2.1" required>
                            </div>

                            <div class="form-group-wrapper">
                                <label class="form-label">Dipakai Oleh</label>
                                <input type="text" name="pengguna" class="form-control" placeholder="Nama pengguna" required>
                            </div>
                        </div>

                        <div class="form-row-grid">
                            <div class="form-group-wrapper">
                                <label class="form-label">Departemen</label>
                                <select name="departemen" class="form-select" required>
                                    <option value="">-- Pilih Departemen --</option>
                                    <option value="Produksi">Produksi</option>
                                    <option value="Quality">Quality</option>
                                    <option value="Design">Design</option>
                                    <option value="Marketing">Marketing</option>
                                    <option value="Purchasing">Purchasing</option>
                                    <option value="Finance">Finance</option>
                                </select>
                            </div>

                            <div class="form-group-wrapper">
                                <label class="form-label">Tanggal Beli</label>
                                <input type="date" name="tanggal_beli" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group-wrapper">
                            <label class="form-label">Harga</label>
                            <input type="text" name="harga" id="harga" class="form-control" placeholder="Rp 0" required>
                        </div>

                        <div class="form-group-wrapper file-input-wrapper">
                            <label class="form-label">Foto Asset</label>
                            <input type="file" name="foto" class="form-control" accept="image/*">
                        </div>

                        <button type="submit" class="submit-btn">
                            <i class="fas fa-save me-2"></i>Simpan Asset
                        </button>
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