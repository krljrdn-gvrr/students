<header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('index') }}">Students Module</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="{{ route('index') }}">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('students.view') }}">Student List</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Login</a></li>
          </ul>
        </div>
      </div>
    </nav>
</header>