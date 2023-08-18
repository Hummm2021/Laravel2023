@extends('layouts.app')
@section('navbar')
<div class="row">
    <div class="col-12 col-lg-6">
      <!-- Stats Start -->
      <div class="d-flex">
        <div class="dropdown-as-select me-3" data-setActive="false" data-childSelector="span">
          <a class="pe-0 pt-0 align-top lh-1 dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
            <span class="small-title"></span>
          </a>
          <div class="dropdown-menu font-standard">
            <div class="nav flex-column" role="tablist">
              <a class="active dropdown-item text-medium" href="#" aria-selected="true" role="tab">Aujourd'hui</a>
              <a class="dropdown-item text-medium" href="#" aria-selected="false" role="tab">Cette semaine</a>
              <a class="dropdown-item text-medium" href="#" aria-selected="false" role="tab">Ce mois</a>
              <a class="dropdown-item text-medium" href="#" aria-selected="false" role="tab">Cette année</a>
            </div>
          </div>
        </div>
        <h2 class="small-title">Stats</h2>
      </div>
<!-- Stats Start -->

{{-- <div class="row g-2">
  <div class="col-12 p-0">
    <div class="glide glide-small" id="statsCarousel">
      <div class="glide__track" data-glide-el="track">
        <div class="glide__slides">
          <div class="glide__slide">
            <div class="card mb-5 sh-20 hover-border-primary">
              <div class="h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between">
                <div class="d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2">
                  <i data-acorn-icon="alarm" class="text-white"></i>
                </div>
                <p class="mb-0 lh-1">Tickets Ouverts</p>
                <p class="cta-3 mb-0 text-primary">25</p>
              </div>
            </div>
          </div>
          <div class="glide__slide">
            <div class="card mb-5 sh-20 hover-border-primary">
              <div class="h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between">
                <div class="d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2">
                  <i data-acorn-icon="navigate-diagonal" class="text-white"></i>
                </div>
                <p class="mb-0 lh-1">Shipped Orders</p>
                <p class="cta-3 mb-0 text-primary">48</p>
              </div>
            </div>
          </div>
          <div class="glide__slide">
            <div class="card mb-5 sh-20 hover-border-primary">
              <div class="h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between">
                <div class="d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2">
                  <i data-acorn-icon="check-circle" class="text-white"></i>
                </div>
                <p class="mb-0 lh-1">Delivered Orders</p>
                <p class="cta-3 mb-0 text-primary">53</p>
              </div>
            </div>
          </div>
          <div class="glide__slide">
            <div class="card mb-5 sh-20 hover-border-primary">
              <div class="h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between">
                <div class="d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2">
                  <i data-acorn-icon="arrow-bottom-left" class="text-white"></i>
                </div>
                <p class="mb-0 lh-1">Returned Orders</p>
                <p class="cta-3 mb-0 text-primary">4</p>
              </div>
            </div>
          </div>
          <div class="glide__slide">
            <div class="card mb-5 sh-20 hover-border-primary">
              <div class="h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between">
                <div class="d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2">
                  <i data-acorn-icon="warning-hexagon" class="text-white"></i>
                </div>
                <p class="mb-0 lh-1">Unconfirmed Orders</p>
                <p class="cta-3 mb-0 text-primary">3</p>
              </div>
            </div>
          </div>
          <div class="glide__slide">
            <div class="card mb-5 sh-20 hover-border-primary">
              <div class="h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between">
                <div class="d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2">
                  <i data-acorn-icon="pin" class="text-white"></i>
                </div>
                <p class="mb-0 lh-1">Missing Orders</p>
                <p class="cta-3 mb-0 text-primary">2</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> --}}
<!-- Stats Start -->
      <div class="mb-5">
        <div class="row g-2">
          <div class="col-12 col-sm-3 col-lg-3">
            <div class="card sh-20 hover-scale-up cursor-pointer hover-border-primary">
              <div class="h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between">
                  <div class="d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2">
                    <i data-acorn-icon="navigate-diagonal" class="text-white"></i>
                  </div>
                <p class="mb-0 lh-1">Tickets Ouverts</p>
                <p class="cta-3 mb-0 text-primary">48</p>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-3 col-lg-3">
            <div class="card sh-20 hover-scale-up cursor-pointer hover-border-primary">
              <div class="h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between">
                  <div class="d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2">
                    <i data-acorn-icon="check" class="text-white"></i>
                  </div>
                <p class="mb-0 lh-1">Tickets Confirmés</p>
                <p class="cta-3 mb-0 text-primary">48</p>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-3 col-lg-3">
            <div class="card sh-20 hover-scale-up cursor-pointer hover-border-primary">
              <div class="h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between">
                  <div class="d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2">
                    <i data-acorn-icon="alarm" class="text-white"></i>
                  </div>
                <p class="mb-0 lh-1">Tickets fermés</p>
                <p class="cta-3 mb-0 text-primary">48</p>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-3 col-lg-3">
            <div class="card sh-20 hover-scale-up cursor-pointer hover-border-primary">
              <div class="h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between">
                  <div class="d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2">
                    <i data-acorn-icon="sync-horizontal" class="text-white"></i>
                  </div>
                <p class="mb-0 lh-1">Total</p>
                <p class="cta-3 mb-0 text-primary">48</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Stats End -->

      <!-- Sales Start -->
      <h2 class="small-title">Sales</h2>
      <div class="card mb-5 sh-40">
        <div class="card-body">
          <div class="custom-legend-container mb-3 pb-3 d-flex flex-row"></div>
          <!-- Custom legend template used by js -->
          <template class="custom-legend-item">
            <a href="#" class="d-flex flex-row g-0 align-items-center me-5">
              <div class="pe-2">
                <div class="icon-container border sh-5 sw-5 rounded-xl d-flex justify-content-center align-items-center">
                  <i class="icon"></i>
                </div>
              </div>
              <div>
                <div class="text p mb-0 d-flex align-items-center text-small text-muted">Title</div>
                <div class="value cta-4">Value</div>
              </div>
            </a>
          </template>
          <!-- Custom Legend Template End -->
          <div class="sh-25">
            <canvas id="customLegendBarChart"></canvas>
            <!-- Custom tooltip template used by js -->
            <div
              class="custom-tooltip position-absolute bg-foreground rounded-md border border-separator pe-none p-3 d-flex z-index-1 align-items-center opacity-0 basic-transform-transition"
            >
              <div
                class="icon-container border d-flex align-middle align-items-center justify-content-center align-self-center rounded-xl sh-5 sw-5 rounded-xl me-3"
              >
                <span class="icon"></span>
              </div>
              <div>
                <span class="text d-flex align-middle text-muted align-items-center text-small">Bread</span>
                <span class="value d-flex align-middle align-items-center cta-4">300</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Sales End -->
    </div>

    <!-- Products Start -->
    <div class="col-12 col-lg-6 mb-5">
      <div class="d-flex justify-content-between">
        <h2 class="small-title">Stocks</h2>
        <button class="btn btn-icon btn-icon-end btn-xs btn-background-alternate p-0 text-small" type="button">
          <span class="align-bottom">View More</span>
          <i data-acorn-icon="chevron-right" class="align-middle" data-acorn-size="12"></i>
        </button>
      </div>
      <div class="scroll-out">
        <div class="scroll-by-count" data-count="8">                    
          <div class="card mb-2 sh-10 sh-md-8">
            <div class="card-body pt-0 pb-0 h-100">
              <div class="row g-0 h-100 align-content-center">
                <div class="col-4 col-md-1 d-flex align-items-center mb-2 mb-md-0 ">
                  #{{-- #{{ $ticket->id }} --}}
                </div>
                <div class="col-8 col-md-4 d-flex align-items-center mb-2 mb-md-0">
                  <a href="Pages.Portfolio.Detail.html" class="body-link text-truncate">Biscotti</a>
                </div>
                <div class="col-4 col-md-2 d-flex align-items-center text-muted text-medium mb-1 mb-md-0">
                  <span class="badge bg-outline-secondary me-1">TREND</span>
                </div>
                <div class="col-4 col-md-3 d-flex align-items-center text-medium text-success justify-content-center">
                  <i data-acorn-icon="arrow-top" data-acorn-size="14" class="me-1"></i>
                  <span class="text-medium">+2.3%</span>
                </div>
                <div class="col-4 col-md-2 d-flex align-items-center justify-content-end text-muted text-medium">
                  <span class="badge bg-outline-secondary me-1">TREND</span>
                </div>  
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Products End -->
</div>
@endsection
