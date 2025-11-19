<!-- Logout Confirmation Modal -->
<div class="modal fade" id="modalLogout" tabindex="-1" aria-labelledby="modalLogoutLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header border-bottom-0 pb-0">
        <div class="d-flex align-items-start w-100">
          <div class="modal-icon-wrapper bg-warning bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 48px; height: 48px; min-width: 48px;">
            <span class="text-warning fw-bold fs-4">!</span>
          </div>
          <div>
            <h5 class="modal-title fw-semibold mb-1" id="modalLogoutLabel">Konfirmasi Logout</h5>
            <p class="text-muted small mb-0">Sesi akun Anda akan berakhir</p>
          </div>
        </div>
      </div>
      
      <div class="modal-body py-4">
        <div class="alert alert-warning border-warning bg-warning bg-opacity-10 mb-0">
          <div class="d-flex">
            <i class="fas fa-info-circle me-2 mt-1 text-warning"></i>
            <div>
              <p class="mb-1 fw-medium">Apakah Anda yakin ingin keluar?</p>
              <p class="small mb-0 text-muted">Anda perlu login kembali untuk mengakses akun Anda.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="modal-footer border-top-0 pt-0">
        <form method="POST" action="{{ route('logout') }}" class="w-100">
          @csrf
          <div class="d-flex gap-2 justify-content-end">
            <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">
              <i class="fas fa-times me-2"></i>Batal
            </button>
            <button type="submit" class="btn btn-danger px-4">
              <i class="fas fa-sign-out-alt me-2"></i>Ya, Logout
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>