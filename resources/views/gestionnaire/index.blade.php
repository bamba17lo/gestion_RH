@extends('layouts.template')
@section('content')

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
                                <th class="cell">Nom</th>
                                <th class="cell">Email</th>
                                <th class="cell">Profil</th>
                                <th class="cell">Telephone</th>
                                <th class="cell">departement</th>
                                <th class="cell">Salaire</th>
                                <th class="cell">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($gestionnaires as $value)     
                            <tr>
                                
                                <td class="cell"><span class="truncate">{{$value->nom_prenom}}</span></td>
                                <td class="cell">{{$value->email}}</td>
                                <td class="cell">{{$value->profil}}</td>
                                <td class="cell">{{$value->donnee_personnelle->telephone}}</td>
                                <td class="cell">{{ $value->donnee_professionnelle->departement->libelle }}</td>
                                <td class="cell"><span class="badge bg-success">{{ isset($value->donnee_professionnelle->salaire) ? $value->donnee_professionnelle->salaire : '' }}</span>  Fcfa</td>
                       
                                <td class="cell">
                                    {{-- <button class="voir-cv-btn" data-cv="{{ asset('storage/' . $value->donnee_professionnelle->path) }}">Voir CV</button> --}}
                                    <a class="btn-sm app-btn-secondary" href="/storage/{{ $value->donnee_professionnelle->path}}">Voir CV</a>
                                    <a class="btn-sm app-btn-secondary" href="">Modifier</a>
                                    <a class="btn-sm app-btn-secondary" href="">Supprimer</a>
                                </td>
                            </tr>
                            @empty
                            <td class="cell" colspan="6">Aucun employe ajoute</td>
                                
                            @endforelse


                        </tbody>
                    </table>
                </div><!--//table-responsive-->
               
            </div><!--//app-card-body-->		
        </div><!--//app-card-->
        <nav class="pagination mt-4 ">
            {{ $gestionnaires->links()}}
        </nav><!--//app-pagination-->
        
    </div><!--//tab-pane-->               
</div><!--//tab-content-->
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.voir-cv-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                var cvUrl = this.getAttribute('data-cv');
                // Affichez le CV dans un iframe ou un autre élément de votre choix
                var iframe = document.createElement('iframe');
                iframe.src = cvUrl;
                iframe.width = '100%';
                iframe.height = '600px';
                document.body.appendChild(iframe);
            });
        });
    });
</script>
