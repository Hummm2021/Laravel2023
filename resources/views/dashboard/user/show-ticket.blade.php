@extends('layouts.apps')
@section('navbar')
<div class="row">
    <div class="col-12 col-xxl-8 mb-5 mb-xxl-0">
      <!-- Ticket Details Start -->
      <h2 class="small-title"> #{{ $ticket->id }} | {{ $ticket->title }} </h2>
      <div class="card mb-2">
        <div class="card-body">
        <form action="{{ route('user.update-ticket', $ticket->id) }}" method="POST">
          @csrf        
            <div class="mb-4 pb-4 border-bottom border-separator-light">
                <div class="mb-3">
                  <label class="form-label">Auteur</label>
                  <input type="text" class="form-control" id="author_name" value="{{ $ticket->author_name }}" />                  
                </div>

                <div class="mb-3">
                  <label class="form-label">Email</label>
                  <input type="text" class="form-control" id="author_email" value="{{ $ticket->author_email }}" />                  
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Type de demande</label>
                    <select id="title" type="text" class="form-control  @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">
                        @foreach($TypesDeDemandes as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>                
                {{-- <div class="mb-3">
                    <label class="form-label">Statut </label>
                    <input type="text" class="form-control" value="{{ $ticket->status }}" />
                    <span class="badge rounded-pill bg-outline-primary">{{ $ticket->status }}</span>
                </div> --}}
                <div class="mb-3">
                  <label class="form-label">Observation</label>
                  <input type="text" id="content" class="form-control" value="{{ $ticket->content }}" />
                </div>
            </div>            
            <div class="modal-footer border-0">
                <button type="submit" class="btn btn-icon btn-icon-only btn-outline-primary">
                    <i data-acorn-icon="save"></i>
                </button>
                
                <a href="{{ route('user.delete-ticket', $ticket->id) }}" class="btn btn-icon btn-icon-only btn-outline-primary">
                    <i data-acorn-icon="bin"></i>
                </a>
            </div>                                  
        </form>          
        </div>
      </div>
      <!-- Ticket Details End -->

      <!-- Ticket Answer Start -->
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
      <!-- Ticket Answer End -->
    </div>

    <div class="col-12 col-xxl-4 mb-n5">
      <!-- Activity Start -->
      <h2 class="small-title">Activité</h2>
      <div class="card mb-5">
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
                    <a href="#" class="heading stretched-link">Ticket Ouvert</a>
                    <div class="text-alternate">{{ $ticket->created_at}}</div>
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
                    <a href="#" class="heading stretched-link">Mise à jour</a>
                    <div class="text-alternate">{{ $ticket->updated_at }}</div>
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
                    <a href="#" class="heading stretched-link pt-0">Fermé</a>
                    <div class="text-alternate">- - -</div>
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
  </div>
@endsection