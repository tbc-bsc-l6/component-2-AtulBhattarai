@extends('admin.layouts.app')

@section('title', 'Flexon - Dashboard')

@section('content')
<div class="container-fluid px-4 py-5">
    <!-- Success/Error Messages -->
    <div class="row mb-4">
        <div class="col-12">
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i> {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i> {{ Session::get('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
    </div>

    <!-- Main Dashboard Card -->
    <div class="card shadow-lg rounded-4 border-0">
        <div class="card-header bg-gradient-to-r from-teal-500 to-blue-500 text-white d-flex justify-content-between align-items-center rounded-t-lg">
            <h3 class="mb-0"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</h3>
            <div class="d-flex align-items-center">
                <i class="fas fa-user-circle fa-2x me-3"></i>
                <span class="text-white">Welcome, Admin</span>
            </div>
        </div>
        <div class="card-body">
            <!-- Welcome Message -->
            <div class="text-center my-5">
                <h3 class="text-primary mb-3">Welcome to the Admin Dashboard</h3>
                <p class="lead text-muted">You are logged in and ready to manage your system. Use the sidebar to navigate between sections, and start managing your platform effectively!</p>
                <i class="fas fa-check-circle fa-5x text-success"></i>
            </div>

            <!-- Graph/Chart Section -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow-lg rounded-4">
                        <div class="card-header bg-gradient-to-r from-blue-500 to-teal-500 text-white rounded-t-lg">
                            <h4 class="mb-0"><i class="fas fa-chart-line me-2"></i> Sales Overview</h4>
                        </div>
                        <div class="card-body">
                            <p class="text-center">This section can contain your data visualization charts, such as sales over time, user engagement, etc.</p>
                            <!-- You can add a chart here using Chart.js or other libraries -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom Script for Alerts and Chart -->
<script>
    // Auto-dismiss alerts after 5 seconds
    setTimeout(function() {
        let alert = document.querySelector('.alert');
        if (alert) {
            alert.classList.add('fade');
        }
    }, 5000);
</script>
@endsection
