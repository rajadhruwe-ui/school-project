@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Visitor Statistics</h1>
    
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Unique Visitors</h5>
                    <h2 id="total-visitors">Loading...</h2>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Today's Visitors</h5>
                    <h2 id="today-visitors">Loading...</h2>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Active Now</h5>
                    <h2 id="active-visitors">Loading...</h2>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Last 30 Days</h5>
                    <canvas id="visitorChart" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Load basic stats
    fetchStats();
    
    // Load chart data
    fetch('/visitors/stats?start_date={{ now()->subDays(30)->format('Y-m-d') }}&end_date={{ now()->format('Y-m-d') }}')
        .then(response => response.json())
        .then(data => {
            renderChart(data.daily_stats);
        });
    
    function fetchStats() {
        fetch('/visitors/total')
            .then(r => r.json())
            .then(data => document.getElementById('total-visitors').textContent = data.total_unique_visitors);
            
        fetch('/visitors/today')
            .then(r => r.json())
            .then(data => document.getElementById('today-visitors').textContent = data.today_unique_visitors);
            
        fetch('/visitors/realtime')
            .then(r => r.json())
            .then(data => document.getElementById('active-visitors').textContent = data.active_visitors);
    }
    
    function renderChart(dailyStats) {
        const ctx = document.getElementById('visitorChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: dailyStats.map(day => day.date),
                datasets: [{
                    label: 'Unique Visitors',
                    data: dailyStats.map(day => day.unique_visitors),
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
    
    // Refresh stats every minute
    setInterval(fetchStats, 60000);
});
</script>
@endsection