@extends('layouts.app')
@section('navbar')
<div class="row">
    <div class="col-12 col-lg-6">
      <!-- Stats Start -->
      <div class="d-flex">
        <div class="dropdown-as-select me-3" data-setActive="false" data-childSelector="span">
          <a class="pe-0 pt-0 align-top lh-1 dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
            <span class="small-title"></span>
          </a>
          <div class="dropdown-menu font-standard">
            <div class="nav flex-column" role="tablist">
              <a class="active dropdown-item text-medium" href="#" aria-selected="true" role="tab">Aujourd'hui</a>
              <a class="dropdown-item text-medium" href="#" aria-selected="false" role="tab">Cette semaine</a>
              <a class="dropdown-item text-medium" href="#" aria-selected="false" role="tab">Ce mois</a>
              <a class="dropdown-item text-medium" href="#" aria-selected="false" role="tab">Cette année</a>
            </div>
          </div>
        </div>
      </div>
      <!-- Stats Start -->

      {{-- <div class="row g-2">
        <div class="col-12 p-0">
          <div class="glide glide-small" id="statsCarousel">
            <div class="glide__track" data-glide-el="track">
              <div class="glide__slides">
                <div class="glide__slide">
                  <div class="card mb-5 sh-20 hover-border-primary">
                    <div class="h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between">
                      <div class="d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2">
                        <i data-acorn-icon="alarm" class="text-white"></i>
                      </div>
                      <p class="mb-0 lh-1">Tickets Ouverts</p>
                      <p class="cta-3 mb-0 text-primary">25</p>
                    </div>
                  </div>
                </div>
                <div class="glide__slide">
                  <div class="card mb-5 sh-20 hover-border-primary">
                    <div class="h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between">
                      <div class="d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2">
                        <i data-acorn-icon="navigate-diagonal" class="text-white"></i>
                      </div>
                      <p class="mb-0 lh-1">Shipped Orders</p>
                      <p class="cta-3 mb-0 text-primary">48</p>
                    </div>
                  </div>
                </div>
                <div class="glide__slide">
                  <div class="card mb-5 sh-20 hover-border-primary">
                    <div class="h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between">
                      <div class="d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2">
                        <i data-acorn-icon="check-circle" class="text-white"></i>
                      </div>
                      <p class="mb-0 lh-1">Delivered Orders</p>
                      <p class="cta-3 mb-0 text-primary">53</p>
                    </div>
                  </div>
                </div>
                <div class="glide__slide">
                  <div class="card mb-5 sh-20 hover-border-primary">
                    <div class="h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between">
                      <div class="d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2">
                        <i data-acorn-icon="arrow-bottom-left" class="text-white"></i>
                      </div>
                      <p class="mb-0 lh-1">Returned Orders</p>
                      <p class="cta-3 mb-0 text-primary">4</p>
                    </div>
                  </div>
                </div>
                <div class="glide__slide">
                  <div class="card mb-5 sh-20 hover-border-primary">
                    <div class="h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between">
                      <div class="d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2">
                        <i data-acorn-icon="warning-hexagon" class="text-white"></i>
                      </div>
                      <p class="mb-0 lh-1">Unconfirmed Orders</p>
                      <p class="cta-3 mb-0 text-primary">3</p>
                    </div>
                  </div>
                </div>
                <div class="glide__slide">
                  <div class="card mb-5 sh-20 hover-border-primary">
                    <div class="h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between">
                      <div class="d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2">
                        <i data-acorn-icon="pin" class="text-white"></i>
                      </div>
                      <p class="mb-0 lh-1">Missing Orders</p>
                      <p class="cta-3 mb-0 text-primary">2</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> --}}
      <!-- Stats Start -->
      <div class="mb-5">
        <div class="row g-2">
          <a href="{{ route('admin.demande-enattente') }}" class="col-12 col-sm-3 col-lg-3">
            <div class="card sh-20 hover-scale-up cursor-pointer hover-border-primary">
              <div class="h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between">
                  <div class="d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2">
                    <i data-acorn-icon="navigate-diagonal" class="text-white"></i>
                  </div>
                <p class="mb-0 lh-1">Demandes En attente</p>
                <p class="cta-3 mb-0 text-primary">{{ $demandeEnvoyees }}</p>
              </div>
            </div>
          </a>

          <a href="{{ route('admin.demande-acceptees') }}" class="col-12 col-sm-3 col-lg-3">
            <div class="card sh-20 hover-scale-up cursor-pointer hover-border-primary">
              <div class="h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between">
                  <div class="d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2">
                    <i data-acorn-icon="check" class="text-white"></i>
                  </div>
                <p class="mb-0 lh-1">Demandes Répondues</p>
                <p class="cta-3 mb-0 text-primary"> {{$demandeRepondues}} </p>
              </div>
            </div>
          </a>

          <a href="{{ route('admin.demande-resolues') }}" class="col-12 col-sm-3 col-lg-3">
            <div class="card sh-20 hover-scale-up cursor-pointer hover-border-primary">
              <div class="h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between">
                  <div class="d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2">
                    <i data-acorn-icon="alarm" class="text-white"></i>
                  </div>
                <p class="mb-0 lh-1">Demandes Résolues</p>
                <p class="cta-3 mb-0 text-primary">{{ $demandeResolues }}</p>
              </div>
            </div>
          </a>

          <div class="col-12 col-sm-3 col-lg-3">
            <a href="{{ route('admin.demande') }}" class="card sh-20 hover-scale-up cursor-pointer hover-border-primary">
              <div class="h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between">
                  <div class="d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2">
                    <i data-acorn-icon="sync-horizontal" class="text-white"></i>
                  </div>
                <p class="mb-0 lh-1">Total Demandes</p>
                <p class="cta-3 mb-0 text-primary">{{ $totalDemandes}}</p>
              </div>
            </a>
          </div>
        </div>
      </div>
      <!-- Stats End -->
      {{-- <div class="card mb-2 sh-10 sh-md-8 hover-border-primary" class="h-100">
        <div class="card-body">
          <div id="columnchart_material" style="width: auto; height: auto;" ></div>
          <div id="columnchart_material" class="h-100"></div>
        </div>
      </div> --}}

      <div class="d-flex justify-content-between hover-border-primary"  >
        <div class="col-12 col-lg-12 mb-3" id="columnchart_material"></div>
      </div>      
    </div>
    
    <!-- demande Detail Modal Start -->
    @forelse (($demandes) as $demande)
      @include('layouts.demandeDetailModal')      
    @endforeach
    <!-- demande Detail Modal End -->

    
    <div class="col-12 col-lg-6 mb-5">

            <!-- Demande Start -->
      {{-- <h2 class="small-title">Demandes en cours</h2> --}}
      <div class="d-flex justify-content-between">
        <h2 class="small-title">Demandes en cours</h2>
        <a href="{{ route('admin.demande') }}" class="btn btn-icon btn-icon-end btn-xs btn-background-alternate p-0 text-small" type="button">
          <span class="align-bottom">Tout voir</span>
          <i data-acorn-icon="chevron-right" class="align-middle" data-acorn-size="12"></i>
        </a>
      </div>
      <div class="scroll-by-count mb-3" data-count="3">
        @forelse (($demandes) as $demande)
        {{-- <div class="card mb-2 sh-10 sh-md-8 hover-border-primary"> --}}
        <a href="#" class="card mb-2 sh-10 sh-md-8 hover-border-primary" data-bs-toggle="modal" data-bs-target="#demandeModal{{ $demande->id }}" data-bs-focus="false">
          <div class="card-body pt-0 pb-0 h-100 ">
            <div class="row g-0 h-100 align-content-center">
              <div class="col-4 col-md-2 d-flex align-items-center mb-2 mb-md-0 ">
                #{{ $demande->id }}
              </div>
              <div class="col-8 col-md-4 d-flex align-items-center mb-2 mb-md-0">
                {{ $demande->user->name }} {{ $demande->user->surname }}
              </div>
              <div class="col-8 col-md-4 d-flex align-items-center mb-2 mb-md-0 text-muted text-medium">
                {{ $demande->created_at->format('d-m-Y') }}
              </div>                
              <div class="col-4 col-md-2 d-flex align-items-center justify-content-end text-muted text-medium">
                @if ($demande->status=='EN ATTENTE')
                <span class="badge bg-outline-warning me-1">{{ $demande->status }}</span>
                @elseif ($demande->status=='RESOLUE')
                <span class="badge bg-outline-success me-1">{{ $demande->status }}</span>
                @else
                <span class="badge bg-outline-info me-1">{{ $demande->status }}</span>
                @endif  
              </div>  
            </div>
          </div>
        </a>
        
        @empty
            <span>Aucune demande n'a encore été ajoutée.</span>
        @endforelse
      </div>
      <!-- Demande End -->

      <!-- Intervention Start -->
      <div class="d-flex justify-content-between">
          <h2 class="small-title">Interventions en cours</h2>
        <a href="{{ route('admin.intervention') }}" class="btn btn-icon btn-icon-end btn-xs btn-background-alternate p-0 text-small" type="button">
          <span class="align-bottom">Tout voir</span>
          <i data-acorn-icon="chevron-right" class="align-middle" data-acorn-size="12"></i>
        </a>
      </div>
      <div class="scroll-out">
        <div class="scroll-out">
          <div class="scroll-by-count" data-count="3">
            @forelse (($interventions) as $intervention)
            {{-- <div class="card mb-2 sh-10 sh-md-8 hover-border-primary"> --}}
            <a href="#" class="card mb-2 sh-10 sh-md-8 hover-border-primary" data-bs-toggle="modal" data-bs-target="#imageModal{{ $intervention->id }}" data-bs-focus="false">
              <div class="card-body pt-0 pb-0 h-100 ">
                <div class="row g-0 h-100 align-content-center">
                  <div class="col-4 col-md-2 d-flex align-items-center mb-2 mb-md-0 ">
                    #{{ $intervention->id }}
                  </div>
                  <div class="col-8 col-md-4 d-flex align-items-center mb-2 mb-md-0">
                    {{ $intervention->type_depannage }}
                  </div>
                  <div class="col-8 col-md-4 d-flex align-items-center mb-2 mb-md-0 text-muted text-medium">
                    {{ $intervention->created_at->format('d-m-Y') }}
                  </div>                
                  <div class="col-4 col-md-2 d-flex align-items-center justify-content-end text-muted text-medium">
                    @if ($intervention->status=='EN COURS')
                    <span class="badge bg-outline-warning me-1">{{ $intervention->status }}</span>
                    @elseif ($intervention->status=='RESOLU')
                    <span class="badge bg-outline-success me-1">{{ $intervention->status }}</span>
                    @else
                    <span class="badge bg-outline-danger me-1">{{ $intervention->status }}</span>
                    @endif  
                  </div>  
                </div>
              </div>
            </a>
            @empty
                <span>Aucune intervention n'a encore été lancée.</span>
            @endforelse
          </div>
        </div> 
      </div>
    </div>  
    @foreach ($interventions as $intervention)
    @include('layouts.interventionDetailModal')
    @endforeach
    <!-- Intervention Start -->

</div>
@endsection
