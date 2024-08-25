@extends('user.master')
@section('title',$support->title)
@section('content')
    <div class="container-fluid">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">@yield('title')</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-muted " href="{{route('dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item" aria-current="page">Support Tickets</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n5">
                            <img src="{{asset('back')}}/assets/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card overflow-hidden chat-application">
            <div class="d-flex align-items-center justify-content-between gap-6 m-3 d-lg-none">
                <button class="btn btn-primary d-flex" type="button" data-bs-toggle="offcanvas" data-bs-target="#chat-sidebar" aria-controls="chat-sidebar">
                    <i class="ti ti-menu-2 fs-5"></i>
                </button>
                <form class="position-relative w-100">
                    <input type="text" class="form-control search-chat py-2 ps-5" id="text-srh" placeholder="Search Contact" />
                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                </form>
            </div>
            <div class="d-flex">
                <div class="w-100 w-xs-100 chat-container">
                    <div class="chat-box-inner-part h-100">
                        <div class="chat-not-selected h-100 d-none">
                            <div class="d-flex align-items-center justify-content-center h-100 p-5">
                                <div class="text-center">
                        <span class="text-primary">
                          <i class="ti ti-message-dots fs-10"></i>
                        </span>
                                    <h6 class="mt-2">Open chat from the list</h6>
                                </div>
                            </div>
                        </div>
                        <div class="chatting-box d-block">
                            <div class="p-9 border-bottom chat-meta-user d-flex align-items-center justify-content-between">
                                <div class="hstack gap-3 current-chat-user-name">
                                    <div class="position-relative">
                                        <img src="{{asset('back')}}/assets/images/profile/user-3.jpg" alt="user1" width="48" height="48" class="rounded-circle" />
                                        <span class="position-absolute bottom-0 end-0 p-1 badge rounded-pill bg-success">
                            <span class="visually-hidden">New alerts</span>
                          </span>
                                    </div>
                                    <div>
                                        <h6 class="mb-1 name fw-semibold"></h6>
                                        <p class="mb-0">Away</p>
                                    </div>
                                </div>
                                <ul class="list-unstyled mb-0 d-flex align-items-center">
                                    <li>
                                        <a class="text-dark px-2 fs-7 bg-hover-primary nav-icon-hover position-relative z-index-5" href="javascript:void(0)">
                                            <i class="ti ti-phone"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-dark px-2 fs-7 bg-hover-primary nav-icon-hover position-relative z-index-5" href="javascript:void(0)">
                                            <i class="ti ti-video"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="chat-menu text-dark px-2 fs-7 bg-hover-primary nav-icon-hover position-relative z-index-5" href="javascript:void(0)">
                                            <i class="ti ti-menu-2"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="d-flex parent-chat-box">
                                <div class="chat-box w-100">
                                    <div class="chat-box-inner p-9" data-simplebar>
                                        <div class="chat-list chat active-chat" data-user-id="1">
                                            <div class="hstack gap-3 align-items-start mb-7 justify-content-start">
                                                <img src="{{asset('back')}}/assets/images/profile/user-8.jpg" alt="user8" width="40" height="40" class="rounded-circle" />
                                                <div>
                                                    <h6 class="fs-2 text-muted">
                                                        Andrew, 2 hours ago
                                                    </h6>
                                                    <div class="p-2 text-bg-light rounded-1 d-inline-block text-dark fs-3">
                                                        If I don’t like something, I’ll stay away
                                                        from it.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="hstack gap-3 align-items-start mb-7 justify-content-end">
                                                <div class="text-end">
                                                    <h6 class="fs-2 text-muted">2 hours ago</h6>
                                                    <div class="p-2 bg-info-subtle text-dark rounded-1 d-inline-block fs-3">
                                                        If I don’t like something, I’ll stay away
                                                        from it.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="hstack gap-3 align-items-start mb-7 justify-content-start">
                                                <img src="{{asset('back')}}/assets/images/profile/user-8.jpg" alt="user8" width="40" height="40" class="rounded-circle" />
                                                <div>
                                                    <h6 class="fs-2 text-muted">
                                                        Andrew, 2 hours ago
                                                    </h6>
                                                    <div class="p-2 text-bg-light rounded-1 d-inline-block text-dark fs-3">
                                                        I want more detailed information.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="hstack gap-3 align-items-start mb-7 justify-content-end">
                                                <div class="text-end">
                                                    <h6 class="fs-2 text-muted">2 hours ago</h6>
                                                    <div class="p-2 bg-info-subtle text-dark mb-1 d-inline-block rounded-1 fs-3">
                                                        If I don’t like something, I’ll stay away
                                                        from it.
                                                    </div>
                                                    <div class="p-2 bg-info-subtle text-dark rounded-1 fs-3">
                                                        They got there early, and they got really
                                                        good seats.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="hstack gap-3 align-items-start mb-7 justify-content-start">
                                                <img src="{{asset('back')}}/assets/images/profile/user-8.jpg" alt="user8" width="40" height="40" class="rounded-circle" />
                                                <div>
                                                    <h6 class="fs-2 text-muted">
                                                        Andrew, 2 hours ago
                                                    </h6>
                                                    <div class="rounded-2 overflow-hidden">
                                                        <img src="{{asset('back')}}/assets/images/products/product-1.jpg" alt="modernize-img" class="w-100" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- 2 -->
                                        <div class="chat-list chat" data-user-id="2">
                                            <div class="hstack gap-3 align-items-start mb-7 justify-content-start">
                                                <img src="{{asset('back')}}/assets/images/profile/user-8.jpg" alt="user8" width="40" height="40" class="rounded-circle" />
                                                <div>
                                                    <h6 class="fs-2 text-muted">
                                                        Andrew, 2 hours ago
                                                    </h6>
                                                    <div class="p-2 text-bg-light rounded-1 d-inline-block text-dark fs-3">
                                                        If I don’t like something, I’ll stay away
                                                        from it.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="hstack gap-3 align-items-start mb-7 justify-content-end">
                                                <div class="text-end">
                                                    <h6 class="fs-2 text-muted">2 hours ago</h6>
                                                    <div class="p-2 bg-info-subtle text-dark rounded-1 d-inline-block fs-3">
                                                        If I don’t like something, I’ll stay away
                                                        from it.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="hstack gap-3 align-items-start mb-7 justify-content-start">
                                                <img src="{{asset('back')}}/assets/images/profile/user-8.jpg" alt="user8" width="40" height="40" class="rounded-circle" />
                                                <div>
                                                    <h6 class="fs-2 text-muted">
                                                        Andrew, 2 hours ago
                                                    </h6>
                                                    <div class="p-2 text-bg-light rounded-1 d-inline-block text-dark fs-3">
                                                        I want more detailed information.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="hstack gap-3 align-items-start mb-7 justify-content-end">
                                                <div class="text-end">
                                                    <h6 class="fs-2 text-muted">2 hours ago</h6>
                                                    <div class="p-2 bg-info-subtle text-dark mb-1 d-inline-block rounded-1 fs-3">
                                                        If I don’t like something, I’ll stay away
                                                        from it.
                                                    </div>
                                                    <div class="p-2 bg-info-subtle text-dark rounded-1 fs-3">
                                                        They got there early, and they got really
                                                        good seats.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="hstack gap-3 align-items-start mb-7 justify-content-start">
                                                <img src="{{asset('back')}}/assets/images/profile/user-8.jpg" alt="user8" width="40" height="40" class="rounded-circle" />
                                                <div>
                                                    <h6 class="fs-2 text-muted">
                                                        Andrew, 2 hours ago
                                                    </h6>
                                                    <div class="rounded-2 overflow-hidden">
                                                        <img src="{{asset('back')}}/assets/images/products/product-1.jpg" alt="modernize-img" class="w-100" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- 3 -->
                                        <div class="chat-list chat" data-user-id="3">
                                            <div class="hstack gap-3 align-items-start mb-7 justify-content-start">
                                                <img src="{{asset('back')}}/assets/images/profile/user-8.jpg" alt="user8" width="40" height="40" class="rounded-circle" />
                                                <div>
                                                    <h6 class="fs-2 text-muted">
                                                        Andrew, 2 hours ago
                                                    </h6>
                                                    <div class="p-2 text-bg-light rounded-1 d-inline-block text-dark fs-3">
                                                        If I don’t like something, I’ll stay away
                                                        from it.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="hstack gap-3 align-items-start mb-7 justify-content-end">
                                                <div class="text-end">
                                                    <h6 class="fs-2 text-muted">2 hours ago</h6>
                                                    <div class="p-2 bg-info-subtle text-dark rounded-1 d-inline-block fs-3">
                                                        If I don’t like something, I’ll stay away
                                                        from it.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="hstack gap-3 align-items-start mb-7 justify-content-start">
                                                <img src="{{asset('back')}}/assets/images/profile/user-8.jpg" alt="user8" width="40" height="40" class="rounded-circle" />
                                                <div>
                                                    <h6 class="fs-2 text-muted">
                                                        Andrew, 2 hours ago
                                                    </h6>
                                                    <div class="p-2 text-bg-light rounded-1 d-inline-block text-dark fs-3">
                                                        I want more detailed information.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="hstack gap-3 align-items-start mb-7 justify-content-end">
                                                <div class="text-end">
                                                    <h6 class="fs-2 text-muted">2 hours ago</h6>
                                                    <div class="p-2 bg-info-subtle text-dark mb-1 d-inline-block rounded-1 fs-3">
                                                        If I don’t like something, I’ll stay away
                                                        from it.
                                                    </div>
                                                    <div class="p-2 bg-info-subtle text-dark rounded-1 fs-3">
                                                        They got there early, and they got really
                                                        good seats.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="hstack gap-3 align-items-start mb-7 justify-content-start">
                                                <img src="{{asset('back')}}/assets/images/profile/user-8.jpg" alt="user8" width="40" height="40" class="rounded-circle" />
                                                <div>
                                                    <h6 class="fs-2 text-muted">
                                                        Andrew, 2 hours ago
                                                    </h6>
                                                    <div class="rounded-2 overflow-hidden">
                                                        <img src="{{asset('back')}}/assets/images/products/product-1.jpg" alt="modernize-img" class="w-100" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- 4 -->
                                        <div class="chat-list chat" data-user-id="4">
                                            <div class="hstack gap-3 align-items-start mb-7 justify-content-start">
                                                <img src="{{asset('back')}}/assets/images/profile/user-8.jpg" alt="user8" width="40" height="40" class="rounded-circle" />
                                                <div>
                                                    <h6 class="fs-2 text-muted">
                                                        Andrew, 2 hours ago
                                                    </h6>
                                                    <div class="p-2 text-bg-light rounded-1 d-inline-block text-dark fs-3">
                                                        If I don’t like something, I’ll stay away
                                                        from it.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="hstack gap-3 align-items-start mb-7 justify-content-end">
                                                <div class="text-end">
                                                    <h6 class="fs-2 text-muted">2 hours ago</h6>
                                                    <div class="p-2 bg-info-subtle text-dark rounded-1 d-inline-block fs-3">
                                                        If I don’t like something, I’ll stay away
                                                        from it.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="hstack gap-3 align-items-start mb-7 justify-content-start">
                                                <img src="{{asset('back')}}/assets/images/profile/user-8.jpg" alt="user8" width="40" height="40" class="rounded-circle" />
                                                <div>
                                                    <h6 class="fs-2 text-muted">
                                                        Andrew, 2 hours ago
                                                    </h6>
                                                    <div class="p-2 text-bg-light rounded-1 d-inline-block text-dark fs-3">
                                                        I want more detailed information.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="hstack gap-3 align-items-start mb-7 justify-content-end">
                                                <div class="text-end">
                                                    <h6 class="fs-2 text-muted">2 hours ago</h6>
                                                    <div class="p-2 bg-info-subtle text-dark mb-1 d-inline-block rounded-1 fs-3">
                                                        If I don’t like something, I’ll stay away
                                                        from it.
                                                    </div>
                                                    <div class="p-2 bg-info-subtle text-dark rounded-1 fs-3">
                                                        They got there early, and they got really
                                                        good seats.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="hstack gap-3 align-items-start mb-7 justify-content-start">
                                                <img src="{{asset('back')}}/assets/images/profile/user-8.jpg" alt="user8" width="40" height="40" class="rounded-circle" />
                                                <div>
                                                    <h6 class="fs-2 text-muted">
                                                        Andrew, 2 hours ago
                                                    </h6>
                                                    <div class="rounded-2 overflow-hidden">
                                                        <img src="{{asset('back')}}/assets/images/products/product-1.jpg" alt="modernize-img" class="w-100" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- 5 -->
                                        <div class="chat-list chat" data-user-id="5">
                                            <div class="hstack gap-3 align-items-start mb-7 justify-content-start">
                                                <img src="{{asset('back')}}/assets/images/profile/user-8.jpg" alt="user8" width="40" height="40" class="rounded-circle" />
                                                <div>
                                                    <h6 class="fs-2 text-muted">
                                                        Andrew, 2 hours ago
                                                    </h6>
                                                    <div class="p-2 text-bg-light rounded-1 d-inline-block text-dark fs-3">
                                                        If I don’t like something, I’ll stay away
                                                        from it.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="hstack gap-3 align-items-start mb-7 justify-content-end">
                                                <div class="text-end">
                                                    <h6 class="fs-2 text-muted">2 hours ago</h6>
                                                    <div class="p-2 bg-info-subtle text-dark rounded-1 d-inline-block fs-3">
                                                        If I don’t like something, I’ll stay away
                                                        from it.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="hstack gap-3 align-items-start mb-7 justify-content-start">
                                                <img src="{{asset('back')}}/assets/images/profile/user-8.jpg" alt="user8" width="40" height="40" class="rounded-circle" />
                                                <div>
                                                    <h6 class="fs-2 text-muted">
                                                        Andrew, 2 hours ago
                                                    </h6>
                                                    <div class="p-2 text-bg-light rounded-1 d-inline-block text-dark fs-3">
                                                        I want more detailed information.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="hstack gap-3 align-items-start mb-7 justify-content-end">
                                                <div class="text-end">
                                                    <h6 class="fs-2 text-muted">2 hours ago</h6>
                                                    <div class="p-2 bg-info-subtle text-dark mb-1 d-inline-block rounded-1 fs-3">
                                                        If I don’t like something, I’ll stay away
                                                        from it.
                                                    </div>
                                                    <div class="p-2 bg-info-subtle text-dark rounded-1 fs-3">
                                                        They got there early, and they got really
                                                        good seats.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="hstack gap-3 align-items-start mb-7 justify-content-start">
                                                <img src="{{asset('back')}}/assets/images/profile/user-8.jpg" alt="user8" width="40" height="40" class="rounded-circle" />
                                                <div>
                                                    <h6 class="fs-2 text-muted">
                                                        Andrew, 2 hours ago
                                                    </h6>
                                                    <div class="rounded-2 overflow-hidden">
                                                        <img src="{{asset('back')}}/assets/images/products/product-1.jpg" alt="modernize-img" class="w-100" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-9 py-6 border-top chat-send-message-footer">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center gap-2 w-85">
                                                <a class="position-relative nav-icon-hover z-index-5" href="javascript:void(0)">
                                                    <i class="ti ti-mood-smile text-dark bg-hover-primary fs-7"></i>
                                                </a>
                                                <input type="text" class="form-control message-type-box text-muted border-0 p-0 ms-2" placeholder="Type a Message" fdprocessedid="0p3op" />
                                            </div>
                                            <ul class="list-unstyledn mb-0 d-flex align-items-center">
                                                <li>
                                                    <a class="text-dark px-2 fs-7 bg-hover-primary nav-icon-hover position-relative z-index-5" href="javascript:void(0)">
                                                        <i class="ti ti-photo-plus"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="text-dark px-2 fs-7 bg-hover-primary nav-icon-hover position-relative z-index-5" href="javascript:void(0)">
                                                        <i class="ti ti-paperclip"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="text-dark px-2 fs-7 bg-hover-primary nav-icon-hover position-relative z-index-5" href="javascript:void(0)">
                                                        <i class="ti ti-microphone"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
