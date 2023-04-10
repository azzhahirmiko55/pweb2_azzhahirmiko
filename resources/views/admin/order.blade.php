@extends('template.main')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <div class="d-flex justify-content-between">
                    <h6 class="mb-4">Order</h6>
                    <a href="{{ route('tambah_order') }}" class="btn btn-primary align-self-center">Tambah</a>
                </div>

                <div class="table-responsive mt-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Makanan</th>
                                <th scope="col">Porsi</th>
                                <th scope="col">Tambahan</th>
                                <th scope="col">Pesan</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $order)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $order->nama_makanan }}</td>
                                    <td>{{ $order->porsi }}</td>
                                    <td>{{ $order->tambahan }}</td>
                                    <td>{{ $order->pesan }}</td>
                                    <td>{{ $order->harga }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td>
                                        <a href="order/edit/{{ $order->id }}" class="btn btn-sm btn-warning"><i
                                                class="fa fa-edit"></i></a>
                                        <a href="order/destroy/{{ $order->id }}"
                                            onclick="return confirm('Apakah Anda Yakin Menghapus Data?');"
                                            class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>

                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    Data Post belum Tersedia.
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
