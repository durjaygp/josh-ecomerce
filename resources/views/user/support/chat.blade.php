@extends('user.master')
@section('title',$support->title)
@section('content')
    <style>
        .chat-application {
            display: flex;
            flex-direction: column;
            height: 100vh; /* Ensures the chat takes the full height of the viewport */
        }

        .chat-container {
            flex: 1;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .chat-box-inner-part {
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .chat-box {
            flex: 1;
            overflow-y: auto; /* Allows the chat content to scroll */
        }

        .chat-send-message-footer {
            position: sticky;
            bottom: 0;
            background-color: white; /* Ensures background visibility */
            z-index: 10; /* Ensures it stays on top */
        }

    </style>
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
        <div class="container-fluid vh-100 d-flex flex-column p-0">
            <!-- Chat Header -->
            <div class="bg-primary text-white p-3 d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-3">
                    <img src="{{asset('back')}}/assets/images/profile/user-3.jpg" alt="User Avatar" class="rounded-circle" width="40" height="40">
                    <div>
                        <h6 class="mb-0">Andrew</h6>
                        <small>Away</small>
                    </div>
                </div>
                <div>
                    <button class="btn btn-light btn-sm me-2">
                        <i class="ti ti-phone"></i>
                    </button>
                    <button class="btn btn-light btn-sm me-2">
                        <i class="ti ti-video"></i>
                    </button>
                    <button class="btn btn-light btn-sm">
                        <i class="ti ti-menu-2"></i>
                    </button>
                </div>
            </div>

            <!-- Chat Messages -->
            <div class="flex-grow-1 overflow-auto p-3" id="chatMessages">
                <!-- Received Message -->
                <div class="d-flex mb-3">
                    <img src="{{asset('back')}}/assets/images/profile/user-8.jpg" alt="User Avatar" class="rounded-circle" width="40" height="40">
                    <div class="ms-2">
                        <div class="bg-light p-2 rounded">
                            <p class="mb-0">If I don’t like something, I’ll stay away from it.</p>
                        </div>
                        <small class="text-muted">2 hours ago</small>
                    </div>
                </div>
                <!-- Received Message -->
                <div class="d-flex mb-3">
                    <img src="{{asset('back')}}/assets/images/profile/user-8.jpg" alt="User Avatar" class="rounded-circle" width="40" height="40">
                    <div class="ms-2">
                        <div class="bg-light p-2 rounded">
                            <p class="mb-0">If I don’t like something, I’ll stay away from it.</p>
                        </div>
                        <small class="text-muted">2 hours ago</small>
                    </div>
                </div>
                <!-- Received Message -->
                <div class="d-flex mb-3">
                    <img src="{{asset('back')}}/assets/images/profile/user-8.jpg" alt="User Avatar" class="rounded-circle" width="40" height="40">
                    <div class="ms-2">
                        <div class="bg-light p-2 rounded">
                            <p class="mb-0">If I don’t like something, I’ll stay away from it.</p>
                        </div>
                        <small class="text-muted">2 hours ago</small>
                    </div>
                </div>
                <!-- Received Message -->
                <div class="d-flex mb-3">
                    <img src="{{asset('back')}}/assets/images/profile/user-8.jpg" alt="User Avatar" class="rounded-circle" width="40" height="40">
                    <div class="ms-2">
                        <div class="bg-light p-2 rounded">
                            <p class="mb-0">If I don’t like something, I’ll stay away from it.</p>
                        </div>
                        <small class="text-muted">2 hours ago</small>
                    </div>
                </div>
                <!-- Received Message -->
                <div class="d-flex mb-3">
                    <img src="{{asset('back')}}/assets/images/profile/user-8.jpg" alt="User Avatar" class="rounded-circle" width="40" height="40">
                    <div class="ms-2">
                        <div class="bg-light p-2 rounded">
                            <p class="mb-0">If I don’t like something, I’ll stay away from it.</p>
                        </div>
                        <small class="text-muted">2 hours ago</small>
                    </div>
                </div>
                <!-- Received Message -->
                <div class="d-flex mb-3">
                    <img src="{{asset('back')}}/assets/images/profile/user-8.jpg" alt="User Avatar" class="rounded-circle" width="40" height="40">
                    <div class="ms-2">
                        <div class="bg-light p-2 rounded">
                            <p class="mb-0">If I don’t like something, I’ll stay away from it.</p>
                        </div>
                        <small class="text-muted">2 hours ago</small>
                    </div>
                </div>

                <!-- Sent Message -->
                <div class="d-flex justify-content-end mb-3">
                    <div class="text-end">
                        <div class="bg-info text-white p-2 rounded">
                            <p class="mb-0">I understand. That makes sense!</p>
                        </div>
                        <small class="text-muted">1 hour ago</small>
                    </div>
                </div>
                <!-- Sent Message -->
                <div class="d-flex justify-content-end mb-3">
                    <div class="text-end">
                        <div class="bg-info text-white p-2 rounded">
                            <p class="mb-0">I understand. That makes sense!</p>
                        </div>
                        <small class="text-muted">1 hour ago</small>
                    </div>
                </div>
                <!-- Sent Message -->
                <div class="d-flex justify-content-end mb-3">
                    <div class="text-end">
                        <div class="bg-info text-white p-2 rounded">
                            <p class="mb-0">I understand. That makes sense!</p>
                        </div>
                        <small class="text-muted">1 hour ago</small>
                    </div>
                </div>
                <!-- Sent Message -->
                <div class="d-flex justify-content-end mb-3">
                    <div class="text-end">
                        <div class="bg-info text-white p-2 rounded">
                            <p class="mb-0">I understand. That makes sense!</p>
                        </div>
                        <small class="text-muted">1 hour ago</small>
                    </div>
                </div>
                <!-- Sent Message -->
                <div class="d-flex justify-content-end mb-3">
                    <div class="text-end">
                        <div class="bg-info text-white p-2 rounded">
                            <p class="mb-0">I understand. That makes sense!</p>
                        </div>
                        <small class="text-muted">1 hour ago</small>
                    </div>
                </div>
            </div>

            <!-- Chat Input -->
            <div class="bg-white p-3 border-top position-sticky bottom-0">
                <div class="input-group">
                    <button class="btn btn-outline-secondary" type="button">
                        <i class="ti ti-mood-smile"></i>
                    </button>
                    <input type="text" class="form-control" placeholder="Type a message...">
                    <button class="btn btn-outline-secondary" type="button">
                        <i class="ti ti-photo-plus"></i>
                    </button>
                    <button class="btn btn-outline-secondary" type="button">
                        <i class="ti ti-paperclip"></i>
                    </button>
                    <button class="btn btn-outline-secondary" type="button">
                        <i class="ti ti-microphone"></i>
                    </button>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('style')
    @vite('resources/js/app.js')
@endsection
