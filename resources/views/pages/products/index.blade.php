@extends('layouts.backend')

@section('content')
    <div class="section-header">
        <a href="{{ route('products.index') }}">
            <h1>Daftar Produk</h1>
        </a>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Tipe</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Action</th>
                                    </tr>
                                    @forelse ($items as $item)
                                        <tr>
                                            <td class="p-0 text-center">{{ $loop->index + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->categories['name'] }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>
                                                <a href="{{ route('products.gallery', $item->id) }}" class="btn btn-info"><i
                                                    class="fas fa-image"></i></a>
                                                <a href="{{ route('products.edit', $item->id) }}" class="btn btn-success"><i
                                                        class="fas fa-edit"></i></a>
                                                <form action="{{ route('products.destroy', $item->id) }}" method="post"
                                                      class="d-inline"
                                                      onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">
                                                      @csrf
                                                      @method('DELETE')
                                                      <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center p-5">
                                                <i>Data Kosong</i>
                                            </td>
                                        </tr>
                                    @endforelse

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
