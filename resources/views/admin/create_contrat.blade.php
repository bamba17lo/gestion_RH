@extends('layouts.template')

@section('content')
<h1 class="app-page-title">Employes</h1>
			    <hr class="mb-4">
                <div class="row g-4 settings-section">
	                <div class="col-12 col-md-4">
		                <h3 class="section-title">Ajout</h3>
		                <div class="section-intro">Donnee Personnel.</div> <br> <br>
						<div class="section-intro">
							<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
								<path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
								<circle cx="8" cy="4.5" r="1"/>
							  </svg><span>Signifie que le champs ne doit pas etre null</span>
						</div>
	                </div>
	                <div class="col-12 col-md-8">
		                <div class="app-card app-card-settings shadow-sm p-4">
						    
						    <div class="app-card-body">
							    <form class="settings-form" method="POST" action="{{route('user.post.contrat')}}">
                                    @csrf
                                    @method('POST')

                                    <input type="text" name="user_id" value="{{$user}}" hidden>

                                    <div class="mb-3">
									    <label for="sexe" class="form-label">Type de Contrat<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info."><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
										<path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
										<circle cx="8" cy="4.5" r="1"/>
										</svg></span></label>
                                        <select name="type_contrat" id="type_contrat" class="form-control">
                                            <option value="">--Selectionner--</option>    
                                            <option value="CDI">CDI</option>    
                                            <option value="CDD">CDD</option>    
                                            <option value="Prestation_Service">Prestation de Service</option>    
                                    </select>
										@error('type_contrat')
											<div style="color:  rgb(250, 40, 40)">{{$message}}</div>
										@enderror
									</div>
									{{-- ---------------------------- End --}}

									<div class="mb-3">
									    <label for="departement_id" class="form-label">Date D'embauche <span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info."><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
											<path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
											<circle cx="8" cy="4.5" r="1"/>
										  </svg></span></label>
                                          <input type="date" name="date_debut" class="form-control" id="email" value="{{old('date_debut')}}">
										@error('date_debut')
											<div style="color:  rgb(250, 40, 40)">{{$message}}</div>
										@enderror
									</div>

									{{-- ---------------------------- End date_naissance -----------------}}
								    <div class="mb-3">
									    <label for="departement_id" class="form-label">Date Fin de Contrat <span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info."><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
											<path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
											<circle cx="8" cy="4.5" r="1"/>
										  </svg></span></label>
                                          <input type="date" name="date_fin" class="form-control" id="email" value="{{old('date_fin')}}">
										@error('date_fin')
											<div style="color:  rgb(250, 40, 40)">{{$message}}</div>
										@enderror
									</div>
									
									<button type="submit" class="btn app-btn-primary" >Enregistrer</button>
							    </form>
						    </div><!--//app-card-body-->
						    
						</div><!--//app-card-->
	                </div>
                </div><!--//row-->

                <hr class="my-4">
 				    </form>
    
@endsection