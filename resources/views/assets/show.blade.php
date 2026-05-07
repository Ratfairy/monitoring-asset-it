@extends('layouts.app')

@section('content')

<style>
    .modern-card {
        border: none;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(102, 126, 234, 0.15);
        transition: all 0.3s ease;
    }

    .modern-card:hover {
        box-shadow: 0 15px 50px rgba(102, 126, 234, 0.25);
    }

    .modern-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #fff;
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

    .modern-header h4 {
        font-size: 1.8rem;
        font-weight: 700;
        position: relative;
        z-index: 1;
        margin-bottom: 0.3rem;
    }

    .modern-header p {
        color: rgba(255, 255, 255, 0.85);
        margin-bottom: 0;
        position: relative;
        z-index: 1;
        font-size: 0.95rem;
    }

    .detail-badge {
        font-size: 0.9rem;
        padding: 0.6rem 0.95rem;
        border-radius: 999px;
    }

    .detail-card {
        background: #ffffff;
        border: 1px solid #ebedf3;
        border-radius: 12px;
        padding: 1.8rem;
        min-height: 100%;
    }

    .detail-label {
        color: #6b7280;
        font-size: 0.95rem;
        font-weight: 600;
    }

    .detail-value {
        font-weight: 600;
        font-size: 1rem;
        color: #1f2937;
    }

    .asset-info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
        margin-bottom: 2rem;
    }

    .asset-info-box {
        background: #f8fafc;
        border: 1.5px solid #e2e8f0;
        border-radius: 12px;
        padding: 1.2rem;
        transition: all 0.3s ease;
    }

    .asset-info-box:hover {
        border-color: #667eea;
        background: #f0f4ff;
    }

    .asset-info-box strong {
        display: block;
        margin-bottom: 0.4rem;
        color: #374151;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .asset-info-box span {
        color: #1f2937;
        font-weight: 600;
    }

    .qr-section {
        text-align: center;
        padding: 1.5rem;
        border-top: 2px solid #f0f4f8;
        margin-top: 1.5rem;
    }

    .qr-section h5 {
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 0.5rem;
        font-size: 1rem;
    }

    .qr-section p {
        color: #6b7280;
        font-size: 0.9rem;
        margin-bottom: 1rem;
    }

    .btn-action-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        padding: 0.75rem 1.5rem;
        font-weight: 600;
        border-radius: 8px;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.2);
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        cursor: pointer;
        text-decoration: none;
    }

    .btn-action-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        color: white;
        text-decoration: none;
    }

    .btn-action-secondary {
        background-color: #f59e0b;
        color: white;
        border: none;
        padding: 0.75rem 1.5rem;
        font-weight: 600;
        border-radius: 8px;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(245, 158, 11, 0.2);
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        cursor: pointer;
        text-decoration: none;
    }

    .btn-action-secondary:hover {
        background-color: #d97706;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(245, 158, 11, 0.3);
        color: white;
        text-decoration: none;
    }

    .btn-action-danger {
        background-color: #ef4444;
        color: white;
        border: none;
        padding: 0.75rem 1.5rem;
        font-weight: 600;
        border-radius: 8px;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(239, 68, 68, 0.2);
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        cursor: pointer;
        text-decoration: none;
    }

    .btn-action-danger:hover {
        background-color: #dc2626;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(239, 68, 68, 0.3);
        color: white;
        text-decoration: none;
    }

    .action-buttons {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 2px solid #f0f4f8;
    }

    .img-container {
        position: relative;
        overflow: hidden;
        border-radius: 12px;
        margin-bottom: 1.5rem;
    }

    .img-container img {
        width: 100%;
        height: auto;
        display: block;
        transition: transform 0.3s ease;
    }

    .img-container:hover img {
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

    @media (max-width: 768px) {
        .modern-header {
            padding: 1.5rem;
        }

        .modern-header h4 {
            font-size: 1.4rem;
        }

        .detail-card {
            padding: 1.25rem;
        }

        .action-buttons {
            flex-direction: column;
        }

        .btn-action-primary,
        .btn-action-secondary,
        .btn-action-danger {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="modern-card">
                <div class="modern-header">
                    <h4><i class="fas fa-info-circle me-2"></i>Detail Asset</h4>
                    <p>Lihat informasi lengkap asset, status, dan QR code untuk akses publik.</p>
                </div>

                <div class="card-body p-5">
                    <div class="row g-4">
                        <div class="col-lg-4">
                            <div class="detail-card text-center">
                                @if($asset->foto)
                                    <div class="img-container">
                                        <img src="{{ asset('storage/' . $asset->foto) }}" alt="Foto Asset">
                                    </div>
                                @else
                                    <div class="no-image-placeholder">
                                        <div class="text-center">
                                            <i class="fas fa-image" style="font-size: 3rem; opacity: 0.3;"></i>
                                            <p class="mt-2">Tidak ada foto</p>
                                        </div>
                                    </div>
                                @endif

                                <div class="qr-section">
                                    <h5><i class="fas fa-qrcode me-2"></i>QR Code Asset</h5>
                                    <p>Scan untuk melihat halaman publik.</p>
                                    {!! QrCode::size(200)->generate(route('assets.public', $asset->id)) !!}
                                </div>

                                <a href="{{ route('assets.print', $asset->id) }}" target="_blank" class="btn-action-primary w-100 justify-content-center mt-3">
                                    <i class="fas fa-print"></i>Print QR
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="detail-card">
                                <div class="asset-info-grid">
                                    <div class="asset-info-box">
                                        <strong><i class="fas fa-barcode me-2" style="color: #667eea;"></i>Kode Asset</strong>
                                        <span>{{ $asset->kode_asset }}</span>
                                    </div>
                                    <div class="asset-info-box">
                                        <strong><i class="fas fa-laptop me-2" style="color: #667eea;"></i>Nama Perangkat</strong>
                                        <span>{{ $asset->nama_perangkat }}</span>
                                    </div>
                                    <div class="asset-info-box">
                                        <strong><i class="fas fa-tag me-2" style="color: #667eea;"></i>Jenis Perangkat</strong>
                                        <span>{{ $asset->jenis_perangkat }}</span>
                                    </div>
                                    <div class="asset-info-box">
                                        <strong><i class="fas fa-box me-2" style="color: #667eea;"></i>Versi</strong>
                                        <span>{{ $asset->versi_perangkat }}</span>
                                    </div>
                                    <div class="asset-info-box">
                                        <strong><i class="fas fa-user me-2" style="color: #667eea;"></i>Pengguna</strong>
                                        <span>{{ $asset->pengguna }}</span>
                                    </div>
                                    <div class="asset-info-box">
                                        <strong><i class="fas fa-building me-2" style="color: #667eea;"></i>Departemen</strong>
                                        <span>{{ $asset->departemen }}</span>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-borderless align-middle mb-0">
                                        <tbody>
                                            <tr>
                                                <th class="px-0 detail-label" style="width: 28%;"><i class="fas fa-calendar-alt me-2" style="color: #667eea;"></i>Tanggal Beli</th>
                                                <td class="px-0 detail-value">{{ $asset->tanggal_beli }}</td>
                                            </tr>
                                            <tr>
                                                <th class="px-0 detail-label"><i class="fas fa-dollar-sign me-2" style="color: #667eea;"></i>Harga</th>
                                                <td class="px-0 detail-value">Rp {{ number_format($asset->harga, 0, ',', '.') }}</td>
                                            </tr>
                                            <tr>
                                                <th class="px-0 detail-label"><i class="fas fa-info-circle me-2" style="color: #667eea;"></i>Status</th>
                                                <td class="px-0">
                                                    @if($asset->status == 'Active')
                                                        <span class="badge bg-success detail-badge"><i class="fas fa-check-circle me-1"></i>Active</span>
                                                    @elseif($asset->status == 'Maintenance')
                                                        <span class="badge bg-warning text-dark detail-badge"><i class="fas fa-tools me-1"></i>Maintenance</span>
                                                    @elseif($asset->status == 'Rusak')
                                                        <span class="badge bg-danger detail-badge"><i class="fas fa-exclamation-circle me-1"></i>Rusak</span>
                                                    @else
                                                        <span class="badge bg-primary detail-badge"><i class="fas fa-hand-holding me-1"></i>Dipinjam</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            @if($asset->status == 'Dipinjam')
                                                <tr>
                                                    <th class="px-0 detail-label"><i class="fas fa-user-check me-2" style="color: #667eea;"></i>Dipinjam Ke</th>
                                                    <td class="px-0 detail-value">{{ $asset->dipinjam_ke }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="px-0 detail-label"><i class="fas fa-calendar me-2" style="color: #667eea;"></i>Tanggal Pinjam</th>
                                                    <td class="px-0 detail-value">{{ $asset->tanggal_pinjam }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="px-0 detail-label"><i class="fas fa-undo me-2" style="color: #667eea;"></i>Tanggal Kembali</th>
                                                    <td class="px-0 detail-value">{{ $asset->tanggal_kembali }}</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>

                                <div class="action-buttons">
                                    <a href="{{ route('assets.index') }}" class="btn-action-primary">
                                        <i class="fas fa-arrow-left"></i>Kembali
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection