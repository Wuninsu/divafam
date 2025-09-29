@extends('layouts.main')
@section('content')
<!-- Header -->
<div class="row gy-3 mb-4 justify-content-between">
    <div class="col-md-9">
        <h2 class="mb-1">Dashboard</h2>
        <h6 class="text-muted">Here’s what’s going on right now</h6>
    </div>
    <div class="col-md-3">
        <div class="flatpickr-input-container">
            <input class="form-control datetimepicker" id="datepicker" type="text"
                data-options='{"dateFormat":"M j, Y","disableMobile":true}' />
            <span class="uil uil-calendar-alt flatpickr-icon text-muted"></span>
        </div>
    </div>
</div>

<!-- Stats -->
<div class="row g-3 mb-4">
    <div class="col-sm-6 col-lg-3">
        <div class="d-flex align-items-center p-3 border rounded border-primary">
            <span class="text-primary"><i class="fas fa-cedi-sign"></i></span>
            <div class="ms-2">
                <h4 class="mb-0">
                    <i class="fas fa-cedi-sign text-primary"></i>
                    {{ number_format($totalDonations, 2) }}
                </h4>
                <small class="text-muted">Total Donations</small>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="d-flex align-items-center p-3 border rounded border-success">
            <span class="text-success">
                <i class="fas fa-users"></i>
            </span>
            <div class="ms-2">
                <h4 class="mb-0">{{ $activeDonors }}</h4>
                <small class="text-muted">Active Donors</small>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="d-flex align-items-center p-3 border rounded border-warning">
            <span class="text-warning">
                <i class="fas fa-book"></i>
            </span>
            <div class="ms-2">
                <h4 class="mb-0">{{ $projectsCount }}</h4>
                <small class="text-muted">Projects</small>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="d-flex align-items-center p-3 border rounded border-danger">
            <span class="text-danger">
                <i class="fas fa-smile"></i>
            </span>
            <div class="ms-2">
                <h4 class="mb-0">{{ $beneficiariesCount }}</h4>
                <small class="text-muted">Beneficiaries</small>
            </div>
        </div>
    </div>
</div>

<!-- Charts -->
<div class="row mb-4">
    <div class="col-12">
        <h5>Donation Trends (12 months)</h5>
        <canvas id="donationTrendsChart" style="min-height:300px; width:100%;"></canvas>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-lg-6">
        <h5>Top Donors</h5>
        <ul class="list-group">
            @foreach($topDonors as $donor)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $donor->name }}
                <span class="badge bg-primary">
                    <i class="fas fa-cedi-sign"></i> {{ number_format($donor->donations_sum_amount, 2) }}
                </span>
            </li>
            @endforeach
        </ul>
    </div>

    <!-- Recent Projects -->
    <div class="col-lg-6">
        <h5>Recent Projects</h5>
        <ul class="list-group">
            @foreach($recentProjects as $project)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $project->title }}
                <span class="badge bg-success">{{ $project->beneficiaries_count }} beneficiaries</span>
            </li>
            @endforeach
        </ul>
    </div>
</div>

<!-- Recent Donations -->
<div class="mx-n4 px-4 mx-lg-n6 px-0 py-3 mb-9 bg-body-emphasis border-y position-relative top-1">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Recent Donations</h5>
    </div>

    <div class="table-responsive scrollbar ms-n1 ps-1">
        <table class="table table-sm fs-9 mb-0">
            <thead>
                <tr>
                    <th>Donor</th>
                    <th>Amount</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentDonations as $donation)
                <tr>
                    <td>{{ $donation->donor->name ?? 'Anonymous' }}</td>
                    <td>
                        <i class="fas fa-cedi-sign text-success"></i> {{ number_format($donation->amount, 2) }}
                    </td>
                    <td>{{ \Carbon\Carbon::parse($donation->donation_date)->format('M d, Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('donationTrendsChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($donationTrends->keys()) !!},
            datasets: [{
                label: 'Donations',
                data: {!! json_encode($donationTrends->values()) !!},
                borderColor: '#4e73df',
                backgroundColor: 'rgba(78, 115, 223, 0.2)',
                fill: true,
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: true } }
        }
    });
</script>
@endsection
