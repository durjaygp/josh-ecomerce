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


        <a href="#" class="btn btn-info " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="ti ti-eye text-white"></i> See This Ticket
        </a>
        <div class="container-fluid vh-100 d-flex flex-column p-0">

            <div id="chatMessages" class="flex-grow-1 overflow-auto p-3"></div>

            @if ($support->status == 1 )
            <div class="bg-white p-3 border-top position-sticky bottom-0">
                <div class="input-group">
                         <!-- Hidden file input -->
                         <input type="file" name="image" id="imageInput">
                    <!-- Button to trigger file input -->
                    <button class="btn btn-primary" id="triggerFileInputBtn" type="button">
                        <i class="ti ti-image-file"></i>
                    </button>



                    <!-- Image preview (hidden initially) -->
                    <img id="imagePreview" src="" alt="Selected Image" style="display: none; max-width: 100px; max-height: 100px; margin-left: 10px;"/>

                    <!-- Text input for the message -->
                    <input type="text" class="form-control" name="message" placeholder="Type a message...">

                    <!-- Submit message button -->
                    <button class="btn btn-primary" id="sendMessageBtn" type="button">
                        <i class="ti ti-send"></i> Submit
                    </button>
                </div>
            </div>

            <!-- JavaScript to handle the file input and image preview -->
            <script>
                // Trigger the file input when the button is clicked
                document.getElementById('triggerFileInputBtn').addEventListener('click', function() {
                    document.getElementById('imageInput').click();  // Trigger the file input
                });

                // Show the image preview when an image is selected
                document.getElementById('imageInput').addEventListener('change', function(event) {
                    let file = event.target.files[0];  // Get the selected file
                    let imagePreview = document.getElementById('imagePreview');

                    if (file) {
                        let reader = new FileReader();
                        reader.onload = function(e) {
                            imagePreview.src = e.target.result;  // Set the image source to the file's data URL
                            imagePreview.style.display = 'block';  // Show the image preview
                        };
                        reader.readAsDataURL(file);  // Read the file as a data URL
                    } else {
                        imagePreview.src = '';  // Clear the image preview if no file is selected
                        imagePreview.style.display = 'none';  // Hide the image preview
                    }
                });
            </script>

            @endif

        </div>
    </div>

      <!-- Modal -->
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myLargeModalLabel">
                 {{$support->title}}
                    </h4>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="{{asset($support->image ?? "")}}" alt="" class="img-fluid">
                    <p>Reason: {{$support->reason}}</p>
                    <p>Type: {{$support->type}}</p>
                    <p>Priority: {{$support->priority}}</p>
                    <p>Description: {{$support->description}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-danger-subtle text-danger waves-effect text-start" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->



@endsection
{{-- @section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let supportId = '{{ $support->id }}';
        let userImage = '{{ asset(auth()->user()->image) }}';
        let sendMessageBtn = document.getElementById('sendMessageBtn');
        let chatMessages = document.getElementById('chatMessages');
        let messageInput = document.querySelector('input[name="message"]');
        let imageInput = document.querySelector('input[name="image"]');
        let imagePreview = document.getElementById('imagePreview');
        let isUserNearBottom = true;

        // Poll for new messages every 5 seconds
        setInterval(function() {
            fetchMessages(supportId);
        }, 5000);

        // Send message when the send button is clicked
        if (sendMessageBtn) {
            sendMessageBtn.addEventListener('click', function() {
                let message = messageInput.value.trim();
                let imageFile = imageInput.files[0];

                // Don't send if both message and image are empty
                if (!message && !imageFile) {
                    alert("Please enter a message or select an image.");
                    return;
                }

                sendMessage(supportId, message, imageFile);

                // Clear input after sending
                messageInput.value = '';
                imageInput.value = '';    // Reset file input
                imagePreview.style.display = 'none';  // Hide image preview
                imagePreview.src = '';  // Clear the preview
            });
        }

        // Function to send a message via AJAX
        function sendMessage(supportId, message, imageFile) {
            let formData = new FormData();  // Use FormData to send both text and image
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('message', message);
            formData.append('support_id', supportId);

            if (imageFile) {
                formData.append('image', imageFile);
            }

            $.ajax({
                type: 'POST',
                url: '{{ route('chat.send') }}',
                data: formData,
                processData: false,
                contentType: false,  // Required for FormData
                success: function(response) {
                    fetchMessages(supportId);  // Fetch new messages after sending
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
                    chatMessages.innerHTML = '';  // Clear existing messages

                    if (messages.length > 0) {
                        messages.forEach((message) => {
                            appendMessage(message);
                        });
                    } else {
                        chatMessages.innerHTML = '<p class="text-center text-muted">No messages yet.</p>';
                    }

                    // Scroll to bottom only if the user is near the bottom
                    if (isUserNearBottom) {
                        chatMessages.scrollTop = chatMessages.scrollHeight;
                    }
                },
                error: function(xhr) {
                    console.log('Error fetching messages:', xhr.responseText);
                }
            });
        }

        // Function to append a message to the chat
        function appendMessage(message) {
            let currentUserId = '{{ auth()->id() }}';
            let isSender = (message.user_id == currentUserId);
            let receiverImage = message.user.image ? `{{ asset('${message.user.image}') }}` : '/path-to-default-avatar.png';

            // Format message timestamp
            let messageTime = new Date(message.created_at);
            let options = { month: 'short', day: 'numeric', hour: 'numeric', minute: 'numeric', hour12: true };
            let formattedTime = messageTime.toLocaleString('en-US', options);

            let messageHtml = `
                <div class="chat-message ${isSender ? 'chat-message-sender' : 'chat-message-receiver'}">
                    ${!isSender ? `<img src="${receiverImage}" alt="User Avatar" class="avatar">` : ''}
                    <div class="message-content">
                        <p>${message.message ? message.message : ''}</p>
                        ${message.image ? `<img src="/storage/${message.image}" alt="Attached Image" class="attached-image" style="max-width: 150px;">` : ''}
                        <small class="text-muted">${formattedTime}</small>
                    </div>
                    ${isSender ? `<img src="${userImage}" alt="User Avatar" class="avatar">` : ''}
                </div>
            `;

            $('#chatMessages').append(messageHtml);
        }

        // Scroll event listener to detect if user is near bottom
        chatMessages.addEventListener('scroll', function() {
            isUserNearBottom = chatMessages.scrollTop + chatMessages.clientHeight >= chatMessages.scrollHeight - 10;
        });

        // Trigger the file input when the button is clicked
        document.getElementById('triggerFileInputBtn').addEventListener('click', function() {
            document.getElementById('imageInput').click();  // Trigger the file input
        });

        // Show the image preview when an image is selected
        document.getElementById('imageInput').addEventListener('change', function(event) {
            let file = event.target.files[0];  // Get the selected file

            if (file) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;  // Set the image source to the file's data URL
                    imagePreview.style.display = 'block';  // Show the image preview
                };
                reader.readAsDataURL(file);  // Read the file as a data URL
            } else {
                imagePreview.src = '';  // Clear the image preview if no file is selected
                imagePreview.style.display = 'none';  // Hide the image preview
            }
        });
    });
</script>

@endsection --}}

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

            // Poll for new messages every 5 seconds
            setInterval(function() {
                fetchMessages(supportId);
            }, 5000);  // Poll every 5 seconds

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

{{--@section('script')--}}
{{--    <script>--}}
{{--        document.addEventListener('DOMContentLoaded', function() {--}}
{{--    let supportId = '{{ $support->id }}';  // Get the current support ticket ID--}}
{{--    let userImage = '{{asset(auth()->user()->image)}}';  // Get the current user's avatar--}}
{{--    let sendMessageBtn = document.getElementById('sendMessageBtn');--}}
{{--    let chatMessages = document.getElementById('chatMessages');--}}
{{--    let messageInput = document.querySelector('input[name="message"]');--}}

{{--    // Fetch initial chat messages--}}
{{--    fetchMessages(supportId);--}}

{{--    // Send message when the send button is clicked--}}
{{--    if (sendMessageBtn) {--}}
{{--        sendMessageBtn.addEventListener('click', function() {--}}
{{--            let message = messageInput.value.trim();--}}
{{--            if (message !== '') {--}}
{{--                sendMessage(supportId, message);--}}
{{--                messageInput.value = '';  // Clear input after sending--}}
{{--            }--}}
{{--        });--}}
{{--    }--}}

{{--    // Function to send message via AJAX--}}
{{--    function sendMessage(supportId, message) {--}}
{{--        $.ajax({--}}
{{--            type: 'POST',--}}
{{--            url: '{{ route('chat.send') }}',--}}
{{--            data: {--}}
{{--                _token: '{{ csrf_token() }}',--}}
{{--                message: message,--}}
{{--                support_id: supportId--}}
{{--            },--}}
{{--            success: function(response) {--}}
{{--                fetchMessages(supportId);  // Fetch new messages after sending--}}
{{--                console.log('Message sent successfully.');--}}
{{--            },--}}
{{--            error: function(xhr) {--}}
{{--                console.log('Error sending message:', xhr.responseText);--}}
{{--            }--}}
{{--        });--}}
{{--    }--}}

{{--    // Function to fetch chat messages--}}
{{--    function fetchMessages(supportId) {--}}
{{--        $.ajax({--}}
{{--            type: 'GET',--}}
{{--            url: `/chat/messages/${supportId}`,--}}
{{--            success: function(messages) {--}}
{{--                // Clear existing messages--}}
{{--                chatMessages.innerHTML = '';--}}

{{--                // Check if there are messages to display--}}
{{--                if (messages.length > 0) {--}}
{{--                    messages.forEach((message) => {--}}
{{--                        appendMessage(message);--}}
{{--                    });--}}
{{--                } else {--}}
{{--                    chatMessages.innerHTML = '<p class="text-center text-muted">No messages yet.</p>';--}}
{{--                }--}}
{{--            },--}}
{{--            error: function(xhr) {--}}
{{--                console.log('Error fetching messages:', xhr.responseText);--}}
{{--            }--}}
{{--        });--}}
{{--    }--}}

{{--    // Function to append a message to the chat--}}
{{--    function appendMessage(message) {--}}
{{--        let currentUserId = '{{ auth()->id() }}'; // Get the current user's ID--}}
{{--        let isSender = (message.user_id == currentUserId); // Check if the message is from the current user--}}
{{--        let receiverImage = message.user.image ? `{{ asset('${message.user.image}') }}` : '/path-to-default-avatar.png';--}}

{{--        // Format message timestamp dynamically--}}
{{--        let messageTime = new Date(message.created_at);--}}
{{--        let options = { month: 'short', day: 'numeric', hour: 'numeric', minute: 'numeric', hour12: true };--}}
{{--        let formattedTime = messageTime.toLocaleString('en-US', options); // e.g., "Mar 10, 08:20 PM"--}}

{{--        let messageHtml = `--}}
{{--            <div class="chat-message ${isSender ? 'chat-message-sender' : 'chat-message-receiver'}">--}}
{{--                ${!isSender ? `<img src="${receiverImage}" alt="User Avatar">` : ''}--}}
{{--                <div class="message-content">--}}
{{--                    <p>${message.message}</p>--}}
{{--                    <small class="text-muted">${formattedTime}</small>  <!-- Timestamp below the message -->--}}
{{--                </div>--}}
{{--                ${isSender ? `<img src="${userImage}" alt="User Avatar">` : ''}--}}
{{--            </div>--}}
{{--        `;--}}

{{--        // Append the new message HTML--}}
{{--        $('#chatMessages').append(messageHtml);--}}

{{--        // Scroll to the bottom of the chat after appending--}}
{{--        chatMessages.scrollTop = chatMessages.scrollHeight;--}}
{{--    }--}}
{{--});--}}

{{--    </script>--}}
{{--@endsection--}}


