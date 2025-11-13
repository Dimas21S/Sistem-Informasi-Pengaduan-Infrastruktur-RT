<!-- Modal -->
<div class="modal fade" id="modalLogout" tabindex="-1" aria-labelledby="modalLogoutLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalLogoutLabel">Apakah Anda yakin ingin keluar ?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
            <button type="submit" class="btn btn-primary">Ya</button>
        </div>
    </form>
    </div>
  </div>
</div>