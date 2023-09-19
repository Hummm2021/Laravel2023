@if (Auth::guard('web')->check())
<!-- demande Detail Modal Start -->
<div class="modal modal-center fade" id="demandeModal{{ $demande->id }}" tabindex="-1" role="dialog" aria-hidden="true">
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
        @if (Auth::user()->profile == 'utilisateur')
        <a href="{{ route('user.delete-demande', $demande->id) }}" class="btn btn-icon btn-icon-only btn-outline-danger">
          <i data-acorn-icon="bin"></i>
        </a>
        @endif
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
</div>  <!-- demande Detail Modal Start -->

  {{-- @include('layouts.demandeDetailModal') --}}
  <!-- demande Detail Modal End -->
@elseif(Auth::guard('admin')->check())
            <!-- demande Detail Modal Start -->
            <div class="modal modal-center fade" id="demandeModal{{ $demande->id }}" tabindex="-1" role="dialog" aria-hidden="true">
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
                      {{-- {{ $demande->user->name }} {{ $demande->user->surname }} --}}
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
                    <a href="{{ route('admin.delete-demande', $demande->id) }}" class="btn btn-icon btn-icon-only btn-outline-danger">
                      <i data-acorn-icon="bin"></i>
                  </a>
                    <a
                      href="{{ route('admin.show-demande', $demande->id) }}"
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
  <!-- demande Detail Modal Start -->
  {{-- @include('layouts.demandeDetailModal') --}}
  <!-- demande Detail Modal End -->
@endif