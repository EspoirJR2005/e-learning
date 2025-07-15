<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Learning System | Dashboard</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts - Montserrat -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Lightbox -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-dark: #2C3E50;
            --primary-main: #3498DB;
            --primary-light: #EAF2F8;
            --secondary-dark: #27AE60;
            --secondary-main: #2ECC71;
            --secondary-light: #D5F5E3;
            --accent-color: #E74C3C;
            --text-primary: #2C3E50;
            --text-secondary: #7F8C8D;
            --background: #F8F9FA;
            --surface: #FFFFFF;
            --error: #E74C3C;
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--background);
            color: var(--text-primary);
        }
        
        /* Sidebar Styling */
        .sidebar {
            background: linear-gradient(180deg, var(--primary-dark) 0%, var(--primary-main) 100%);
            min-height: 100vh;
            color: white;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        }
        
        .sidebar-brand {
            padding: 1.5rem 1rem;
            font-weight: 600;
            font-size: 1.2rem;
            color: white;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            margin: 0.25rem 1rem;
            border-radius: 8px;
            padding: 0.75rem 1rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .sidebar .nav-link:hover {
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateX(5px);
        }
        
        .sidebar .nav-link.active {
            color: white;
            background-color: rgba(255, 255, 255, 0.2);
            font-weight: 600;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        
        .sidebar .nav-link i {
            width: 24px;
            text-align: center;
            margin-right: 12px;
            font-size: 1.1rem;
        }
        
        .sidebar-divider {
            border-top: 1px solid rgba(255,255,255,0.1);
            margin: 1rem 0;
        }
        
        /* Navbar Styling */
        .top-navbar {
            background-color: var(--surface);
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            height: 70px;
        }
        
        .navbar-brand {
            font-weight: 700;
            color: var(--primary-dark);
            font-size: 1.4rem;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--primary-light);
        }
        
        /* Main Content */
        .main-content {
            padding: 2rem;
        }
        
        .content-card {
            background: var(--surface);
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            padding: 1.5rem;
            margin-bottom: 2rem;
            border: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .content-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }
        
        .card-header {
            background-color: transparent;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            padding: 1rem 1.5rem;
            font-weight: 600;
        }
        
        /* Stats Cards */
        .stat-card {
            border-radius: 10px;
            overflow: hidden;
            color: white;
            position: relative;
            z-index: 1;
        }
        
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(0,0,0,0.1) 0%, transparent 100%);
            z-index: -1;
        }
        
        .stat-card.primary {
            background: linear-gradient(135deg, var(--primary-main) 0%, var(--primary-dark) 100%);
        }
        
        .stat-card.success {
            background: linear-gradient(135deg, var(--secondary-main) 0%, var(--secondary-dark) 100%);
        }
        
        .stat-card.danger {
            background: linear-gradient(135deg, #E74C3C 0%, #C0392B 100%);
        }
        
        .stat-card.warning {
            background: linear-gradient(135deg, #F39C12 0%, #D35400 100%);
        }
        
        /* Footer */
        .footer {
            background-color: var(--primary-dark);
            color: white;
            padding: 1.5rem;
            text-align: center;
        }
        
        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .sidebar {
                position: fixed;
                z-index: 1000;
                width: 280px;
                transform: translateX(-280px);
                transition: transform 0.3s ease;
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
        }
        
        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .fade-in {
            animation: fadeIn 0.5s ease forwards;
        }
    </style>
</head>
<body>
    <!-- Top Navigation -->
    <nav class="navbar navbar-expand-lg top-navbar sticky-top">
        <div class="container-fluid">
            <button class="btn btn-link d-lg-none" type="button" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>
            
            <a class="navbar-brand ms-3" href="index.html">
                <i class="fas fa-graduation-cap text-primary me-2"></i>
                <span class="text-gradient">E-Learning</span>
            </a>
            
            <div class="d-flex align-items-center">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="addDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-plus-circle me-1 text-primary"></i>
                            <span class="d-none d-lg-inline">Add New</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow">
                            <li><h6 class="dropdown-header">Create New</h6></li>
                            <li><a class="dropdown-item" href="<?php echo web_root;?>admin/modules/exercises/index.php?view=add">
                                <i class="fas fa-dumbbell me-2 text-primary"></i>Exercises
                            </a></li>
                            <li><a class="dropdown-item" href="<?php echo web_root;?>admin/modules/lesson/index.php?view=add">
                                <i class="fas fa-book me-2 text-primary"></i>Lesson
                            </a></li>
                        </ul>
                    </li>
                    
                    <li class="nav-item dropdown ms-2">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                            <img src="images/user.png" class="user-avatar me-2">
                            <span class="d-none d-lg-inline">Admin</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow">
                            <li><h6 class="dropdown-header">Account</h6></li>
                            <li><a class="dropdown-item" href="#">
                                <i class="fas fa-user me-2 text-muted"></i>Profile
                            </a></li>
                            <li><a class="dropdown-item" href="#">
                                <i class="fas fa-cog me-2 text-muted"></i>Settings
                            </a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="<?php echo web_root;?>admin/logout.php">
                                <i class="fas fa-sign-out-alt me-2 text-muted"></i>Logout
                            </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Main Content -->
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-2 sidebar d-none d-lg-block">
                <div class="sidebar-brand">
                    <i class="fas fa-graduation-cap me-2"></i>
                    E-Learning
                </div>
                
                <div class="px-3 py-4">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="<?php echo web_root; ?>/admin">
                                <i class="fas fa-tachometer-alt"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo web_root; ?>admin/modules/lesson/index.php">
                                <i class="fas fa-book-open"></i>
                                Lessons
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo web_root; ?>admin/modules/exercises/index.php">
                                <i class="fas fa-dumbbell"></i>
                                Exercises
                                <span class="badge bg-success float-end">11</span>
                            </a>
                        </li>
                    </ul>
                    
                    <div class="sidebar-divider"></div>
                    
                    <h6 class="sidebar-heading px-3 mb-2 text-uppercase text-white-50 small">Management</h6>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo web_root; ?>admin/modules/galery/index.php">
                                <i class="fas fa-images"></i>
                                Gallery
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo web_root; ?>admin/modules/modstudent/index.php">
                                <i class="fas fa-users"></i>
                                Students
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo web_root; ?>admin/modules/user/index.php">
                                <i class="fas fa-user-cog"></i>
                                Users
                            </a>
                        </li>
                    </ul>
                    
                    <div class="sidebar-divider"></div>
                    
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo web_root;?>admin/logout.php">
                                <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Main Content Area -->
            <main class="col-lg-10 ms-sm-auto main-content">
                <!-- Dashboard Stats -->
                <div class="row mb-4 fade-in">
                    <div class="col-md-6 col-lg-3 mb-4">
                        <div class="stat-card primary p-4 text-white rounded-3 h-100">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-uppercase text-white-50 mb-1">Total Students</h6>
                                    <h2 class="mb-0">1,254</h2>
                                </div>
                                <i class="fas fa-users fa-2x opacity-50"></i>
                            </div>
                            <div class="mt-3">
                                <span class="badge bg-white text-primary">+12.5%</span>
                                <span class="small ms-2">vs last month</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-3 mb-4">
                        <div class="stat-card success p-4 text-white rounded-3 h-100">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-uppercase text-white-50 mb-1">Active Courses</h6>
                                    <h2 class="mb-0">24</h2>
                                </div>
                                <i class="fas fa-book-open fa-2x opacity-50"></i>
                            </div>
                            <div class="mt-3">
                                <span class="badge bg-white text-success">+3 New</span>
                                <span class="small ms-2">this month</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-3 mb-4">
                        <div class="stat-card warning p-4 text-white rounded-3 h-100">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-uppercase text-white-50 mb-1">Exercises</h6>
                                    <h2 class="mb-0">156</h2>
                                </div>
                                <i class="fas fa-dumbbell fa-2x opacity-50"></i>
                            </div>
                            <div class="mt-3">
                                <span class="badge bg-white text-warning">+15%</span>
                                <span class="small ms-2">completion rate</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-3 mb-4">
                        <div class="stat-card danger p-4 text-white rounded-3 h-100">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-uppercase text-white-50 mb-1">Pending</h6>
                                    <h2 class="mb-0">8</h2>
                                </div>
                                <i class="fas fa-clock fa-2x opacity-50"></i>
                            </div>
                            <div class="mt-3">
                                <span class="badge bg-white text-danger">-2</span>
                                <span class="small ms-2">since yesterday</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Main Content Card -->
                <div class="content-card fade-in">
                    <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">System Overview</h5>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <i class="fas fa-calendar me-1"></i> This Month
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Week</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php check_message(); ?>
                        <?php require_once $content; ?>
                    </div>
                </div>
                
                <!-- Recent Activity -->
                <div class="row fade-in">
                    <div class="col-lg-6 mb-4">
                        <div class="content-card h-100">
                            <div class="card-header bg-transparent">
                                <h5 class="mb-0">Recent Activities</h5>
                            </div>
                            <div class="card-body">
                                <div class="list-group list-group-flush">
                                    <div class="list-group-item border-0 px-0 py-3">
                                        <div class="d-flex">
                                            <div class="icon-shape icon-sm bg-primary-light text-primary rounded-circle me-3">
                                                <i class="fas fa-user-graduate"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-1">New student registration</h6>
                                                <p class="small text-muted mb-0">John Doe registered for Web Development course</p>
                                                <small class="text-muted">2 hours ago</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-group-item border-0 px-0 py-3">
                                        <div class="d-flex">
                                            <div class="icon-shape icon-sm bg-success-light text-success rounded-circle me-3">
                                                <i class="fas fa-book"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-1">New lesson added</h6>
                                                <p class="small text-muted mb-0">"Advanced JavaScript Concepts" added to Web Dev</p>
                                                <small class="text-muted">5 hours ago</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-group-item border-0 px-0 py-3">
                                        <div class="d-flex">
                                            <div class="icon-shape icon-sm bg-warning-light text-warning rounded-circle me-3">
                                                <i class="fas fa-dumbbell"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-1">Exercise submission</h6>
                                                <p class="small text-muted mb-0">Sarah completed "CSS Flexbox Challenge"</p>
                                                <small class="text-muted">1 day ago</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6 mb-4">
                        <div class="content-card h-100">
                            <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Course Progress</h5>
                                <a href="#" class="btn btn-sm btn-link">View All</a>
                            </div>
                            <div class="card-body">
                                <div class="mb-4">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Web Development</span>
                                        <span>78%</span>
                                    </div>
                                    <div class="progress" style="height: 8px;">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 78%"></div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Data Science</span>
                                        <span>65%</span>
                                    </div>
                                    <div class="progress" style="height: 8px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 65%"></div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Mobile App Dev</span>
                                        <span>42%</span>
                                    </div>
                                    <div class="progress" style="height: 8px;">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 42%"></div>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>UI/UX Design</span>
                                        <span>35%</span>
                                    </div>
                                    <div class="progress" style="height: 8px;">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 35%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-md-start text-center">
                    <span class="text-white-50">&copy; 2025 E-Learning System. All rights reserved.</span>
                </div>
                <div class="col-md-6 text-md-end text-center mt-3 mt-md-0">
                    <a href="#" class="text-white-50 me-3">Privacy Policy</a>
                    <a href="#" class="text-white-50 me-3">Terms of Service</a>
                    <a href="#" class="text-white-50">Contact Us</a>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- Custom Script -->
    <script>
        $(document).ready(function() {
            // Toggle sidebar on mobile
            $('#sidebarToggle').click(function() {
                $('.sidebar').toggleClass('show');
            });
            
            // Initialize DataTables
            $('.datatable-1').DataTable({
                responsive: true,
                language: {
                    paginate: {
                        previous: '<i class="fas fa-chevron-left"></i>',
                        next: '<i class="fas fa-chevron-right"></i>'
                    }
                },
                dom: '<"top"f>rt<"bottom"lip><"clear">',
                initComplete: function() {
                    $('.dataTables_filter input').addClass('form-control').attr('placeholder', 'Search...');
                    $('.dataTables_length select').addClass('form-select');
                }
            });
            
            // Highlight active sidebar item
            const currentPage = window.location.pathname.split('/').pop();
            $('.sidebar .nav-link').each(function() {
                if ($(this).attr('href').includes(currentPage)) {
                    $(this).addClass('active');
                }
            });
            
            // Initialize charts
            const ctx = document.createElement('canvas');
            $('.chart-container').append(ctx);
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'Student Registrations',
                        data: [65, 59, 80, 81, 56, 72],
                        backgroundColor: 'rgba(52, 152, 219, 0.2)',
                        borderColor: 'rgba(52, 152, 219, 1)',
                        borderWidth: 2,
                        tension: 0.3,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>