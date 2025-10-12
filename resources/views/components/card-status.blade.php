@props(['judul' => 'Status Card', 
    'angka' => 0, 
    'deskripsi' => 'Deskripsi status',
    'ikon' => 'bi-info-circle',
    'warna' => 'primary'])

<div class="card status-card {{ $warna }}-card">
  <div class="card-body status-card-body">
    <h5 class="card-title status-title">Status: {{ $judul }}</h5>
    <i class="{{ $ikon }} status-icon {{ $warna }}-icon"></i>
    <p class="card-text status-value">{{ $angka }}</p>
    <small class="text-muted">{{ $deskripsi }}</small>
  </div>
</div>