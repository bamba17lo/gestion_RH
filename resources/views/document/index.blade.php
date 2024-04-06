@extends('layouts.template')

@section('content')
<nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
    <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">Documents Attestions </a>
    <a class="flex-sm-fill text-sm-center nav-link"  id="orders-paid-tab" data-bs-toggle="tab" href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false">Documents Contrats</a>
    {{-- <a class="flex-sm-fill text-sm-center nav-link" id="orders-pending-tab" data-bs-toggle="tab" href="#orders-pending" role="tab" aria-controls="orders-pending" aria-selected="false">Pending</a>
    <a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab" data-bs-toggle="tab" href="#orders-cancelled" role="tab" aria-controls="orders-cancelled" aria-selected="false">Cancelled</a> --}}
</nav>

<div class="tab-content" id="orders-table-tab-content">
    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
        
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">My Docs</h1>
                    </div>
                    
                </div><!--//row-->
                
                @foreach ($attestation as $value )
                    
               
                    <div class="col-6 col-md-4 col-xl-3 col-xxl-2">
                        <div class="app-card app-card-doc shadow-sm h-100">
                            <div class="app-card-thumb-holder p-3">
                                <span class="icon-holder">
                                    <i class="fas fa-file-pdf pdf-file"></i>
                                </span>
                                 <a class="app-card-link-mask" href="/storage/{{ $value->attestation}}"></a>
                            </div>
                            <div class="app-card-body p-3 has-card-actions">
                                
                                <h4 class="app-doc-title truncate mb-0"><a href="#file-link">{{$value->user->nom_prenom}}</a></h4>
                                <div class="app-doc-meta">
                                    <ul class="list-unstyled mb-0">
                                        <li><span class="text-muted">Email:</span> {{$value->user->email}}</li>
                                        <li><span class="text-muted">Département:</span> {{$value->user->donnee_professionnelle->departement->libelle}}</li>
                                    </ul>
                                </div><!--//app-doc-meta-->
                                
                            </div>
                        </div>
                    </div>
                    @endforeach
            </div>
        </div>
<nav class="pagination mt-4 ">
    {{ $attestation->links()}}
</nav><!--//app-pagination-->
        
    </div><!--//tab-pane-->

    {{-- ---------------------------------------------------------------------------- --}}

    <div class="tab-pane fade" id="orders-paid" role="tabpanel" aria-labelledby="orders-paid-tab">
        <div class="app-card app-card-orders-table mb-5">
            <div class="app-content pt-3 p-md-3 p-lg-4">
                <div class="container-xl">
                    <div class="row g-3 mb-4 align-items-center justify-content-between">
                        <div class="col-auto">
                            <h1 class="app-page-title mb-0">My Docs</h1>
                        </div>
                        
                    </div><!--//row-->
                    
                    @foreach ($contrat as $value )
                        
                   
                        <div class="col-6 col-md-4 col-xl-3 col-xxl-2">
                            <div class="app-card app-card-doc shadow-sm h-100">
                                <div class="app-card-thumb-holder p-3">
                                    <span class="icon-holder">
                                        <i class="fas fa-file-pdf pdf-file"></i>
                                    </span>
                                     <a class="app-card-link-mask" href="/storage/{{ $value->contrat}}"></a>
                                </div>
                                <div class="app-card-body p-3 has-card-actions">
                                    
                                    <h4 class="app-doc-title truncate mb-0"><a href="#file-link">{{$value->user->nom_prenom}}</a></h4>
                                    <div class="app-doc-meta">
                                        <ul class="list-unstyled mb-0">
                                            <li><span class="text-muted">Email:</span> {{$value->user->email}}</li>
                                            <li><span class="text-muted">Département:</span> {{$value->user->donnee_professionnelle->departement->libelle}}</li>
                                        </ul>
                                    </div><!--//app-doc-meta-->
                                    
                                </div>
                            </div>
                        </div>
                        @endforeach
                </div>
            </div>
            <nav class="pagination mt-4 ">
                {{ $contrat->links()}}
            </nav><!--//app-pagination-->	
        </div><!--//app-card-->
    </div><!--//tab-pane-->


	    
    
    
@endsection