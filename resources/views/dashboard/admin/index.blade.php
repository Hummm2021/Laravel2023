@extends('layouts.app')
@section('navbar')
<div class="mb-5">
    <div class="row g-2">
      <div class="col-12 col-sm-6 col-lg-6">
        <div class="card sh-11 hover-scale-up cursor-pointer">
          <div class="h-100 row g-0 card-body align-items-center py-3">
            <div class="col-auto pe-3">
              <div class="bg-gradient-light sh-6 sw-6 rounded-xl d-flex justify-content-center align-items-center">
                {{-- <i data-acorn-icon="user" class="text-white"></i> --}}
              </div>
            </div>
            <div class="col">
              <div class="row gx-2 d-flex align-content-center">
                <div class="col-12 col-xl d-flex">
                  <div class="d-flex align-items-center lh-1-25">Utilisateurs</div>
                </div>
                <div class="col-12 col-xl-auto">
                  <div class="cta-2 text-primary">{{$nombreUsers}}</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-lg-6">
        <div class="card sh-11 hover-scale-up cursor-pointer">
          <div class="h-100 row g-0 card-body align-items-center py-3">
            <div class="col-auto pe-3">
              <div class="bg-gradient-light sh-6 sw-6 rounded-xl d-flex justify-content-center align-items-center">
                {{-- <i data-acorn-icon="check" class="text-white"></i> --}}
              </div>
            </div>
            <div class="col">
              <div class="row gx-2 d-flex align-content-center">
                <div class="col-12 col-xl d-flex">
                  <div class="d-flex align-items-center lh-1-25">Techniciens</div>
                </div>
                <div class="col-12 col-xl-auto">
                  <div class="cta-2 text-primary">{{$nombreTechnicien}}</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <a href="{{ route('admin.direction') }}" class="col-12 col-sm-6 col-lg-6">
        <div class="card sh-11 hover-scale-up cursor-pointer">
          <div class="h-100 row g-0 card-body align-items-center py-3">
            <div class="col-auto pe-3">
              <div class="bg-gradient-light sh-6 sw-6 rounded-xl d-flex justify-content-center align-items-center">
                {{-- <i data-acorn-icon="alarm" class="text-white"></i> --}}
              </div>
            </div>
            <div class="col">
              <div class="row gx-2 d-flex align-content-center">
                <div class="col-12 col-xl d-flex">
                  <div class="d-flex align-items-center lh-1-25">Directions</div>
                </div>
                <div class="col-12 col-xl-auto">
                  <div class="cta-2 text-primary">{{$nombreDirections}}</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </a>

      <a href="{{ route('admin.sous-direction') }}" class="col-12 col-sm-6 col-lg-6">
        <div class="card sh-11 hover-scale-up cursor-pointer">
          <div class="h-100 row g-0 card-body align-items-center py-3">
            <div class="col-auto pe-3">
              <div class="bg-gradient-light sh-6 sw-6 rounded-xl d-flex justify-content-center align-items-center">
                {{-- <i data-acorn-icon="sync-horizontal" class="text-white"></i> --}}
              </div>
            </div>
            <div class="col">
              <div class="row gx-2 d-flex align-content-center">
                <div class="col-12 col-xl d-flex">
                  <div class="d-flex align-items-center lh-1-25">Sous-directions</div>
                </div>
                <div class="col-12 col-xl-auto">
                  <div class="cta-2 text-primary">{{$nombreSousDirection}}</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>
  </div>
  <!-- Stats End -->
@endsection