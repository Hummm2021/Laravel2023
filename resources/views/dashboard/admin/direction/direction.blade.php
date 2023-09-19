@if (Auth::guard('admin')->check())    
@extends('layouts.app')
@section('navbar')
<div class="page-title-container mb-3">
  <div class="row">
    <!-- object Start -->
    <div class="col mb-2">
      <a href="{{route('admin.home')}}" class="muted-link pb-1 d-inline-block breadcrumb-back">
          <i data-acorn-icon="chevron-left" data-acorn-size="13"></i>
          <span class="text-small align-middle">Accuiel</span>
        </a>
      <h1 class="mb-2 pb-0 display-4" id="object">directions</h1>
    </div>
    <!-- object End -->

    <!-- Top Buttons Start -->
    <div class="col-12 col-sm-auto d-flex align-items-center justify-content-end">
      <!-- Add New Button Start -->        
      <a href="#" class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto" data-bs-toggle="modal" data-bs-target="#directionModal" data-bs-focus="false">
        <i data-acorn-icon="plus"></i>
        <span>Ajouter</span>
      </a>        
      <!-- Add New Button End -->
    </div>

    <!-- Create New direction Detail Modal Start -->
    <div class="modal modal-center fade" id="directionModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">          
        <div class="modal-content">            
          <div class="modal-header">
            <h3 class="modal-title"><strong>Ajouter une direction</strong></h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="{{ route('admin.store-direction') }}" method="POST" autocomplete="off">
              @csrf
                            
              <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label text-md-right">Initial</label>

                  <div class="mb-3">
                    <div class="mb-3">
                        <input type="text" class="form-control @error('initial') is-invalid @enderror" id="initial" name="initial" placeholder="ex: DSI" required>
                    </div>                      
                    @error('initial')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
              </div>

              <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">Nom</label>                      
                <div class="mb-3">
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="ex: Direction des Systèmes d'Infomations" required autocomplete="name">
                </div>                      
                @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>
            

              <div class="form-group row">

                <div class="mb-3">
                    
                </div>
            </div>

            {{-- <div class="modal-footer border-0"> --}}
              <button type="submit" class="btn btn-icon btn-icon-only btn-outline-primary">
                  <i data-acorn-icon="save"></i>
              </button>                                                     
            {{-- </div> --}}
          </form>  
          </div>
        </div>          
      </div>
    </div>
     <!-- Create New direction Detail Modal End -->


      <!-- Top Buttons End -->
    </div>
  </div>
  <!-- object and Top Buttons End -->
  <!-- Controls Start -->
  <div class="row mb-2">
    <!-- Search Start -->
    <div class="col-sm-12 col-md-5 col-lg-3 col-xxl-2 mb-1">
      <div class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 shadow bg-foreground">
        <input class="form-control" placeholder="Search" />
        <span class="search-magnifier-icon">
          <i data-acorn-icon="search"></i>
        </span>
        <span class="search-delete-icon d-none">
          <i data-acorn-icon="close"></i>
        </span>
      </div>
    </div>
    <!-- Search End -->    
  </div>
  <!-- Controls End -->

  <!-- Item List Start -->
  <div class="row">
    <div class="col-12 mb-5">
      <div class="card mb-2 bg-transparent no-shadow d-none d-md-block">
        <div class="row g-0 sh-3">
          <div class="col">
            <div class="card-body pt-0 pb-0 h-100">
              <div class="row g-0 h-100 align-content-center">
                <div class="col-6 col-md-2 d-flex align-items-center text-alternate text-medium text-muted text-small">#ID</div>
                <div class="col-6 col-md-4 d-flex align-items-center text-alternate text-medium text-muted text-small">Initial</div>
                <div class="col-6 col-md-6 d-flex align-items-center text-alternate text-medium text-muted text-small">Nom</div>
{{-- <div class="col-6 col-md-2 d-flex align-items-center justify-content-md-end text-alternate text-medium text-muted text-small">
                  STATUT
                </div> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
        
      @forelse ($directions as $direction)
      {{-- @if (Auth::direction()->email==$direction->author_email) --}}
      <a href="#" class="card mb-2 sh-22 sh-md-8" data-bs-toggle="modal" data-bs-target="#imageModal{{ $direction->id }}" data-bs-focus="false">
        <div class="card-body pt-0 pb-0 h-100">
          <div class="row g-0 h-100 align-content-center">
              <div class="col-6 col-md-2 d-flex align-items-center mb-1 mb-md-0 order-1 order-md-1">
                {{$direction->id}}
              </div>
              <div class="col-6 col-md-4 d-flex align-items-center text-muted order-2 order-md-2">{{ $direction->initial }}</div>
            <div class="col-6 col-md-6 d-flex align-items-center mb-1 mb-md-0 order-3 order-md-3">            
                {{-- <i data-acorn-icon="home" class="sw-2 me-2 text-alternate" data-acorn-size="17"></i> --}}
                <span class="align-middle">{{$direction->name}}</span>
            </div>        
          </div>
        </div>
      </a>

      <!-- direction Detail Modal Start -->
      <div class="modal modal-center fade" id="imageModal{{ $direction->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-object">#{{ $direction->id }}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">        
              <div class="mb-3">
                <div class="text-small text-muted">INITIAL</div>
                <div>{{ $direction->name }}</div>
                {{-- <div>{{ $direction->initial }}</div> --}}
              </div>        
              <div class="mb-3">
                <div class="text-small text-muted">NOM</div>
                <div>{{ $direction->name }}</div>
              </div>
              <div class="mb-3">
                <div class="text-small text-muted">DATE D'AJOUT</div>
                <div>{{ $direction->created_at }}</div>
              </div>
            </div>
            <div class="modal-footer border-0">
              <a href="{{ route('admin.delete-direction', $direction->id) }}" class="btn btn-icon btn-icon-only btn-outline-danger">
                <i data-acorn-icon="bin"></i>
              </a>
              <a
              href="#"
              class="btn btn-icon btn-icon-only btn-outline-primary"
              data-delay='{"show":"500", "hide":"0"}'
              data-bs-toggle="tooltip"
              data-bs-placement="top"
              object="Voir"
              >
                <i data-acorn-icon="shortcut"></i>
              </a>              
            </div>
          </div>
        </div>
      </div>
      <!-- direction Detail Modal End -->

      @empty
      <span>Aucune direction n'a encore été ajoutée.</span>
      @endforelse
      
      <div class="w-100 d-flex justify-content-center">
        <ul class="pagination">
          <li class="page-item prev disabled">
            <a class="page page-link shadow" href="#">
              <i data-acorn-icon="chevron-left"></i>
            </a>
          </li>
          <li class="page-item active">
            <a class="page page-link shadow" href="#">1</a>
          </li>
          {{-- <li class="page-item">
            <a class="page page-link shadow" href="#">2</a>
          </li> --}}
          <li class="page-item next">
            <a class="page page-link shadow" href="#">
              <i data-acorn-icon="chevron-right"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
</div>
@endsection
@endif

