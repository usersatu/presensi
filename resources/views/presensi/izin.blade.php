@extends('layouts.Presensi')
@section('header')
<!-- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Halaman Izin / Sakit</div>
    <div class="right"></div>
</div>
<!-- * App Header -->
@endsection

@section('content')
<div class="row" style="margin-top: 4rem">
    <div class="col">
        @php
        $messagesuccess = Session::get('success');
        $messageerror = Session::get('error');
        @endphp
        @if (Session::get('success'))
        <div class="alert alert-success">
            {{ $messagesuccess }}
        </div>            
        @endif
        @if (Session::get('error'))
        <div class="alert alert-danger">
            {{ $messageerror }}
        </div>            
        @endif
    </div>
</div>

@foreach ($dataizin as $d)
<ul class="listview image-listview">
    <li>
        <div class="item">
            
            <div class="in">
                <div>
                    {{ date("d-m-Y", strtotime($d->tgl_izin)) }} ({{ $d->status == "s" ? "Sakit" : "Izin" }})<br>
                    <small class="text-muted">{{ $d->keterangan }}</small>
                </div>
                @if ($d->status_approved == 0)
                <span class="badge bg-warning">Menunggu</span>   
                @elseif ($d->status_approved == 1)
                <span class="badge bg-success">Di Setujui</span>
                @elseif ($d->status_approved == 2)
                <span class="badge bg-danger">Di Tolak</span>
                @endif
            </div>
        </div>
    </li>
</ul>
@endforeach


<div class="fab-button bottom-right" style="margin-bottom:70px">
    <a href="/presensi/buatizin" class="fab">
        <ion-icon name="add"></ion-icon>
    </a>
</div>
    
@endsection