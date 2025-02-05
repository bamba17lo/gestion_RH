@extends('layouts.template')
@section('content')
    
<h1 class="app-page-title">Dashboard</h1>
			    

    
<div class="row g-4 mb-4">
    <div class="col-6 col-lg-3">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">Total Departement</h4>
                <div class="stats-figure">0</div>

            </div><!--//app-card-body-->
            <a class="app-card-link-mask" href=""></a>
        </div><!--//app-card-->
    </div><!--//col-->
    
    <div class="col-6 col-lg-3">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">Total Employes</h4>
                <div class="stats-figure">0</div>

            </div><!--//app-card-body-->
            <a class="app-card-link-mask" href=""></a>
        </div><!--//app-card-->
    </div><!--//col-->
    <div class="col-6 col-lg-3">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">Total Administraterus</h4>
                <div class="stats-figure">0</div>

            </div><!--//app-card-body-->
            <a class="app-card-link-mask" href="#"></a>
        </div><!--//app-card-->
    </div><!--//col-->
    <div class="col-6 col-lg-3">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">Retard de paiement</h4>
                <div class="stats-figure">0</div>
            </div><!--//app-card-body-->
            <a class="app-card-link-mask" href="#"></a>
        </div><!--//app-card-->
    </div><!--//col-->
</div><!--//row-->


{{--  -------------------------------------------------Tableau  --}}

@if (session('succes'))
<div class="alert alert-success">{{session('succes')}}</div>
@endif
            
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Employes</h1>
                </div>
                <div class="col-auto">
                     <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                            <div class="col-auto">
                                <form class="table-search-form row gx-1 align-items-center">
                                    <div class="col-auto">
                                        <input type="text" id="search-orders" name="searchorders" class="form-control search-orders" placeholder="Search">
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn app-btn-secondary">Search</button>
                                    </div>
                                </form>
                                
                            </div><!--//col-->
                           
                            <div class="col-auto">						    
                                <a class="btn app-btn-secondary" href="{{route('user.create')}}">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
      <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
    </svg>
                                    Ajoutez employe
                                </a>
                            </div>
                        </div><!--//row-->
                    </div><!--//table-utilities-->
                </div><!--//col-auto-->
            </div><!--//row-->
           
            
            <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                <a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab" href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">Tout les employes</a>
            </nav>
            
            
            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                        <div class="app-card-body">
                            <div class="table-responsive">
                                <table class="table app-table-hover mb-0 text-left">
                                    <thead>
                                        <tr>
                                            <th class="cell">#</th>
                                            <th class="cell">Nom</th>
                                            <th class="cell">Prenom</th>
                                            <th class="cell">Email</th>
                                            <th class="cell">Telephone</th>
                                            <th class="cell">departement</th>
                                            <th class="cell">Salaire</th>
                                            <th class="cell">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @forelse ($employes as $value)      --}}
                                        <tr>
                                            <td class="cell">1</td>
                                            <td class="cell"><span class="truncate">Banaya</span></td>
                                            <td class="cell">Adja</td>
                                            <td class="cell">kh@gmail.com</td>
                                            <td class="cell">781766655</td>
                                            <td class="cell">Faramaren</td>
                                            <td class="cell"><span class="badge bg-success">1788899</span>  Fcfa</td>
                                   
                                            <td class="cell">
                                                <a class="btn-sm app-btn-secondary" href="">Modifier</a>
                                                <a class="btn-sm app-btn-secondary" href="">Supprimer</a>
                                            </td>
                                        </tr>
                                        {{-- @empty --}}
                                        <td class="cell" colspan="6">Aucun employe ajoute</td>
                                            
                                        {{-- @endforelse --}}

    
                                    </tbody>
                                </table>
                            </div><!--//table-responsive-->
                           
                        </div><!--//app-card-body-->		
                    </div><!--//app-card-->
                    <nav class="pagination mt-4 ">
                        {{-- {{ $employes->links()}} --}}
                    </nav><!--//app-pagination-->
                    
                </div><!--//tab-pane-->               
            </div><!--//tab-content-->
            
    
@endsection
