@extends('user.master')
@section('title',$support->title)
@section('content')
    <style>
        /* General chat application styles */
        .chat-application {
            display: flex;
            flex-direction: column;
            height: 100vh;
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
            overflow-y: auto;
        }

        .chat-send-message-footer {
            position: sticky;
            bottom: 0;
            background-color: white;
            z-index: 10;
        }

        /* Sender message (current user) */
        .chat-message-receiver {
            justify-content: flex-start;
            text-align: left;
        }

        .chat-message-receiver .message-content {
            background-color: #e2ffe6; /* Light green */
            color: #333;
        }

        /* Receiver message (other users) */
        .chat-message-sender {
            justify-content: flex-end;
            text-align: right;
        }

        .chat-message-sender .message-content {
            background-color: #f1f1f1; /* Light grey */
            color: #333;
        }

        /* General message styling */
        .chat-message {
            display: flex;
            margin-bottom: 10px;
        }

        .message-content {
            padding: 10px 15px;
            border-radius: 10px;
            max-width: 70%;
        }

        .message-content p {
            margin: 0;
        }

        .chat-message img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        /* Avatar for sender and receiver */
        .chat-message-receiver img {
            margin-right: 10px;
        }

        .chat-message-sender img {
            margin-left: 10px;
        }
        .message-content small {
            display: block;
            margin-top: 5px;
            font-size: 12px;
            color: #999;
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
            <div id="chatMessages" class="flex-grow-1 overflow-auto p-3"></div>

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
@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    let supportId = '{{ $support->id }}';  // Get the current support ticket ID
    let userImage = '{{asset(auth()->user()->image)}}';  // Get the current user's avatar
    let sendMessageBtn = document.getElementById('sendMessageBtn');
    let chatMessages = document.getElementById('chatMessages');
    let messageInput = document.querySelector('input[name="message"]');

    // Fetch initial chat messages
    fetchMessages(supportId);

    // Send message when the send button is clicked
    if (sendMessageBtn) {
        sendMessageBtn.addEventListener('click', function() {
            let message = messageInput.value.trim();
            if (message !== '') {
                sendMessage(supportId, message);
                messageInput.value = '';  // Clear input after sending
            }
        });
    }

    // Function to send message via AJAX
    function sendMessage(supportId, message) {
        $.ajax({
            type: 'POST',
            url: '{{ route('chat.send') }}',
            data: {
                _token: '{{ csrf_token() }}',
                message: message,
                support_id: supportId
            },
            success: function(response) {
                fetchMessages(supportId);  // Fetch new messages after sending
                console.log('Message sent successfully.');
            },
            error: function(xhr) {
                console.log('Error sending message:', xhr.responseText);
            }
        });
    }

    // Function to fetch chat messages
    function fetchMessages(supportId) {
        $.ajax({
            type: 'GET',
            url: `/chat/messages/${supportId}`,
            success: function(messages) {
                // Clear existing messages
                chatMessages.innerHTML = '';

                // Check if there are messages to display
                if (messages.length > 0) {
                    messages.forEach((message) => {
                        appendMessage(message);
                    });
                } else {
                    chatMessages.innerHTML = '<p class="text-center text-muted">No messages yet.</p>';
                }
            },
            error: function(xhr) {
                console.log('Error fetching messages:', xhr.responseText);
            }
        });
    }

    // Function to append a message to the chat
    function appendMessage(message) {
        let currentUserId = '{{ auth()->id() }}'; // Get the current user's ID
        let isSender = (message.user_id == currentUserId); // Check if the message is from the current user
        let receiverImage = message.user.image ? `{{ asset('${message.user.image}') }}` : '/path-to-default-avatar.png';

        // Format message timestamp dynamically
        let messageTime = new Date(message.created_at);
        let options = { month: 'short', day: 'numeric', hour: 'numeric', minute: 'numeric', hour12: true };
        let formattedTime = messageTime.toLocaleString('en-US', options); // e.g., "Mar 10, 08:20 PM"

        let messageHtml = `
            <div class="chat-message ${isSender ? 'chat-message-sender' : 'chat-message-receiver'}">
                ${!isSender ? `<img src="${receiverImage}" alt="User Avatar">` : ''}
                <div class="message-content">
                    <p>${message.message}</p>
                    <small class="text-muted">${formattedTime}</small>  <!-- Timestamp below the message -->
                </div>
                ${isSender ? `<img src="${userImage}" alt="User Avatar">` : ''}
            </div>
        `;

        // Append the new message HTML
        $('#chatMessages').append(messageHtml);

        // Scroll to the bottom of the chat after appending
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }
});

    </script>
@endsection


