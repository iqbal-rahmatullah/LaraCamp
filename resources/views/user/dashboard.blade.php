@extends('layouts.main')
@section('content')
    @include('components.navbar')
    <section class="dashboard my-5">
        <div class="container">
            <div class="row text-left">
                <div class=" col-lg-12 col-12 header-wrap mt-4">
                    <p class="story">
                        DASHBOARD
                    </p>
                    <h2 class="primary-header ">
                        My Bootcamps
                    </h2>
                </div>
            </div>
            <div class="row my-5">
                <table class="table">
                    <tbody>
                        @forelse ($checkout as $item)
                            <tr class="align-middle">
                                <td width="18%">
                                    <img src="{{ asset('images/item_bootcamp.png') }}" height="120" alt="">
                                </td>
                                <td>
                                    <p class="mb-2">
                                        <strong>{{ $item->Camp->title }}</strong>
                                    </p>
                                    <p>
                                        {{ $item->created_at->format('M, d Y') }}
                                    </p>
                                </td>
                                <td>
                                    <strong>Rp. {{ $item->Camp->price }}</strong>
                                </td>
                                <td>
                                    @if ($item->is_paid)
                                        <strong class="alert-success p-2 rounded-pill">Dibayar</strong>
                                    @else
                                        <strong class="alert-danger p-2 rounded-pill">Belum Dibayar</strong>
                                    @endif
                                </td>
                                <td>
                                    <a href="#" class="btn btn-primary">
                                        Get Invoice
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">Anda belum memiliki pesanan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
