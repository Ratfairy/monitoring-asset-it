<!DOCTYPE html>
<html>
<head>
    <title>Informasi Asset</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f6fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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

        .modern-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2.5rem;
            position: relative;
            overflow: hidden;
        }

        .modern-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .modern-header h2 {
            position: relative;
            z-index: 1;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.3rem;
        }

        .asset-subheader {
            position: relative;
            z-index: 1;
            color: rgba(255, 255, 255, 0.85);
            font-size: 0.95rem;
        }

        .detail-badge {
            font-size: 0.9rem;
            padding: 0.6rem 0.95rem;
            border-radius: 999px;
        }

        .asset-info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .info-box {
            background: #f8fafc;
            border: 1.5px solid #e2e8f0;
            border-radius: 12px;
            padding: 1.2rem;
            transition: all 0.3s ease;
        }

        .info-box:hover {
            border-color: #667eea;
            background: #f0f4ff;
        }

        .info-label {
            color: #6b7280;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.4rem;
        }

        .info-value {
            color: #1f2937;
            font-size: 1.05rem;
            font-weight: 600;
        }

        .detail-table {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 2px solid #f0f4f8;
        }

        .detail-table .row {
            margin-bottom: 1.2rem;
        }

        .detail-table .detail-label {
            color: #6b7280;
            font-size: 0.95rem;
            font-weight: 600;
        }

        .detail-table .detail-value {
            color: #1f2937;
            font-size: 1rem;
            font-weight: 500;
        }

        .asset-image {
            text-align: center;
        }

        .asset-image img {
            max-width: 100%;
            height: auto;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.15);
            transition: transform 0.3s ease;
            margin-bottom: 1.5rem;
        }

        .asset-image img:hover {
            transform: scale(1.05);
        }

        .no-image-placeholder {
            width: 100%;
            height: 280px;
            background: linear-gradient(135deg, #f0f4f8 0%, #e8eef7 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #9ca3af;
            font-size: 1rem;
            margin-bottom: 1.5rem;
        }

        .page-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 2rem 0;
        }

        @media (max-width: 768px) {
            .modern-header {
                padding: 1.5rem;
            }

            .modern-header h2 {
                font-size: 1.5rem;
            }

            .asset-info-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .page-container {
                padding: 1rem 0;
            }
        }
    </style>
</head>

<body>

<div class="page-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="modern-card">
                    <div class="modern-header">
                        <h2><i class="fas fa-microchip me-2"></i>{{ $asset->nama_perangkat }}</h2>
                        <p class="asset-subheader mb-0"><i class="fas fa-barcode me-1"></i>Kode: {{ $asset->kode_asset }}</p>
                    </div>

                    <div class="card-body p-5">
                        <div class="row g-4">
                            <div class="col-lg-4">
                                <div class="asset-image">
                                    @if($asset->foto)
                                        <img src="{{ asset('storage/' . $asset->foto) }}" alt="Foto Asset">
                                    @else
                                        <div class="no-image-placeholder">
                                            <div>
                                                <i class="fas fa-image" style="font-size: 3rem; opacity: 0.3;"></i>
                                                <p class="mt-2 mb-0">Tidak ada foto</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-8">
                                <div class="asset-info-grid">
                                    <div class="info-box">
                                        <div class="info-label"><i class="fas fa-tag me-1" style="color: #667eea;"></i>Jenis Perangkat</div>
                                        <div class="info-value">{{ $asset->jenis_perangkat }}</div>
                                    </div>

                                    <div class="info-box">
                                        <div class="info-label"><i class="fas fa-box me-1" style="color: #667eea;"></i>Versi</div>
                                        <div class="info-value">{{ $asset->versi_perangkat }}</div>
                                    </div>

                                    <div class="info-box">
                                        <div class="info-label"><i class="fas fa-user me-1" style="color: #667eea;"></i>Pengguna</div>
                                        <div class="info-value">{{ $asset->pengguna }}</div>
                                    </div>

                                    <div class="info-box">
                                        <div class="info-label"><i class="fas fa-building me-1" style="color: #667eea;"></i>Departemen</div>
                                        <div class="info-value">{{ $asset->departemen }}</div>
                                    </div>

                                    <div class="info-box">
                                        <div class="info-label"><i class="fas fa-calendar-alt me-1" style="color: #667eea;"></i>Tanggal Beli</div>
                                        <div class="info-value">{{ $asset->tanggal_beli }}</div>
                                    </div>

                                    <div class="info-box">
                                        <div class="info-label"><i class="fas fa-info-circle me-1" style="color: #667eea;"></i>Status</div>
                                        @if($asset->status == 'Active')
                                            <span class="badge bg-success detail-badge"><i class="fas fa-check-circle me-1"></i>Active</span>
                                        @elseif($asset->status == 'Maintenance')
                                            <span class="badge bg-warning text-dark detail-badge"><i class="fas fa-tools me-1"></i>Maintenance</span>
                                        @elseif($asset->status == 'Rusak')
                                            <span class="badge bg-danger detail-badge"><i class="fas fa-exclamation-circle me-1"></i>Rusak</span>
                                        @elseif($asset->status == 'Dipinjam')
                                            <span class="badge bg-primary detail-badge"><i class="fas fa-hand-holding me-1"></i>Dipinjam</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="detail-table">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="detail-label"><i class="fas fa-dollar-sign me-1" style="color: #667eea;"></i>Harga</div>
                                            <div class="detail-value">Rp {{ number_format($asset->harga, 0, ',', '.') }}</div>
                                        </div>
                                    </div>

                                    @if($asset->status == 'Dipinjam')
                                        <div class="row mt-3">
                                            <div class="col-sm-6">
                                                <div class="detail-label"><i class="fas fa-user-check me-1" style="color: #667eea;"></i>Dipinjam Ke</div>
                                                <div class="detail-value">{{ $asset->dipinjam_ke }}</div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="detail-label"><i class="fas fa-calendar me-1" style="color: #667eea;"></i>Tanggal Pinjam</div>
                                                <div class="detail-value">{{ $asset->tanggal_pinjam }}</div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-sm-6">
                                                <div class="detail-label"><i class="fas fa-undo me-1" style="color: #667eea;"></i>Tanggal Kembali</div>
                                                <div class="detail-value">{{ $asset->tanggal_kembali }}</div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>