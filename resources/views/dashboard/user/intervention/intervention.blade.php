{{-- @if (Auth::guard('user')->check())     --}}
    @extends('layouts.apps')
    @section('navbar')
    <div class="page-title-container mb-3">
      <div class="row">
        <!-- object Start -->
        <div class="col mb-2">
          <a href="{{route('user.home')}}" class="muted-link pb-1 d-inline-block breadcrumb-back">
              <i data-acorn-icon="chevron-left" data-acorn-size="13"></i>
              <span class="text-small align-middle">Accuiel</span>
            </a>
          <h1 class="mb-2 pb-0 display-4" id="object">interventions</h1>
        </div>
        <!-- object End -->

        <!-- Top Buttons Start -->
        <div class="col-12 col-sm-auto d-flex align-items-center justify-content-end">
          <!-- Add New Button Start -->        
          <a href="#" class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto" data-bs-toggle="modal" data-bs-target="#interventionModal" data-bs-focus="false">
            <i data-acorn-icon="plus"></i>
            <span>Ajouter</span>
          </a>        
          <!-- Add New Button End -->
        </div>

        <!-- Create New intervention Detail Modal Start -->
        <div class="modal modal-center fade" id="interventionModal" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">          
            <div class="modal-content">            
              <div class="modal-header">
                <h3 class="modal-title"><strong>Nouvelle intervention</strong></h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="{{ route('user.post-create-intervention') }}" method="POST" autocomplete="off">
                  @csrf
                  <div class="form-group row">
                      <label class="col-md-4 col-form-label text-md-right">Demande</label>

                      <div class="mb-3">
                        <select name="demande_id" type="text" id="demande_id" class="form-control" value="{{ old('demande_id') }}">
                          @foreach($demandes as $demande)
                              <option value="{{ $demande->id }}">#{{ $demande->id }}| {{ $demande->object }}</option>
                          @endforeach
                        </select>
                      </div>
                  </div>

                  <div class="form-group row">
                      <label class="col-md-4 col-form-label text-md-right">Intervenant</label>                      

                      <div class="mb-3">
                        <select name="user_id" type="text" id="user_id" class="form-control" value="{{ old('user_id') }}">
                          @foreach($intervenants as $user)
                              <option value="{{ $user->id }}">{{ $user->name }} {{ $user->surname }}</option>
                          @endforeach
                        </select>
                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="type_depannage" class="col-md-4 col-form-label text-md-right">Type de dépannage</label>

                      <div class="mb-3">                          
                          <select id="type_depannage" type="text" class="form-control @error('type_depannage') is-invalid @enderror" name="type_depannage" value="{{ old('type_depannage') }}">
                              <option value="Installation de matériel">Installation de matériel</option>
                              <option value="Installation de Logiciel">Intallation de Logiciel</option>
                              <option value="Dépannage Réseau">Dépannage Réseau</option>
                              <option value="Dépannage Matériel">Dépannage Matériel</option>
                              <option value="Problème de messagérie">Problème de messagérie</option>
                              <option value="Configuration Matériel">Configuration Matériel</option>
                              <option value="autre">Autres (à préciser) </option>
                          </select>
                          @error('type_depannage')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="nature_probleme" class="col-md-4 col-form-label text-md-right">Nature du problème</label>

                      <div class="mb-3">
                          <textarea class="form-control @error('nature_probleme') is-invalid @enderror" id="nature_probleme" name="nature_probleme" rows="2" required>{{ old('nature_probleme') }}</textarea>
                          @error('nature_probleme')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                    <label for="operation_effectuee" class="col-md-4 col-form-label text-md-right">Opération effectuée</label>

                    <div class="mb-3">
                        <textarea class="form-control @error('operation_effectuee') is-invalid @enderror" id="operation_effectuee" name="operation_effectuee" rows="2" required>{{ old('operation_effectuee') }}</textarea>
                        @error('operation_effectuee')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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
      <!-- Create New intervention Detail Modal End -->


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
                    <div class="col-6 col-md-5 d-flex align-items-center text-alternate text-medium text-muted text-small">TYPE D'INTERVENTION</div>
                    <div class="col-6 col-md-3 d-flex align-items-center text-alternate text-medium text-muted text-small">DATE</div>
                    <div class="col-6 col-md-2 d-flex align-items-center justify-content-md-end text-alternate text-medium text-muted text-small">
                      STATUT
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
            
          @forelse ($interventions as $intervention)
          {{-- @if (Auth::user()->email==$intervention->author_email) --}}
          <a href="#" class="card mb-2 sh-22 sh-md-8" data-bs-toggle="modal" data-bs-target="#imageModal{{ $intervention->id }}" data-bs-focus="false">
            <div class="card-body pt-0 pb-0 h-100">
              <div class="row g-0 h-100 align-content-center">
                  <div class="col-11 col-md-2 d-flex align-items-center mb-1 mb-md-0 order-1 order-md-1">
                    {{ $intervention->id }}
                  </div>
                <div class="col-11 col-md-5 d-flex align-items-center mb-1 mb-md-0 order-1 order-md-1">            
                    <i data-acorn-icon="file-text" class="sw-2 me-2 text-alternate" data-acorn-size="17"></i>
                    <span class="align-middle">{{ $intervention->type_depannage }}</span>
                </div>
                <div class="col-12 col-md-3 d-flex align-items-center text-muted order-3 order-md-2">{{ $intervention->created_at }}</div>
                <div class="col-1 col-md-2 d-flex align-items-center text-muted text-medium justify-content-end order-2 order-md-3">
                    {{-- <span class="badge rounded-pill bg-outline-primary">{{ $intervention->status }}</span> --}}
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

          @include('layouts.interventionDetailModal')
            {{-- @endif --}}              
          @empty
          <span>Aucune intervention n'a encore été lancée pour cette demande.</span>
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
  {{-- @endif --}}