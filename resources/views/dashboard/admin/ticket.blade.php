<div class="page-title-container mb-3">
    <div class="row">
      <!-- Title Start -->
      <div class="col mb-2">
        <a href="Dashboards.Patient.html" class="muted-link pb-1 d-inline-block breadcrumb-back">
            <i data-acorn-icon="chevron-left" data-acorn-size="13"></i>
            <span class="text-small align-middle">Home</span>
          </a>
        <h1 class="mb-2 pb-0 display-4" id="title">Tickets</h1>
      </div>
      <!-- Title End -->

      <!-- Top Buttons Start -->
      <div class="col-12 col-sm-auto d-flex align-items-center justify-content-end">
        <!-- Add New Button Start -->        
        <a href="#" class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto" data-bs-toggle="modal" data-bs-target="#ticketModal" data-bs-focus="false">
          <i data-acorn-icon="plus"></i>
          <span>Nouveau Ticket</span>
        </a>        
        <!-- Add New Button End -->
      </div>

      <!-- Create New Ticket Detail Modal Start -->
      <div class="modal modal-center fade" id="ticketModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">          
          <div class="modal-content">            
            <div class="modal-header">
              <h3 class="modal-title"><strong>Nouveau Ticket</strong></h3>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{ route('user.post-create-ticket') }}" method="POST" autocomplete="off">
                @csrf
                <div class="form-group row">
                    <label for="author_name" class="col-md-4 col-form-label text-md-right">Votre Nom</label>

                    <div class="mb-3">
                        <input id="author_name" type="text" class="form-control @error('author_name') is-invalid @enderror" name="author_name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>
                        @error('author_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="author_email" class="col-md-4 col-form-label text-md-right">Votre Email</label>

                    <div class="mb-3">
                        <input id="author_email" type="email" class="form-control @error('author_email') is-invalid @enderror" name="author_email" value="{{ Auth::user()->email }}" required autocomplete="email">
                        @error('author_email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label text-md-right">Type de demande</label>

                    <div class="mb-3">
                        {{-- <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title"> --}}

                        <select id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">
                            @foreach($TypesDeDemandes as $option)
                                <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                            <option value="autre">Autre</option>
                        </select>
                        {{-- <input type="text" name="valeur_personnalisee" id="valeur_personnalisee" placeholder="Saisir une valeur personnalisée"> --}}
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="content" class="col-md-4 col-form-label text-md-right">Description</label>

                    <div class="mb-3">
                        <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="3" required>{{ old('content') }}</textarea>
                        @error('content')
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
                href="{{ route('user.create-ticket') }}"
                class="btn btn-icon btn-icon-only btn-outline-primary"
                data-delay='{"show":"500", "hide":"0"}'
                data-bs-toggle="tooltip"
                data-bs-placement="top"
                title="Aller à"
              >
                <i data-acorn-icon="shortcut"></i>
              </a>
                </div>
            </form>  
            </div>
          </div>          
        </div>
      </div>
  <!-- Create New Ticket Detail Modal End -->


      <!-- Top Buttons End -->
    </div>
  </div>
  <!-- Title and Top Buttons End -->
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

    {{-- <div class="col-sm-12 col-md-7 col-lg-9 col-xxl-10 text-end mb-1">
      <!-- Status Button Start -->
      <div class="dropdown-as-select w-100 w-md-auto">
        <button
          class="btn btn btn-outline-primary w-100 w-md-auto dropdown-toggle"
          type="button"
          data-bs-toggle="dropdown"
          aria-haspopup="true"
          aria-expanded="false"
        ></button>
        <div class="dropdown-menu dropdown-menu-end">
          <a class="dropdown-item" href="#">Status: Solved</a>
          <a class="dropdown-item active" href="#">Status: Active</a>
        </div>
    </div> --}}
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
        
      @foreach ($tickets as $ticket)
      @if (Auth::user()->email==$ticket->author_email)
      <a href="#" class="card mb-2 sh-22 sh-md-8" data-bs-toggle="modal" data-bs-target="#imageModal{{ $ticket->id }}" data-bs-focus="false">
        <div class="card-body pt-0 pb-0 h-100">
          <div class="row g-0 h-100 align-content-center">
              <div class="col-11 col-md-2 d-flex align-items-center mb-1 mb-md-0 order-1 order-md-1">
                {{ $ticket->id }}
              </div>
            <div class="col-11 col-md-5 d-flex align-items-center mb-1 mb-md-0 order-1 order-md-1">            
                <i data-acorn-icon="file-text" class="sw-2 me-2 text-alternate" data-acorn-size="17"></i>
                <span class="align-middle">{{ $ticket->title }}</span>
            </div>
            <div class="col-12 col-md-3 d-flex align-items-center text-muted order-3 order-md-2">{{ $ticket->created_at }}</div>
            <div class="col-1 col-md-2 d-flex align-items-center text-muted text-medium justify-content-end order-2 order-md-3">
                <span class="badge rounded-pill bg-outline-primary">OUVERT</span>
            </div>
          </div>
        </div>
     </a>

     <!-- Ticket Detail Modal Start -->
      <div class="modal modal-center fade" id="imageModal{{ $ticket->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">#{{ $ticket->id }}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-4">
                <div class="text-small text-muted">TYPE DE DEMANDE</div>
                <div>{{ $ticket->title }}</div>
              </div>
              <div class="mb-3">
                <div class="text-small text-muted">OBSERVATION</div>
                <div>{{ $ticket->content }}</div>
              </div>
              <div class="mb-3">
                <div class="text-small text-muted">STATUT</div>
                <div>{{ $ticket->status }}</div>
              </div>          
              <div class="mb-3">
                <div class="text-small text-muted">AUTEUR</div>
                <div>{{ $ticket->author_name }}</div>
              </div>
              <div class="mb-3">
                <div class="text-small text-muted">EMAIL DE L'AUTEUR</div>
                <div>{{ $ticket->author_email }}</div>
              </div>
              <div class="mb-3">
                <div class="text-small text-muted">DATE DE CREATION</div>
                <div>{{ $ticket->created_at }}</div>
              </div>
            </div>
            <div class="modal-footer border-0">
              <a href="{{ route('user.delete-ticket', $ticket->id) }}" class="btn btn-icon btn-icon-only btn-outline-primary">
                <i data-acorn-icon="bin"></i>
            </a>
              <a
                href="{{ route('user.show-ticket', $ticket->id) }}"
                class="btn btn-icon btn-icon-only btn-outline-primary"
                data-delay='{"show":"500", "hide":"0"}'
                data-bs-toggle="tooltip"
                data-bs-placement="top"
                title="Voir"
              >
                <i data-acorn-icon="shortcut"></i>
              </a>
              {{-- <a href="#" class="btn btn-icon btn-icon-end btn-primary" data-bs-dismiss="modal">
                <span>Use</span>
                <i data-acorn-icon="check-square"></i>
              </a> --}}
            </div>
          </div>
        </div>
      </div>
  <!-- Ticket Detail Modal End -->
      @endif
      @endforeach

      {{-- <div id="checkboxTable" class="mb-5">
        <div class="mb-n2">
          <div class="card mb-2">
            <div class="row g-0 sh-14 sh-md-6">
              <div class="col">
                <div class="card-body pt-0 pb-0 px-4 h-100">
                  <div class="row g-0 h-100 align-content-center">
                    <div class="col-11 col-md-6 d-flex flex-column justify-content-center mb-1 mb-md-0 h-md-100 position-relative">
                      <a href="#" class="stretched-link body-link" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-focus="false">
                        <i data-acorn-icon="image" class="me-2 text-alternate" data-acorn-size="17"></i>
                        <span class="align-middle">product_23452_342.webp</span>
                      </a>
                    </div>
                    <div class="col-12 col-md-2 d-flex flex-column justify-content-center mb-md-0 order-4 ms-5 ms-md-0">
                      <div class="text-alternate">238.5 KB</div>
                    </div>
                    <div class="col-12 col-md-3 d-flex flex-column justify-content-center order-3 ms-5 ms-md-0">
                      <div class="text-alternate">12.04.2021</div>
                    </div>
                    <div class="col-1 col-md-1 d-flex flex-column justify-content-center order-2 order-md-last">
                      <div class="form-check d-flex flex-column justify-content-center align-items-end mb-0 pe-none">
                        <input type="checkbox" class="form-check-input ms-n2 mt-n3 ms-md-0 mt-md-0 me-0" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> --}}
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