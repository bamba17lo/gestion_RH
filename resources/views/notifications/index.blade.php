@extends('layouts.template')
@section('content')
	    
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="position-relative mb-3">
                <div class="row g-3 justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">Notifications</h1>
                    </div>
                   
                </div>
            </div>
            
            @forelse ($notifications as  $value)
            <div class="app-card app-card-notification shadow-sm mb-4">
                <div class="app-card-header px-4 py-3">
                    <div class="row g-3 align-items-center">
                        <div class="col-12 col-lg-auto text-center text-lg-start">						        
                            <div class="app-icon-holder">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-receipt" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z"/>
  <path fill-rule="evenodd" d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
</svg>
                            </div><!--//app-icon-holder-->
                        </div><!--//col-->

                        <div class="col-12 col-lg-auto text-center text-lg-start">

                            <div class="notification-type mb-2"><span class="{{$value->type==='conges' ? 'badge bg-info' : 'badge bg-warning'}}">Demande de {{$value->type}}</span></div>

                            <h4 class="notification-title mb-1">{{$value->user->nom_prenom}}</h4>
                            
                            <ul class="notification-meta list-inline mb-0">
                                <li class="list-inline-item">posté le {{ $value->created_at->isoFormat('LLL')}}</li>
                            </ul>
                       
                        </div><!--//col-->
                        <div>
                            <span>Date Début: {{ \Carbon\Carbon::parse($value->date_debut)->isoFormat('LL') }} </span><br>
                            <span>Date Fin: {{ \Carbon\Carbon::parse($value->date_fin)->isoFormat('LL') }} </span> <br>
                            <span>Status: {{$value->statut}} </span>

                        </div>
                    </div><!--//row-->
                </div><!--//app-card-header-->
                <div class="app-card-body p-4">
                    <h4><u>Motif</u></h4>
                    <div class="notification-content">{{$value->motif}}</div>
                </div><!--//app-card-body-->
                <div class="app-card-footer px-4 py-3">
                    <form action="{{route('notification.put',$value->id)}}" method="post">
                    @csrf
                    @method('PUT')
                        <button type="submit" class="btn btn-success">Accepter </button>
                        <button type="submit" class="btn btn-danger">Refuser </button>
                    </form>
                </div><!--//app-card-footer-->


                
            </div><!--//app-card-->
            @empty
            <td class="cell" colspan="6">Aucune notification</td>
            @endforelse

            
            
            
        
            <nav class="pagination mt-4 ">
                {{ $notifications->links()}}
            </nav><!--//app-pagination-->
   
@endsection