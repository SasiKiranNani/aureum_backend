@extends('frontend.dashboard.layout')

@section('dashboard-content')
    <div class="dashboard-content">
        <div class="row g-4">
            <!-- Welcome Card -->
            <div class="col-12">
                <div class="dashboard-card welcome-card">
                    <div class="card-content">
                        <h2>Welcome back, <span class="user-first-name">{{ explode(' ', Auth::user()->name)[0] }}</span>!
                        </h2>
                        <p>Manage your nominations, track awards, and update your profile from your
                            personal dashboard.</p>
                    </div>
                    <div class="card-decor">
                        <i class="fa fa-sparkles"></i>
                    </div>
                </div>
            </div>

            <!-- Stats -->
            <div class="col-md-6">
                <div class="dashboard-card stat-card">
                    <div class="stat-icon"><i class="fa fa-trophy"></i></div>
                    <div class="stat-info">
                        <span class="label">My Nominations</span>
                        <span class="value">{{ $nominationCount }}</span>
                    </div>
                </div>
            </div>

            <!-- Profile Info -->
            <div class="col-12">
                <div class="dashboard-card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Profile Information</h4>
                    </div>
                    <div class="card-body p-0 mt-4">
                        <div class="info-list">
                            <div class="info-item">
                                <span class="label">Full Name</span>
                                <span class="value user-name-display">{{ Auth::user()->name }}</span>
                            </div>
                            <div class="info-item">
                                <span class="label">Email Address</span>
                                <span class="value">{{ Auth::user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
