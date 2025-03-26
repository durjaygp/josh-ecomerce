<nav class="navbar navbar-expand navbar-light bg-white static-top osahan-nav sticky-top">
    &nbsp;&nbsp;
    <button class="btn btn-link btn-sm text-secondary order-1 order-sm-0" id="sidebarToggle">
        <i class="fas fa-bars"></i>
    </button> &nbsp;&nbsp;
    <a class="navbar-brand mr-1" href="{{route('home.video')}}"><img class="img-fluid" alt="" width="100px" src="{{asset(setting()->website_logo)}}"></a>

    <style>
        #searchResults {
            position: absolute;
            width: 100%;
            background: #222; /* Dark mode styling */
            color: white;
            border-radius: 5px;
            max-height: 300px;
            overflow-y: auto;
            display: none; /* Initially hidden */
            z-index: 1000;
        }

        .search-item {
            padding: 10px;
            border-bottom: 1px solid #444;
            cursor: pointer;
        }

        .search-item:hover {
            background: #333;
        }

        .search-results-container {
            position: relative;
        }
    </style>

    <div class="search-results-container">
        <form id="searchForm" class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-5 my-2 my-md-0 osahan-navbar-search">
            <div class="input-group">
                <input type="text" id="searchInput" class="form-control" placeholder="Search for...">
                <div class="input-group-append">
                    <button class="btn btn-light" type="button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <div id="searchResults"></div>
    </div>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0 osahan-right-navbar">
        <li class="nav-item mx-1">
            <a class="nav-link" href="{{route('home')}}">
                <i class="fas fa-step-backward fa-fw"></i>
                JSB Tech
            </a>
        </li>
    </ul>
</nav>
