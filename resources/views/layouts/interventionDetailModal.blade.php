@if (Auth::guard('web')->check())
    <!-- intervention Detail Modal Start -->
<div class="modal modal-center fade" id="imageModal{{ $intervention->id }}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-object">#{{ $intervention->id }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <div class="text-small text-muted">TYPE D'INTERVENTION</div>
          <div>{{ $intervention->type_depannage }}</div>
        </div>
        <div class="mb-3">
          <div class="text-small text-muted">STATUT</div>
          <div>
            @if ($intervention->status=='EN COURS')
            <span class="badge bg-outline-warning me-1">{{ $intervention->status }}</span>
            @elseif ($intervention->status=='RESOLU')
            <span class="badge bg-outline-success me-1">{{ $intervention->status }}</span>
            @else
            <span class="badge bg-outline-danger me-1">{{ $intervention->status }}</span>
            @endif  
          </div>
          
        </div>
        <div class="mb-3">
          <div class="text-small text-muted">NATURE DU PROBLEME</div>
          <div>{{ $intervention->nature_probleme }}</div>
        </div>
        <div class="mb-3">
          <div class="text-small text-muted">OPERATION EFFECTUÉE</div>
          <div>{{ $intervention->operation_effectuee }}</div>
        </div>          
        <div class="mb-3">
          <div class="text-small text-muted">INTERVENANT</div>
          <div>{{ $intervention->user->name }} {{ $intervention->user->surname }}</div>
        </div>
        <div class="mb-3">
          <div class="text-small text-muted">EMAIL DE L'AUTEUR</div>
          <div>{{ $intervention->user->email }}</div>
        </div>
        <div class="mb-3">
          <div class="text-small text-muted">DATE DE CREATION</div>
          <div>{{ $intervention->created_at }}</div>
        </div>
      </div>
     
      <div class="modal-footer border-0">
        @if (Auth::user()->profile == 'technicien')
        <a href="{{ route('user.delete-intervention', $intervention->id) }}" class="btn btn-icon btn-icon-only btn-outline-danger">
          <i data-acorn-icon="bin"></i>
        </a>
        <a href="#" class="btn btn-icon btn-icon-only btn-outline-info  w-md-auto" data-bs-toggle="modal" data-bs-target="#EditInterventionModal{{ $intervention->id }}" data-bs-focus="false">
          <i data-acorn-icon="edit"></i>
          {{-- <span>Ajouter</span> --}}
        </a>    
        @endif
        <a
        href="{{ route('user.show-demande', $intervention->demande->id) }}"
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
<!-- intervention Detail Modal End -->

@else
    <!-- intervention Detail Modal Start -->
<div class="modal modal-center fade" id="imageModal{{ $intervention->id }}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-object">#{{ $intervention->id }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <div class="text-small text-muted">TYPE D'INTERVENTION</div>
          <div>{{ $intervention->type_depannage }}</div>
        </div>
        <div class="mb-3">
          <div class="text-small text-muted">STATUT</div>
          <div>
            @if ($intervention->status=='EN COURS')
            <span class="badge bg-outline-warning me-1">{{ $intervention->status }}</span>
            @elseif ($intervention->status=='RESOLU')
            <span class="badge bg-outline-success me-1">{{ $intervention->status }}</span>
            @else
            <span class="badge bg-outline-danger me-1">{{ $intervention->status }}</span>
            @endif  
          </div>
          
        </div>
        <div class="mb-3">
          <div class="text-small text-muted">NATURE DU PROBLEME</div>
          <div>{{ $intervention->nature_probleme }}</div>
        </div>
        <div class="mb-3">
          <div class="text-small text-muted">OPERATION EFFECTUÉE</div>
          <div>{{ $intervention->operation_effectuee }}</div>
        </div>          
        <div class="mb-3">
          <div class="text-small text-muted">INTERVENANT</div>
          <div>{{ $intervention->user->name }} {{ $intervention->user->surname }}</div>
        </div>
        <div class="mb-3">
          <div class="text-small text-muted">EMAIL DE L'AUTEUR</div>
          <div>{{ $intervention->user->email }}</div>
        </div>
        <div class="mb-3">
          <div class="text-small text-muted">DATE DE CREATION</div>
          <div>{{ $intervention->created_at }}</div>
        </div>
      </div>
      <div class="modal-footer border-0">
        <a href="{{ route('admin.delete-intervention', $intervention->id) }}" class="btn btn-icon btn-icon-only btn-outline-danger">
          <i data-acorn-icon="bin"></i>
        </a>
        <a href="#" class="btn btn-icon btn-icon-only btn-outline-info  w-md-auto" data-bs-toggle="modal" data-bs-target="#EditInterventionModal{{ $intervention->id }}" data-bs-focus="false">
          <i data-acorn-icon="edit"></i>
          {{-- <span>Ajouter</span> --}}
        </a>    
        <a
        href="{{ route('admin.show-demande', $intervention->demande->id) }}"
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
<!-- intervention Detail Modal End -->

@endif