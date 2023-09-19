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