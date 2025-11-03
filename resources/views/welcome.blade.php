<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Auto Reply Chat API | {{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        
        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                :root {
                    --primary: #4361ee;
                    --primary-light: #4895ef;
                    --secondary: #3f37c9;
                    --success: #4cc9f0;
                    --dark: #212529;
                    --light: #f8f9fa;
                    --gray: #6c757d;
                    --border-radius: 8px;
                    --box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                    --transition: all 0.3s ease;
                }
                
                * {
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                }
                
                body {
                    font-family: 'Instrument Sans', sans-serif;
                    line-height: 1.6;
                    color: var(--dark);
                    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
                    min-height: 100vh;
                    padding: 20px;
                }
                
                .container {
                    max-width: 1200px;
                    margin: 0 auto;
                }
                
                header {
                    text-align: center;
                    padding: 3rem 1rem;
                    margin-bottom: 2rem;
                }
                
                h1 {
                    font-size: 3rem;
                    font-weight: 700;
                    background: linear-gradient(to right, var(--primary), var(--secondary));
                    -webkit-background-clip: text;
                    background-clip: text;
                    color: transparent;
                    margin-bottom: 1rem;
                }
                
                .subtitle {
                    font-size: 1.25rem;
                    color: var(--gray);
                    max-width: 600px;
                    margin: 0 auto;
                }
                
                .content {
                    display: grid;
                    grid-template-columns: 1fr 1fr;
                    gap: 2rem;
                    margin-bottom: 3rem;
                }
                
                @media (max-width: 768px) {
                    .content {
                        grid-template-columns: 1fr;
                    }
                }
                
                .card {
                    background: white;
                    border-radius: var(--border-radius);
                    box-shadow: var(--box-shadow);
                    padding: 2rem;
                    transition: var(--transition);
                }
                
                .card:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
                }
                
                .card h2 {
                    color: var(--primary);
                    margin-bottom: 1rem;
                    font-size: 1.5rem;
                }
                
                .card p {
                    color: var(--gray);
                    margin-bottom: 1.5rem;
                }
                
                .api-section {
                    background: white;
                    border-radius: var(--border-radius);
                    box-shadow: var(--box-shadow);
                    padding: 2rem;
                    margin-bottom: 2rem;
                }
                
                .api-section h2 {
                    color: var(--primary);
                    margin-bottom: 1.5rem;
                    font-size: 1.75rem;
                }
                
                .endpoint {
                    background: var(--light);
                    border-radius: var(--border-radius);
                    padding: 1.5rem;
                    margin-bottom: 1.5rem;
                    border-left: 4px solid var(--primary);
                }
                
                .endpoint:last-child {
                    margin-bottom: 0;
                }
                
                .method {
                    display: inline-block;
                    padding: 0.25rem 0.75rem;
                    background: var(--primary);
                    color: white;
                    border-radius: 4px;
                    font-weight: 600;
                    font-size: 0.875rem;
                    margin-right: 0.5rem;
                }
                
                .method.get {
                    background: #28a745;
                }
                
                .method.post {
                    background: #007bff;
                }
                
                .method.put {
                    background: #ffc107;
                    color: var(--dark);
                }
                
                .path {
                    font-family: monospace;
                    font-size: 1.1rem;
                    color: var(--dark);
                }
                
                .description {
                    margin-top: 0.75rem;
                    color: var(--gray);
                }
                
                .features {
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                    gap: 1.5rem;
                    margin-top: 2rem;
                }
                
                .feature {
                    display: flex;
                    align-items: flex-start;
                    gap: 1rem;
                }
                
                .feature-icon {
                    background: var(--primary-light);
                    color: white;
                    width: 40px;
                    height: 40px;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    flex-shrink: 0;
                }
                
                .feature-content h3 {
                    font-size: 1.1rem;
                    margin-bottom: 0.5rem;
                }
                
                .feature-content p {
                    color: var(--gray);
                    font-size: 0.9rem;
                }
                
                footer {
                    text-align: center;
                    padding: 2rem 0;
                    color: var(--gray);
                    font-size: 0.9rem;
                    border-top: 1px solid rgba(0,0,0,0.1);
                    margin-top: 3rem;
                }
                
                .highlight {
                    background: linear-gradient(120deg, var(--success) 0%, var(--success) 100%);
                    background-repeat: no-repeat;
                    background-size: 100% 0.2em;
                    background-position: 0 88%;
                    transition: background-size 0.25s ease-in;
                }
                
                .highlight:hover {
                    background-size: 100% 88%;
                }
                 .chat-section {
        margin-top: 3rem;
        padding: 2rem 0;
    }
        
        .chat-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 2rem;
        }
        
        .chat-container h2 {
            color: var(--primary);
            margin-bottom: 0.5rem;
            font-size: 1.75rem;
        }
        
        .chat-description {
            color: var(--gray);
            margin-bottom: 1.5rem;
        }
        
        .chat-interface {
            border: 1px solid #e9ecef;
            border-radius: var(--border-radius);
            overflow: hidden;
        }
        
        .chat-messages {
            height: 300px;
            overflow-y: auto;
            padding: 1.5rem;
            background: #f8f9fa;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        
        .message {
            display: flex;
            max-width: 80%;
        }
        
        .user-message {
            align-self: flex-end;
        }
        
        .bot-message {
            align-self: flex-start;
        }
        
        .message-content {
            padding: 0.75rem 1rem;
            border-radius: 18px;
            font-size: 0.95rem;
            line-height: 1.4;
        }
        
        .user-message .message-content {
            background: var(--primary);
            color: white;
            border-bottom-right-radius: 4px;
        }
        
        .bot-message .message-content {
            background: white;
            color: var(--dark);
            border: 1px solid #e9ecef;
            border-bottom-left-radius: 4px;
        }
        
        .chat-form {
            padding: 1.5rem;
            background: white;
            border-top: 1px solid #e9ecef;
        }
        
        .input-group {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }
        
        #messageInput {
            flex: 1;
            padding: 0.75rem 1rem;
            border: 1px solid #ddd;
            border-radius: 24px;
            font-family: 'Instrument Sans', sans-serif;
            font-size: 1rem;
            outline: none;
            transition: var(--transition);
        }
        
        #messageInput:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(67, 97, 238, 0.2);
        }
        
        .send-button {
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 50%;
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
        }
        
        .send-button:hover {
            background: var(--secondary);
            transform: scale(1.05);
        }
        
        .send-button:disabled {
            background: var(--gray);
            cursor: not-allowed;
            transform: none;
        }
        
        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border: 0;
        }
        
        .typing-indicator {
            display: none;
            align-self: flex-start;
            padding: 0.75rem 1rem;
            background: white;
            border: 1px solid #e9ecef;
            border-radius: 18px;
            border-bottom-left-radius: 4px;
        }
        
        .typing-dots {
            display: flex;
            gap: 4px;
        }
        
        .typing-dot {
            width: 6px;
            height: 6px;
            background: var(--gray);
            border-radius: 50%;
            animation: typing 1.4s infinite ease-in-out;
        }
        
        .typing-dot:nth-child(1) { animation-delay: -0.32s; }
        .typing-dot:nth-child(2) { animation-delay: -0.16s; }
        
        @keyframes typing {
            0%, 80%, 100% { transform: scale(0.8); opacity: 0.5; }
            40% { transform: scale(1); opacity: 1; }
        }
            </style>
        @endif
    </head>
    <body>
        <div class="container">
            <header>
                <h1>Auto Reply Chat API</h1>
                <p class="subtitle">Intelligent automated responses for your chat applications. Build smarter conversational experiences with our easy-to-integrate API.</p>
            </header>
            
            <div class="content">
                <div class="card">
                    <h2>About the API</h2>
                    <p>The Auto Reply Chat API provides a robust solution for implementing intelligent automated responses in your chat applications. Whether you're building a customer support system, a virtual assistant, or any chat-based interface, our API helps you deliver contextually appropriate responses automatically.</p>
                    
                    <div class="features">
                        <div class="feature">
                            <div class="feature-icon">✓</div>
                            <div class="feature-content">
                                <h3>Easy Integration</h3>
                                <p>Simple RESTful endpoints for quick implementation</p>
                            </div>
                        </div>
                        <div class="feature">
                            <div class="feature-icon">✓</div>
                            <div class="feature-content">
                                <h3>Secure</h3>
                                <p>Protected with Sanctum authentication</p>
                            </div>
                        </div>
                        <div class="feature">
                            <div class="feature-icon">✓</div>
                            <div class="feature-content">
                                <h3>Scalable</h3>
                                <p>Designed to handle high volumes of requests</p>
                            </div>
                        </div>
                        <div class="feature">
                            <div class="feature-icon">✓</div>
                            <div class="feature-content">
                                <h3>Customizable</h3>
                                <p>Easily adapt responses to your specific needs</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <h2>Getting Started</h2>
                    <p>To use the Auto Reply Chat API, you'll need to authenticate your requests using Sanctum tokens. All endpoints (except the public ones) require authentication.</p>
                    
                    <p>Start by obtaining an API token through our authentication system, then include it in the Authorization header of your requests as a Bearer token.</p>
                    
                    <p>The API follows standard HTTP response codes and returns data in JSON format. Error responses include detailed messages to help with debugging.</p>
                    
                </div>
            </div>
            
            <div class="api-section">
                <h2>API Endpoints</h2>
                
                <div class="endpoint">
                    <span class="method get">GET</span>
                    <span class="path">http://127.0.0.1/auto-replies</span>
                    <div class="description">Retrieve all auto-reply configurations. Returns a list of all automated responses set up in the system.</div>
                </div>
                
                <div class="endpoint">
                    <span class="method post">POST</span>
                    <span class="path">http://127.0.0.1/auto-replies</span>
                    <div class="description">Create a new auto-reply configuration. Send the trigger phrases and response content in the request body.</div>
                </div>
                
                <div class="endpoint">
                    <span class="method put">PUT</span>
                    <span class="path">http://127.0.0.1/auto-replies/{id}</span>
                    <div class="description">Update an existing auto-reply configuration. Replace {id} with the specific auto-reply ID you want to modify.</div>
                </div>
                
                <div class="endpoint">
                    <span class="method post">POST</span>
                    <span class="path">http://127.0.0.1/chat/auto-reply</span>
                    <div class="description">Get an automated response for a chat message. Send the user's message and receive the appropriate automated reply.</div>
                </div>
            </div>
        </div>

                <div class="chat-section">
            <div class="chat-container">
                <h2>Test the Auto-Reply Feature</h2>
                <p class="chat-description">Try sending a message to see the auto-reply in action</p>
                
                <div class="chat-interface">
                    <div class="chat-messages" id="chatMessages">
                        <div class="message bot-message">
                            {{-- <div class="message-content">
                                Hello! I'm your auto-reply assistant. Try sending messages like "hello", "appointment", or "emergency" to see different responses.
                            </div> --}}
                        </div>
                    </div>
                    
                    <form id="chatForm" class="chat-form">
                        @csrf
                        <div class="input-group">
                            <label for="messageInput" class="sr-only">Type your message</label>
                            <input 
                                type="text" 
                                id="messageInput" 
                                name="message" 
                                placeholder="Type your message here..." 
                                required
                                autocomplete="off"
                            >
                            <button type="submit" class="send-button">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M22 2L11 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M22 2L15 22L11 13L2 9L22 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const chatForm = document.getElementById('chatForm');
                const messageInput = document.getElementById('messageInput');
                const chatMessages = document.getElementById('chatMessages');
                
                chatForm.addEventListener('submit', async function(e) {
                    e.preventDefault();
                    
                    const message = messageInput.value.trim();
                    if (!message) return;
                    
                    // Add user message to chat
                    addMessage(message, 'user');
                    messageInput.value = '';
                    
                    // Show typing indicator
                    showTypingIndicator();
                    
                    try {
                        const response = await fetch('/chat/auto-reply', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                            },
                            body: JSON.stringify({ message: message })
                        });
                        
                        const data = await response.json();
                        
                        // Remove typing indicator
                        hideTypingIndicator();
                        
                        // Add bot response to chat
                        addMessage(data.reply, 'bot');
                        
                    } catch (error) {
                        console.error('Error:', error);
                        hideTypingIndicator();
                        addMessage('Sorry, there was an error processing your request.', 'bot');
                    }
                });
                
                function addMessage(text, sender) {
                    const messageDiv = document.createElement('div');
                    messageDiv.className = `message ${sender}-message`;
                    
                    const contentDiv = document.createElement('div');
                    contentDiv.className = 'message-content';
                    contentDiv.textContent = text;
                    
                    messageDiv.appendChild(contentDiv);
                    chatMessages.appendChild(messageDiv);
                    
                    // Scroll to bottom
                    chatMessages.scrollTop = chatMessages.scrollHeight;
                }
                
                function showTypingIndicator() {
                    let typingIndicator = document.querySelector('.typing-indicator');
                    if (!typingIndicator) {
                        typingIndicator = document.createElement('div');
                        typingIndicator.className = 'message bot-message typing-indicator';
                        
                        const dotsDiv = document.createElement('div');
                        dotsDiv.className = 'typing-dots';
                        
                        for (let i = 0; i < 3; i++) {
                            const dot = document.createElement('div');
                            dot.className = 'typing-dot';
                            dotsDiv.appendChild(dot);
                        }
                        
                        typingIndicator.appendChild(dotsDiv);
                        chatMessages.appendChild(typingIndicator);
                    }
                    
                    typingIndicator.style.display = 'flex';
                    chatMessages.scrollTop = chatMessages.scrollHeight;
                }
                
                function hideTypingIndicator() {
                    const typingIndicator = document.querySelector('.typing-indicator');
                    if (typingIndicator) {
                        typingIndicator.style.display = 'none';
                    }
                }
                
                // Focus on input when page loads
                messageInput.focus();
            });
        </script>

    </body>
</html>