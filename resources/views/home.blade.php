@extends('layouts.master')
@section('title','HOME')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Home Dashboard</h1>
    </div>

    <div class="section-body">
      <div class="title m-b-md">
        
        {{-- @php
    require('dashboard.php');
    @endphp --}}
    </div>

    </div>
    
  </section>
  <div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
              @php
              require('dashboard.php');
              @endphp

        </div>

    </div>
</div>
@endsection

@push('page-script')
    
@endpush
    

