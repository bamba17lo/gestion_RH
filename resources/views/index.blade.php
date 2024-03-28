@extends('layouts.template')
@section('content')
    
<h1 class="app-page-title">Dashboard</h1>
			    

    
<div class="row g-4 mb-4">
    <div class="col-6 col-lg-3">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">Total Departements</h4>
                <div class="stats-figure">{{$nbrDepartement}}</div>

            </div><!--//app-card-body-->
            <a class="app-card-link-mask" href=""></a>
        </div><!--//app-card-->
    </div><!--//col-->
    
    <div class="col-6 col-lg-3">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">Total Gestionnaires</h4>
                <div class="stats-figure">{{$nbrGestionnaire}}</div>

            </div><!--//app-card-body-->
            <a class="app-card-link-mask" href=""></a>
        </div><!--//app-card-->
    </div><!--//col-->
    <div class="col-6 col-lg-3">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">Total Administrateurs</h4>
                <div class="stats-figure">{{$nbrAdmin}}</div>

            </div><!--//app-card-body-->
            <a class="app-card-link-mask" href="#"></a>
        </div><!--//app-card-->
    </div><!--//col-->
    <div class="col-6 col-lg-3">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">Total Utilistateurs</h4>
                <div class="stats-figure">{{$nbrUtilisateur}}</div>
            </div><!--//app-card-body-->
            <a class="app-card-link-mask" href="#"></a>
        </div><!--//app-card-->
    </div><!--//col-->
</div><!--//row-->


{{--  -------------------------------------------------Tableau  --}}

<div style="width: 80%; margin: auto;">
    <canvas id="barChart"></canvas>
</div>

<script>
    var ctx = document.getElementById('barChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($data['labels']),
            datasets: [{
                label: 'Data',
                data: @json($data['data']),
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
            
            
            
    
@endsection
