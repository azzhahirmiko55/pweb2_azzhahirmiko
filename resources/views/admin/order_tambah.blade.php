@extends('template.main')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Tambah Data Order</h6>
                <form method="POST" action="{{ route('store_order') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama Makanan</label>
                        <input type="text" class="form-control" id="nama_makanan" name="nama_makanan"
                            aria-describedby="nama_makanan" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Porsi</label>
                        <input type="text" class="form-control" id="porsi" name="porsi">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tambahan</label>
                        <input type="text" class="form-control" id="tambahan" name="tambahan" aria-describedby="porsi"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pesan</label>
                        <input type="text" class="form-control" id="pesan" name="pesan" aria-describedby="pesan"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" aria-describedby="harga"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <input type="text" class="form-control" id="status" name="status" aria-describedby="status"
                            required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
@endsection
