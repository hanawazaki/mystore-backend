@extends('layouts.backend')

@section('title', 'Daftar Transaksi')
@section('content')
    <div class="section-header">
        <a href="{{ route('transactions.index') }}">
            <h1>Daftar Transaksi</h1>
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
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Nomor</th>
                                            <th>Total Transaksi</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($items as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->number }}</td>
                                                <td>Rp {{ $item->transaction_total }}</td>
                                                <td>
                                                    @if ($item->transaction_status == 'PENDING')
                                                        <span class="badge badge-info">
                                                        @elseif($item->transaction_status == 'SUCCESS')
                                                            <span class="badge badge-success">
                                                            @elseif($item->transaction_status == 'FAILED')
                                                                <span class="badge badge-danger">
                                                                @else
                                                                    <span>
                                                    @endif
                                                    {{ $item->transaction_status }}
                                                    </span>
                                                </td>
                                                <td>
                                                    @if ($item->transaction_status == 'PENDING')
                                                        <a href="{{ route('transactions.status', $item->id) }}?status=SUCCESS"
                                                            class="btn btn-success btn-sm">
                                                            <i class="fa fa-check"></i>
                                                        </a>
    
                                                        <a href="{{ route('transactions.status', $item->id) }}?status=FAILED"
                                                            class="btn btn-warning btn-sm">
                                                            <i class="fa fa-times"></i>
                                                        </a>
                                                    @endif
                                                    <a href="#mymodal" data-remote="{{ route('transactions.show', $item->id) }}"
                                                        data-toggle="modal" data-target="#mymodal"
                                                        data-title="Detail Transaksi {{ $item->id }}" class="btn btn-info btn-sm">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('transactions.edit', $item->id) }}"
                                                        class="btn btn-primary btn-sm">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('transactions.destroy', $item->id) }}" method="POST"
                                                          class="d-inline"
                                                          onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">
                                                    
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger btn-sm">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center p-5">
                                                    Item tidak ada
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
