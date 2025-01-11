<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #121212;
            color: #00ff00;
        }
        .sidebar {
            background: #1a1a1a;
            height: 100vh;
            padding-top: 20px;
        }
        .sidebar a {
            color: #00ff00;
            margin-bottom: 10px;
        }
        .sidebar a:hover {
            text-decoration: none;
            color: #00ff99;
        }
        .content {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 sidebar d-flex flex-column">
                <h4 class="text-center">Admin Panel</h4>
                <a href="#dashboard" class="btn btn-outline-success w-100 mb-2"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                <a href="#users" class="btn btn-outline-success w-100 mb-2"><i class="fas fa-users"></i> Manage Users</a>
                <a href="#quizzes" class="btn btn-outline-success w-100 mb-2"><i class="fas fa-question-circle"></i> Manage Quizzes</a>
                <a href="#reports" class="btn btn-outline-success w-100 mb-2"><i class="fas fa-chart-line"></i> Reports</a>
                <a href="#settings" class="btn btn-outline-success w-100 mb-2"><i class="fas fa-cogs"></i> Settings</a>
                <a href="#logout" class="btn btn-danger w-100 mt-auto"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </nav>

            <!-- Main Content -->
            <main class="col-md-10 content">
                <section id="dashboard">
                    <h2>Dashboard</h2>
                    <p>Overview of site statistics and performance metrics.</p>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="card" style="background: #1a1a1a; border: 1px solid #00ff00;">
                                <div class="card-body">
                                    <h5 class="card-title">Users</h5>
                                    <p class="card-text">Active Users: 1200</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="background: #1a1a1a; border: 1px solid #00ff00;">
                                <div class="card-body">
                                    <h5 class="card-title">Quizzes</h5>
                                    <p class="card-text">Total Quizzes: 50</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="background: #1a1a1a; border: 1px solid #00ff00;">
                                <div class="card-body">
                                    <h5 class="card-title">Reports</h5>
                                    <p class="card-text">New Reports: 5</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="users" class="mt-4">
                    <h2>Manage Users</h2>
                    <p>View, edit, or delete users.</p>
                    <table class="table table-dark table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>johndoe@example.com</td>
                                <td>
                                    <button class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </section>

                <section id="quizzes" class="mt-4">
                    <h2>Manage Quizzes</h2>
                    <p>Add, edit, or delete quizzes.</p>
                    <button class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Add Quiz</button>
                    <table class="table table-dark table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>General Knowledge Quiz</td>
                                <td>
                                    <button class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </section>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>