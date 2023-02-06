@if ($message = Session::get('success'))
    <!-- <div class="alert alert-success mt-2">
        {{ $message }}
    </div> -->

    <div class="alert alert-warning mb-0 alert-dismissible alert-absolute fade show " id="alertExample" role="alert" data-mdb-color="secondary">
        <i class="fas fa-check me-2"></i>
        {{ $message }}
        <button type="button" class="btn-close ms-2" data-mdb-dismiss="alert" aria-label="Close"></button>
    </div>

@endif
