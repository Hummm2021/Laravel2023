@extends('layouts.app')
@section('navbar')
<div class="row justify-content-center">

  <div class="col-8 col-xxl-4  mb-4">
    <!-- Activity Start -->
    <h2 class="small-title">Activités</h2>
    <div class="card mb-4">
      <div class="card-body">
        <div class="row g-0">
          <div class="col-auto sw-1 d-flex flex-column justify-content-center align-items-center position-relative me-4">
            <div class="w-100 d-flex sh-1"></div>
            <div class="rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center">
              <div class="bg-gradient-light sw-1 sh-1 rounded-xl position-relative"></div>
            </div>
            <div class="w-100 d-flex h-100 justify-content-center position-relative">
              <div class="line-w-1 bg-separator h-100 position-absolute"></div>
            </div>
          </div>
          <div class="col mb-4">
            <div class="h-100">
              <div class="d-flex flex-column justify-content-start">
                <div class="d-flex flex-column">
                  <a href="#" class="heading stretched-link">Envoyé</a>
                  <div class="text-alternate">{{ $demande->created_at}}</div>
                  <div class="text-alternate">{{ $demande->object}}</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row g-0">
          <div class="col-auto sw-1 d-flex flex-column justify-content-center align-items-center position-relative me-4">
            <div class="w-100 d-flex sh-1 position-relative justify-content-center">
              <div class="line-w-1 bg-separator h-100 position-absolute"></div>
            </div>
            <div class="rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center">
              <div class="bg-gradient-light sw-1 sh-1 rounded-xl position-relative"></div>
            </div>
            <div class="w-100 d-flex h-100 justify-content-center position-relative">
              <div class="line-w-1 bg-separator h-100 position-absolute"></div>
            </div>
          </div>
          <div class="col mb-4">
            <div class="h-100">
              <div class="d-flex flex-column justify-content-start">
                <div class="d-flex flex-column">
                  <a href="#" class="heading stretched-link">Répondu</a>
                  <div class="text-alternate">
                    @forelse ($interventions as $intervention)
                        {{ $intervention->created_at }}
                        @break
                    @empty
                        Il n'y a pas encore eu de réponse.
                    @endforelse
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row g-0">
          <div class="col-auto sw-1 d-flex flex-column justify-content-center align-items-center position-relative me-4">
            <div class="w-100 d-flex sh-1 position-relative justify-content-center">
              <div class="line-w-1 bg-separator h-100 position-absolute"></div>
            </div>
            <div class="rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center">
              <div class="bg-gradient-light sw-1 sh-1 rounded-xl position-relative"></div>
            </div>
            <div class="w-100 d-flex h-100 justify-content-center position-relative"></div>
          </div>
          <div class="col">
            <div class="h-100">
              <div class="d-flex flex-column justify-content-start">
                <div class="d-flex flex-column">
                  <a href="#" class="heading stretched-link pt-0">Résolu</a>
                  <div class="text-alternate">
                    @forelse ($interventions as $intervention)
                        {{ $intervention->updated_at }}
                        @break
                    @empty
                        Pas encore résolue.
                    @endforelse
                  </div>
                  <div class="text-muted mt-1">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Activity End -->


  </div>
  <div class="col-8 col-xxl-4 mb-4">
      <!-- demande Details Start -->
      <h2 class="small-title"> #{{ $demande->id }} | Demande </h2>
      <div class="card ">
        <div class="card-body">
          <div class="">
            <div class="mb-4">
              <div class="text-small text-muted">AUTEUR</div>
              <div>{{ $demande->user->name }} {{ $demande->user->surname }}</div>
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
          <div class="mb-2 d-flex justify-content-center align-items-center">
            <a href="#" class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto" data-bs-toggle="modal" data-bs-target="#interventionModal" data-bs-focus="false">
              {{-- <i data-acorn-icon="bi-reply-fill"></i>
              <i class="bi bi-reply"></i> --}}
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-reply" viewBox="0 0 16 16">
                <path d="M6.598 5.013a.144.144 0 0 1 .202.134V6.3a.5.5 0 0 0 .5.5c.667 0 2.013.005 3.3.822.984.624 1.99 1.76 2.595 3.876-1.02-.983-2.185-1.516-3.205-1.799a8.74 8.74 0 0 0-1.921-.306 7.404 7.404 0 0 0-.798.008h-.013l-.005.001h-.001L7.3 9.9l-.05-.498a.5.5 0 0 0-.45.498v1.153c0 .108-.11.176-.202.134L2.614 8.254a.503.503 0 0 0-.042-.028.147.147 0 0 1 0-.252.499.499 0 0 0 .042-.028l3.984-2.933zM7.8 10.386c.068 0 .143.003.223.006.434.02 1.034.086 1.7.271 1.326.368 2.896 1.202 3.94 3.08a.5.5 0 0 0 .933-.305c-.464-3.71-1.886-5.662-3.46-6.66-1.245-.79-2.527-.942-3.336-.971v-.66a1.144 1.144 0 0 0-1.767-.96l-3.994 2.94a1.147 1.147 0 0 0 0 1.946l3.994 2.94a1.144 1.144 0 0 0 1.767-.96v-.667z"/>
              </svg>
              <span class="text-medium">Répondre</span>
            </a>  
            <a href="#" class="btn btn-icon btn-icon-only btn-outline-info mx-3 px-3  w-md-auto" data-bs-toggle="modal" data-bs-target="#EditDemandeModal{{ $demande->id }}" data-bs-focus="false" >
                <i data-acorn-icon="edit"></i>
                {{-- class="btn btn-outline-info btn-icon btn-icon-start w-100 w-md-auto mx-3" --}}
                <span class="text-medium">Editer</span>
            </a>
    
            <a href="{{ route('admin.delete-demande', $demande->id) }}" class="btn btn-outline-danger btn-icon btn-icon-start w-100 w-md-auto">
                <i data-acorn-icon="bin"></i>
                <span class="text-medium">Annuler</span>
            </a>
            {{-- <a href="#" class="btn btn-icon btn-icon-only btn-outline-info w-100 w-md-auto" data-bs-toggle="modal" data-bs-target="#EditInterventionModal{{ $intervention->id }}" data-bs-focus="false">
              <i data-acorn-icon="edit"></i>
            </a>  --}}
          </div>                 
        </div>
      </div>
      <!-- demande Details End -->

      <!-- Edit demande Modal Start -->
      <div class="modal modal-center fade" id="EditDemandeModal{{ $demande->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-object">#{{ $demande->id }}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.update-demande', $demande->id) }}" method="POST" autocomplete="off">
              @csrf
              <div class="modal-body">
                <div class="mb-3">
                  <label class="form-label">Auteur</label>
                  <input type="text" class="form-control" id="author_name" value="{{ $demande->user->name }} {{ $demande->user->surname }}" disabled/>                  
                </div>

                <div class="mb-3">
                  <label class="form-label">Statut</label>
                  @if ($demande->status=='ACCEPTE')
                  <span class="badge bg-outline-info me-1">{{ $demande->status }}</span>
                  @elseif ($demande->status=='EN ATTENTE')
                  <span class="badge bg-outline-warning me-1">{{ $demande->status }}</span>
                  @else
                  <span class="badge bg-outline-success me-1">{{ $demande->status }}</span>
                  @endif  
                  <select type="text" class="form-control" name="status" id="status" default="{{ $demande->status }}">
                    <option value="ACCEPTE">ACCEPTE</option>
                    <option value="EN ATTENTE">EN ATTENTE</option>
                    <option value="RESOLUE">RESOLUE</option>
                  </select>                  
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Objet</label>
                    <select id="object" type="text" class="form-control  @error('object') is-invalid @enderror" name="object" value="{{ old('object') }}">
                      <option value="Problème de connexion au réseau Wi-Fi">Problème de connexion au réseau Wi-Fi</option>
                      <option value="Erreur lors de l'installation d'un logiciel sur mon ordinateur">Erreur lors de l'installation d'un logiciel sur mon ordinateur</option>
                      <option value="Imprimante qui ne répond pas aux commandes d'impression">Imprimante qui ne répond pas aux commandes d'impression</option>
                      <option value="Problème de son sur mon ordinateur portable">Problème de son sur mon ordinateur portable</option>
                      <option value="Impossible d'accéder à un site web spécifique">Impossible d'accéder à un site web spécifique</option>
                      <option value="Problème de performance avec mon application mobile">Problème de performance avec mon application mobile</option>
                      <option value="Message d'erreur \'disque dur plein\' sur mon ordinateur">Message d'erreur "disque dur plein" sur mon ordinateur</option>
                      <option value="Problème avec la synchronisation des données sur mes appareils">Problème avec la synchronisation des données sur mes appareils</option>
                      <option value="Besoin d'aide pour configurer un VPN sur mon routeur">Besoin d'aide pour configurer un VPN sur mon routeur</option>
                      <option value="Autre">Autres (à préciser) </option>
                    </select>
                </div>    

                <div class="mb-3">
                  <label class="form-label" for="description">Description du problème</label>
                  <input type="text" name="description" id="description" class="form-control" value="{{ $demande->description }}" rows="2" />
                </div>
              </div>            
              <div class="modal-footer border-0">
                <button type="submit" class="btn btn-icon btn-icon-only btn-outline-info">
                  <i data-acorn-icon="save"></i>
                </button>
                {{-- <a href="{{ route('user.delete-demande', $demande->id) }}" class="btn btn-icon btn-icon-only btn-outline-danger">
                  <i data-acorn-icon="bin"></i>
                </a>                         --}}
              </div>
              </form>
          </div>
        </div>
      </div>  
      <!-- Edit demande Detail Modal Start -->

      <!-- demande Answer Start -->
      {{-- <div class="card">
        <div class="card-body">
          <div class="mb-3 filled custom-control-container editor-container">
            <div class="html-editor sh-16" id="quillEditorFilledEmail"></div>
            <i data-acorn-icon="notebook-1"></i>
          </div>
          <button class="btn btn-icon btn-icon-end btn-outline-primary" type="button">
            <span>Send</span>
            <i data-acorn-icon="send"></i>
          </button>
          <button type="button" class="btn btn-outline-primary btn-icon btn-icon-only me-1">
            <i data-acorn-icon="attachment"></i>
          </button>
        </div>
      </div> --}}
      <!-- demande Answer End -->
  </div>

  <!-- Intervention Start -->
  <div class="col-8 col-lg-4 mb-4">    
      <div class="d-flex justify-content-between">
        <h2 class="small-title">Interventions</h2>
        {{-- <button class="btn btn-icon btn-icon-end btn-xs btn-background-alternate p-0 text-small" type="button">
          <a href="{{ route('admin.intervention') }}" class="align-bottom">Voir Plus</a>
          <i data-acorn-icon="chevron-right" class="align-middle" data-acorn-size="12"></i>
        </button> --}}
      </div>
      <div class="scroll-out">
        <div class="scroll-by-count" data-count="8">                                        
          @forelse ($interventions as $intervention)
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
              <span>Aucune intervention n'a encore été lancée pour cette demande.</span>
          @endforelse
          
        </div>
      </div>  
  </div>
  @foreach ($interventions as $intervention)
  @include('layouts.interventionDetailModal')
    <!-- Edit intervention Modal Start -->
    <div class="modal modal-center fade" id="EditInterventionModal{{ $intervention->id }}" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-object">#{{ $intervention->id }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="{{ route('admin.update-intervention', $intervention->id) }}" method="POST" autocomplete="off">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                  <div class="text-small text-muted">INTERVENANT</div>
                  <select name="user_id" type="text" id="user_id" class="form-control" value="{{ $intervention->user->id }}">
                    @foreach($intervenants as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} {{ $user->surname }}</option>
                    @endforeach
                  </select>
                </div> 
                <div class="mb-3">
                  <div class="text-small text-muted">TYPE D'INTERVENTION</div>
                  {{-- <input type="text" class="form-control" id="title" value="{{ $intervention->type_depannage }}" /> --}}
                  <select id="type_depannage" type="text" class="form-control @error('type_depannage') is-invalid @enderror" name="type_depannage" value="{{ $intervention->type_depannage }}">
                    <option value="Installation de matériel">Installation de matériel</option>
                    <option value="Installation de Logiciel">Intallation de Logiciel</option>
                    <option value="Dépannage Réseau">Dépannage Réseau</option>
                    <option value="Dépannage Matériel">Dépannage Matériel</option>
                    <option value="Problème de messagérie">Problème de messagérie</option>
                    <option value="Configuration Matériel">Configuration Matériel</option>
                    <option value="autre">Autres (à préciser) </option>
                  </select>
                </div>
                <div class="mb-3">
                  <div class="text-small text-muted">STATUT</div>
                    @if ($intervention->status=='EN COURS')
                    <span class="badge bg-outline-warning me-1">{{ $intervention->status }}</span>
                    @elseif ($intervention->status=='RESOLU')
                    <span class="badge bg-outline-success me-1">{{ $intervention->status }}</span>
                    @else
                    <span class="badge bg-outline-danger me-1">{{ $intervention->status }}</span>
                    @endif 
                    <select name="status" type="text" id="status" class="form-control">
                      <option value="EN COURS">EN COURS</option>
                      <option value="RESOLU">RESOLU</option>
                      <option value="NON RESOLU">NON RESOLU</option>              
                    </select>                   
                </div>
                <div class="mb-3">
                  <div class="text-small text-muted">NATURE DU PROBLEME</div>
                  <input type="text" name="nature_probleme" class="form-control" id="nature_probleme" value="{{ $intervention->nature_probleme }}" />
                </div>
                <div class="mb-3">
                  <div class="text-small text-muted">OPERATION EFFECTUÉE</div>
                  <input type="text" name="operation_effectuee" class="form-control" id="operation_effectuee" value="{{ $intervention->operation_effectuee }}" />
                </div>                                            
              </div>
              <div class="modal-footer border-0">
                <button type="submit" class="btn btn-icon btn-icon-only btn-outline-info">
                  <i data-acorn-icon="save"></i>
                </button>                                                       
              </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Edit intervention Modal End -->
  @endforeach
  <!-- Intervention Start -->

          <!-- Create New intervention Modal Start -->
          <div class="modal modal-center fade" id="interventionModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">          
              <div class="modal-content">            
                <div class="modal-header">
                  <h3 class="modal-title"><strong>Nouvelle intervention</strong></h3>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('admin.post-create-intervention') }}" method="POST" autocomplete="off">
                    @csrf  
                    <div>
                      <select name="demande_id"  type="text" id="demande_id" class="form-control" value="{{ old('demande_id') }}" hidden>                            
                            <option value="{{ $demande->id }}" >#{{ $demande->id }}| {{ $demande->object }}</option>
                      </select>
                    </div>
  
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Intervenant</label>                      
  
                        <div class="mb-2">
                          <select name="user_id" type="text" id="user_id" class="form-control" value="{{ old('user_id') }}">
                            @foreach($intervenants as $user)
                                <option value="{{ $user->id }}">{{ $user->name }} {{ $user->surname }}</option>
                            @endforeach
                          </select>
                        </div>
                    </div>
  
                    <div class="form-group row">
                        <label for="type_depannage" class="col-md-4 col-form-label text-md-right">Type de dépannage</label>
  
                        <div class="mb-2">                          
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
  
                        <div class="mb-2">
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
  
                      <div class="mb-2">
                          <textarea class="form-control @error('operation_effectuee') is-invalid @enderror" id="operation_effectuee" name="operation_effectuee" rows="2" required>{{ old('operation_effectuee') }}</textarea>
                          @error('operation_effectuee')
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
                    </div>
                </form>  
                </div>
              </div>          
            </div>
          </div>
          <!-- Create New intervention Modal End -->
</div>
@endsection