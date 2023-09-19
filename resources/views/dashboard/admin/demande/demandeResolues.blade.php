{{-- {{use Illuminate\Support\Facades\Auth; }} --}}
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
          <h1 class="mb-2 pb-0 display-4" id="object">Demandes</h1>
        </div>
        <!-- object End -->

        <!-- Top Buttons Start -->
        <div class="col-12 col-sm-auto d-flex align-items-center justify-content-end">
          <!-- Add New Button Start -->        
          <a href="#" class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto" data-bs-toggle="modal" data-bs-target="#demandeModal" data-bs-focus="false">
            <i data-acorn-icon="plus"></i>
            <span>Ajouter</span>
          </a>        
          <!-- Add New Button End -->
        </div>

        <!-- Create New demande Detail Modal Start -->
        <div class="modal modal-center fade" id="demandeModal" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">          
            <div class="modal-content">            
              <div class="modal-header">
                <h3 class="modal-title"><strong>Nouvelle demande</strong></h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="{{ route('admin.post-create-demande') }}" method="POST" autocomplete="off">
                  @csrf                  
                  <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Demandeur</label>                      

                    <div class="mb-3">
                      <select name="user_id" type="text" id="user_id" class="form-control" value="{{ old('user_id') }}">
                        @foreach($demandeurs as $user)
                            <option value="{{ $user->id }}">{{ $user->name }} {{ $user->surname }}</option>
                        @endforeach
                      </select>
                    </div>
                </div>

                  <div class="form-group row">
                      <label for="object" class="col-md-4 col-form-label text-md-right">Objet</label>

                      <div class="mb-3">

                          <select id="object" type="text" class="form-control @error('object') is-invalid @enderror bg-primary text-white" name="object" value="{{ old('object') }}">
                            <option value="Problème de connexion au réseau Wi-Fi">Problème de connexion au réseau Wi-Fi</option>
                            <option value="Erreur lors de l'installation d'un logiciel sur mon ordinateur">Erreur lors de l'installation d'un logiciel sur mon ordinateur</option>
                            <option value="Imprimante qui ne répond pas aux commandes d'impression">Imprimante qui ne répond pas aux commandes d'impression</option>
                            <option value="Problème de son sur mon ordinateur portable">Problème de son sur mon ordinateur portable</option>
                            <option value="Impossible d'accéder à un site web spécifique">Impossible d'accéder à un site web spécifique</option>
                            <option value="Problème de performance avec mon application mobile">Problème de performance avec mon application mobile</option>
                            <option value="Message d'erreur '\disque dur plein'\ sur mon ordinateur">Message d'erreur "disque dur plein" sur mon ordinateur</option>
                            <option value="Problème avec la synchronisation des données sur mes appareils">Problème avec la synchronisation des données sur mes appareils</option>
                            <option value="Besoin d'aide pour configurer un VPN sur mon routeur">Besoin d'aide pour configurer un VPN sur mon routeur</option>
                            {{-- <option value="autre">Autre</option> --}}
                            <option value="Autre">Autres (à préciser) </option>
                        </select>
                          @error('object')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="description" class="col-md-4 col-form-label text-md-right">Description du problème</label>

                      <div class="mb-3">
                          <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                          @error('description')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="modal-footer border-0">
                          <button type="submit" class="btn btn-icon btn-icon-only btn-outline-primary">
                              <i data-acorn-icon="save"></i>
                          </button> 
                          
                          <a
                  href="#"
                  class="btn btn-icon btn-icon-only btn-outline-primary"
                  data-delay='{"show":"500", "hide":"0"}'
                  data-bs-toggle="tooltip"
                  data-bs-placement="top"
                  object="Aller à"
                >
                  <i data-acorn-icon="shortcut"></i>
                </a>
                  </div>
              </form>  
              </div>
            </div>          
          </div>
        </div>
      <!-- Create New demande Detail Modal End -->


          <!-- Top Buttons End -->
        </div>
      </div>
      <!-- object and Top Buttons End -->
      <!-- Controls Start -->
      <div class="row mb-2">
        <!-- Search Start -->
        <div class="col-sm-12 col-md-5 col-lg-3 col-xxl-2 mb-1">
          <div class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 shadow bg-foreground">
            <input class="form-control" placeholder="Rechercher" type="text" />
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
                    <div class="col-6 col-md-5 d-flex align-items-center text-alternate text-medium text-muted text-small">TYPE DE DEMANDE</div>
                    <div class="col-6 col-md-3 d-flex align-items-center text-alternate text-medium text-muted text-small">DATE</div>
                    <div class="col-6 col-md-2 d-flex align-items-center justify-content-md-end text-alternate text-medium text-muted text-small">
                      STATUT
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
            
          @forelse ($demandes as $demande)                    
          {{-- @if (Auth::user()->id==$demande->user->id) --}}
          <a href="#" class="card mb-2 sh-22 sh-md-8" data-bs-toggle="modal" data-bs-target="#demandeModal{{ $demande->id }}" data-bs-focus="false">
            <div class="card-body pt-0 pb-0 h-100">
              <div class="row g-0 h-100 align-content-center">
                  <div class="col-11 col-md-2 d-flex align-items-center mb-1 mb-md-0 order-1 order-md-1">
                    {{ $demande->id }}
                  </div>
                <div class="col-11 col-md-5 d-flex align-items-center mb-1 mb-md-0 order-1 order-md-1">            
                    <i data-acorn-icon="file-text" class="sw-2 me-2 text-alternate" data-acorn-size="17"></i>
                    <span class="align-middle">{{ $demande->object }}</span>
                </div>
                <div class="col-12 col-md-3 d-flex align-items-center text-muted order-3 order-md-2">{{ $demande->created_at }}</div>
                <div class="col-1 col-md-2 d-flex align-items-center text-muted text-medium justify-content-end order-2 order-md-3">
                    {{-- <span class="badge rounded-pill bg-outline-primary">{{ $demande->status }}</span> --}}
                    @if ($demande->status=='ACCEPTE')
                    <span class="badge bg-outline-info me-1">{{ $demande->status }}</span>
                    @elseif ($demande->status=='EN ATTENTE')
                    <span class="badge bg-outline-warning me-1">{{ $demande->status }}</span>
                    @else
                    <span class="badge bg-outline-success me-1">{{ $demande->status }}</span>
                    @endif  
                </div>
              </div>
            </div>
          </a>

        <!-- demande Detail Modal Start -->
          @include('layouts.demandeDetailModal')
      <!-- demande Detail Modal End -->
          {{-- @endif --}}
          @empty
            <span>Pas de demande créée.</span>
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
              <li class="page-item">
                <a class="page page-link shadow" href="#">2</a>
              </li>
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