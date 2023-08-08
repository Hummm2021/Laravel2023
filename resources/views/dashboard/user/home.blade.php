@extends('layouts.apps')
@section('navbar')
<!-- Title and Top Buttons Start -->
<div class="page-title-container">
    <div class="row">
      <!-- Title Start -->
      <div class="col-12 col-md-7">
        <h1 class="mb-0 pb-0 display-4" id="title">Horizontal Starter Page</h1>
        <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
          <ul class="breadcrumb pt-0">
            <li class="breadcrumb-item"><a href="{{ route('user.home') }}">Home</a></li>
          </ul>
        </nav>
      </div>
      <!-- Title End -->
    </div>
  </div>
  <!-- Title and Top Buttons End -->

  <!-- Content Start -->
  <div class="card mb-2">
    <div class="card-body h-100">An empty page with a boxed horizontal layout.</div>
  </div>
  <!-- Content End -->
@endsection