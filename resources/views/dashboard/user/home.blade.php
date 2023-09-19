@if (Auth::guard('web')->check())    
  @if (Auth::user()->profile == 'utilisateur')
  @extends('layouts.apps')
  @section('navbar')
  <!-- object and Top Buttons Start -->
  <div class="page-title-container mb-3">
      <div class="row">
        <!-- object Start -->
        <div class="col mb-2">
          <a href="{{route('user.home')}}" class="muted-link pb-1 d-inline-block breadcrumb-back">
              <i data-acorn-icon="chevron-left" data-acorn-size="13"></i>
              <span class="text-small align-middle">Accuiel</span>
            </a>
          <h1 class="mb-2 pb-0 display-4" id="object">Vos Demandes</h1>
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
                <form action="{{ route('user.post-create-demande') }}" method="POST" autocomplete="off">
                  @csrf
                  <div class="form-group row">
                      <label class="col-md-4 col-form-label text-md-right">Demandeur</label>

                      <div class="mb-3">
                          <input  type="text" class="form-control"  value="{{ Auth::user()->name }} {{ Auth::user()->surname }}" autocomplete="name" disabled>                        
                      </div>
                  </div>

                  <div class="form-group row">
                      <label class="col-md-4 col-form-label text-md-right">Email</label>

                      <div class="mb-3">
                          <input  type="email" class="form-control" value="{{ Auth::user()->email }}" required autocomplete="email" disabled>                        
                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="object" class="col-md-4 col-form-label text-md-right">Objet</label>

                      <div class="mb-3">
                          {{-- <input id="object" type="text" class="form-control @error('object') is-invalid @enderror" name="object" value="{{ old('object') }}" required autocomplete="object"> --}}

                          <select id="object" type="text" class="form-control @error('object') is-invalid @enderror " name="object" value="{{ old('object') }}">
                              {{-- @foreach($TypesDeDemandes as $option)
                                  <option value="{{ $option }}">{{ $option }}</option>
                              @endforeach --}}
                              <option value="Problème de connexion au réseau Wi-Fi">Problème de connexion au réseau Wi-Fi</option>
                              <option value="Erreur lors de l'installation d'un logiciel sur mon ordinateur">Erreur lors de l'installation d'un logiciel sur mon ordinateur</option>
                              <option value="Imprimante qui ne répond pas aux commandes d'impression">Imprimante qui ne répond pas aux commandes d'impression</option>
                              <option value="Problème de son sur mon ordinateur portable">Problème de son sur mon ordinateur portable</option>
                              <option value="Impossible d'accéder à un site web spécifique">Impossible d'accéder à un site web spécifique</option>
                              <option value="Problème de performance avec mon application mobile">Problème de performance avec mon application mobile</option>
                              <option value="Message d'erreur '\disque dur plein'\ sur mon ordinateur">Message d'erreur "disque dur plein" sur mon ordinateur</option>
                              <option value="Problème avec la synchronisation des données sur mes appareils">Problème avec la synchronisation des données sur mes appareils</option>
                              <option value="Besoin d'aide pour configurer un VPN sur mon routeur">Besoin d'aide pour configurer un VPN sur mon routeur</option>
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
                      <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

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
        {{-- @if (Auth::user()->email==$demande->author_email) --}}
        @if (Auth::user()->id==$demande->user_id)
        <a href="#" class="card mb-2 sh-22 sh-md-8" data-bs-toggle="modal" data-bs-target="#imageModal{{ $demande->id }}" data-bs-focus="false">
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
        <div class="modal modal-center fade" id="imageModal{{ $demande->id }}" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-object">#{{ $demande->id }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-4">
                  <div class="text-small text-muted">AUTEUR</div>
                  <div>{{ Auth::user()->name }} {{ Auth::user()->surname }}</div>
                </div>
                <div class="mb-3">
                  <div class="text-small text-muted">OBJET</div>
                  <div>{{ $demande->object }}</div>
                </div>
                <div class="mb-3">
                  <div class="text-small text-muted">DESCRIPTION</div>
                  <div>{{ $demande->description }}</div>
                </div>
                <div class="mb-3">
                  <div class="text-small text-muted">STATUT</div>
                  @if ($demande->status=='ACCEPTE')
                  <span class="badge bg-outline-info me-1">{{ $demande->status }}</span>
                  @elseif ($demande->status=='EN ATTENTE')
                  <span class="badge bg-outline-warning me-1">{{ $demande->status }}</span>
                  @else
                  <span class="badge bg-outline-success me-1">{{ $demande->status }}</span>
                  @endif  
                </div>                          
                <div class="mb-3">
                  <div class="text-small text-muted">DATE DE CREATION</div>
                  <div>{{ $demande->created_at }}</div>
                </div>
              </div>
              <div class="modal-footer border-0">
                <a href="{{ route('user.delete-demande', $demande->id) }}" class="btn btn-icon btn-icon-only btn-outline-danger">
                  <i data-acorn-icon="bin"></i>
              </a>
                <a
                  href="{{ route('user.show-demande', $demande->id) }}"
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
        <!-- demande Detail Modal End -->
        @endif
        @empty
            <div class="card mb-3">
              <div class="card-body">
                {{-- <h3 class="text-muted">Vous n'avez pas de demande!</h3> --}}
                <span>Vous n'avez pas encore créé de demande!</span>
              </div>
            </div>
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
            <li class="page-item next disabled">
              <a class="page page-link shadow" href="#">
                <i data-acorn-icon="chevron-right"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
  </div>
    <!-- Item List End -->
  @endsection
  @else
  @endif
@else 
  
@endif