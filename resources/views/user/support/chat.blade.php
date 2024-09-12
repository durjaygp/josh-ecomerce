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
{{--            <!-- Chat Header -->--}}
{{--            <div class="bg-primary text-white p-3 d-flex align-items-center justify-content-between">--}}
{{--                <div class="d-flex align-items-center gap-3">--}}
{{--                    <img src="{{asset('back')}}/assets/images/profile/user-3.jpg" alt="User Avatar" class="rounded-circle" width="40" height="40">--}}
{{--                    <div>--}}
{{--                        <h6 class="mb-0">Andrew</h6>--}}
{{--                        <small>Away</small>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div>--}}
{{--                    <button class="btn btn-light btn-sm me-2">--}}
{{--                        <i class="ti ti-phone"></i>--}}
{{--                    </button>--}}
{{--                    <button class="btn btn-light btn-sm me-2">--}}
{{--                        <i class="ti ti-video"></i>--}}
{{--                    </button>--}}
{{--                    <button class="btn btn-light btn-sm">--}}
{{--                        <i class="ti ti-menu-2"></i>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- Chat Messages -->--}}
{{--            <div class="flex-grow-1 overflow-auto p-3" id="chatMessages">--}}
{{--                <!-- Received Message -->--}}
{{--                <div class="d-flex mb-3">--}}
{{--                    <img src="{{asset('back')}}/assets/images/profile/user-8.jpg" alt="User Avatar" class="rounded-circle" width="40" height="40">--}}
{{--                    <div class="ms-2">--}}
{{--                        <div class="bg-light p-2 rounded">--}}
{{--                            <p class="mb-0">If I don’t like something, I’ll stay away from it.</p>--}}
{{--                        </div>--}}
{{--                        <small class="text-muted">2 hours ago</small>--}}
{{--                    </div>--}}
{{--                </div>--}}


{{--                <!-- Sent Message -->--}}
{{--                <div class="d-flex justify-content-end mb-3">--}}
{{--                    <div class="text-end">--}}
{{--                        <div class="bg-info text-white p-2 rounded">--}}
{{--                            <p class="mb-0">I understand. That makes sense!</p>--}}
{{--                        </div>--}}
{{--                        <small class="text-muted">1 hour ago</small>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}

{{--            <!-- Chat Input -->--}}
{{--            <div class="bg-white p-3 border-top position-sticky bottom-0">--}}
{{--                <div class="input-group">--}}
{{--                    <input type="text" class="form-control" placeholder="Type a message...">--}}
{{--                    <button class="btn btn-primary" type="button">--}}
{{--                        <i class="ti ti-send"></i> Submit--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div id="chatMessages" class="flex-grow-1 overflow-auto p-3">
{{--                @foreach($messages as $message)--}}
{{--                    <div class="d-flex {{ $message->user_id === auth()->id() ? 'justify-content-end' : '' }} mb-3">--}}
{{--                        <div class="{{ $message->user_id === auth()->id() ? 'bg-info text-white' : 'bg-light' }} p-2 rounded">--}}
{{--                            <p class="mb-0">{{ $message->message }}</p>--}}
{{--                        </div>--}}
{{--                        <br>--}}
{{--                        <small class="text-muted">{{ $message->created_at->format('d M Y') }}</small>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
            </div>

            <div class="bg-white p-3 border-top position-sticky bottom-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="message" placeholder="Type a message...">
                    <button class="btn btn-primary" id="sendMessageBtn" type="button">
                        <i class="ti ti-send"></i> Submit
                    </button>
                </div>
            </div>
        </div>



    </div>
@endsection
@section('style')

    <script>
        Echo.private(`chat.${support_id}`)
            .listen('MessageSent', (e) => {
                let message = `
            <div class="d-flex mb-3">
                <img src="/path-to-avatar/${e.user_id}" alt="User Avatar" class="rounded-circle" width="40" height="40">
                <div class="ms-2">
                    <div class="bg-light p-2 rounded">
                        <p class="mb-0">${e.message}</p>
                    </div>
                    <small class="text-muted">${e.created_at}</small>
                </div>
            </div>
        `;
                $('#chatMessages').append(message);
            });

    </script>
{{--    <script>--}}
{{--        document.addEventListener('DOMContentLoaded', function () {--}}
{{--            const chatBox = document.getElementById('chatMessages');--}}
{{--            const supportId = '{{ $supportId }}';--}}

{{--            // Fetch chat messages--}}
{{--            function fetchMessages() {--}}
{{--                fetch(`/chat/messages/${supportId}`)--}}
{{--                    .then(response => response.json())--}}
{{--                    .then(data => {--}}
{{--                        chatBox.innerHTML = '';--}}
{{--                        data.forEach(message => {--}}
{{--                            const messageElement = `<div class="d-flex ${message.user_id === {{ auth()->id() }} ? 'justify-content-end' : ''} mb-3">--}}
{{--                        <div class="${message.user_id === {{ auth()->id() }} ? 'bg-info text-white' : 'bg-light'} p-2 rounded">--}}
{{--                            <p class="mb-0">${message.message}</p>--}}
{{--                        </div>--}}
{{--                        <small class="text-muted">${message.created_at}</small>--}}
{{--                    </div>`;--}}
{{--                            chatBox.innerHTML += messageElement;--}}
{{--                        });--}}
{{--                        chatBox.scrollTop = chatBox.scrollHeight; // Scroll to bottom--}}
{{--                    });--}}
{{--            }--}}

{{--            // Fetch messages every 5 seconds--}}
{{--            setInterval(fetchMessages, 5000);--}}

{{--            // Send message--}}
{{--            document.getElementById('sendMessageBtn').addEventListener('click', function () {--}}
{{--                const messageInput = document.querySelector('input[name="message"]').value;--}}
{{--                const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');--}}

{{--                fetch('/chat/send', {--}}
{{--                    method: 'POST',--}}
{{--                    headers: {--}}
{{--                        'Content-Type': 'application/json',--}}
{{--                        'X-CSRF-TOKEN': token--}}
{{--                    },--}}
{{--                    body: JSON.stringify({--}}
{{--                        message: messageInput,--}}
{{--                        support_id: supportId,--}}
{{--                    })--}}
{{--                })--}}
{{--                    .then(response => response.json())--}}
{{--                    .then(data => {--}}
{{--                        fetchMessages();--}}
{{--                        document.querySelector('input[name="message"]').value = ''; // Clear input--}}
{{--                    });--}}
{{--            });--}}
{{--        });--}}

{{--    </script>--}}
@endsection
