<!-- Minimal Chat Widget -->
<style>
/* Chat Widget Styles */
.chat-widget {
  position: fixed;
  bottom: 1.5rem;
  right: 1.5rem;
  z-index: 9999;
  font-family: inherit;
}

.chat-container {
  display: flex;
  flex-direction: column;
  overflow: hidden;
  background-color: #ffffff;
  border-radius: 4px;
  border: 1px solid #e5e7eb;
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.1);
  
  /* Smooth spring-like transition */
  transition: width 0.3s cubic-bezier(0.4, 0, 0.2, 1),
              height 0.3s cubic-bezier(0.4, 0, 0.2, 1),
              opacity 0.2s ease,
              background-color 0.15s ease,
              transform 0.15s ease;
  
  /* Closed state dimensions - matches dark mode button */
  width: 44px;
  height: 44px;
  cursor: pointer;
}

/* Hover effect when closed */
.chat-container:not(.open):hover {
  background-color: #f3f4f6;
  transform: scale(1.05);
}

.dark .chat-container:not(.open):hover {
  background-color: #1a1a1a;
}

.chat-container.open {
  width: 320px;
  height: 400px;
  cursor: default;
  overscroll-behavior: contain;
}

/* Dark mode */
.dark .chat-container {
  background-color: #0f0f0f;
  border-color: #2a2a2a;
}

/* Chat Header */
.chat-header {
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 0;
  background-color: #f3f4f6;
  min-height: 44px;
  box-sizing: border-box;
}

.chat-container.open .chat-header {
  justify-content: flex-end;
  padding: 0.5rem 1rem;
}

.dark .chat-header {
  background-color: #1a1a1a;
}

.chat-header-title {
  font-weight: 500;
  color: #111827;
  margin-right: auto;
  display: none;
  opacity: 0;
  transform: translateX(-10px);
  transition: opacity 0.2s ease 0.1s, transform 0.2s ease 0.1s;
}

.chat-container.open .chat-header-title {
  display: block;
  opacity: 1;
  transform: translateX(0);
}

.dark .chat-header-title {
  color: #f3f4f6;
}

.chat-toggle-btn {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 32px;
  height: 32px;
  cursor: pointer;
  border-radius: 4px;
  background: transparent;
  border: none;
  padding: 0;
  transition: background-color 0.15s ease;
}

.chat-container.open .chat-toggle-btn:hover {
  background-color: rgba(0, 0, 0, 0.05);
}

.dark .chat-container.open .chat-toggle-btn:hover {
  background-color: rgba(255, 255, 255, 0.1);
}

.chat-toggle-btn svg {
  width: 18px;
  height: 18px;
  color: #111827;
}

.dark .chat-toggle-btn svg {
  color: #f3f4f6;
}

.chat-icon-message,
.chat-icon-close {
  transition: opacity 0.15s ease, transform 0.15s ease;
}

.chat-container.open .chat-icon-message {
  display: none;
}

.chat-container:not(.open) .chat-icon-close {
  display: none;
}

/* Chat Messages */
.chat-messages {
  flex: 1;
  padding: 0.75rem 1rem;
  overflow-y: auto;
  overscroll-behavior: contain;
  display: flex;
  flex-direction: column;
  gap: 1rem;
  background-color: #ffffff;
  opacity: 0;
  visibility: hidden;
  transition: opacity 0.2s ease 0.1s, visibility 0s linear 0.3s;
}

.chat-container.open .chat-messages {
  opacity: 1;
  visibility: visible;
  transition: opacity 0.2s ease 0.15s, visibility 0s linear 0s;
}

.dark .chat-messages {
  background-color: #0f0f0f;
}

.chat-empty-state {
  color: #9ca3af;
  font-size: 0.875rem;
}

.chat-message {
  align-self: flex-start;
  background-color: #f3f4f6;
  color: #111827;
  padding: 0.5rem 0.75rem;
  border-radius: 4px;
  font-size: 0.875rem;
  max-width: 85%;
  word-wrap: break-word;
}

.chat-message.sent {
  align-self: flex-end;
  background-color: #e5e7eb;
  color: #111827;
}

.dark .chat-message {
  background-color: #1a1a1a;
  color: #e5e5e5;
}

.dark .chat-message.sent {
  background-color: #262626;
  color: #ffffff;
}

/* Chat Input Area */
.chat-input-area {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.5rem 1rem;
  border-top: 1px solid #e5e7eb;
  background-color: #ffffff;
  opacity: 0;
  visibility: hidden;
  transition: opacity 0.2s ease 0.1s, visibility 0s linear 0.3s;
}

.chat-container.open .chat-input-area {
  opacity: 1;
  visibility: visible;
  transition: opacity 0.2s ease 0.15s, visibility 0s linear 0s;
}

.dark .chat-input-area {
  border-color: #2a2a2a;
  background-color: #0f0f0f;
}

.chat-input {
  flex: 1;
  height: 40px;
  padding: 0 0.75rem;
  border-radius: 4px;
  border: 1px solid #d1d5db;
  background-color: #ffffff;
  color: #111827;
  font-size: 0.875rem;
  outline: none;
  transition: border-color 0.15s ease, box-shadow 0.15s ease;
}

.chat-input::placeholder {
  color: #9ca3af;
}

.chat-input:focus {
  border-color: #6b7280;
  box-shadow: 0 0 0 1px #6b7280;
}

.dark .chat-input {
  background-color: #1a1a1a;
  border-color: #333333;
  color: #e5e5e5;
}

.dark .chat-input:focus {
  border-color: #6b7280;
  box-shadow: 0 0 0 1px #6b7280;
}

.chat-send-btn {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 40px;
  height: 40px;
  border-radius: 4px;
  background-color: #e5e7eb;
  border: none;
  cursor: pointer;
  transition: background-color 0.15s ease;
}

.chat-send-btn:hover {
  background-color: #d1d5db;
}

.dark .chat-send-btn {
  background-color: #262626;
}

.dark .chat-send-btn:hover {
  background-color: #333333;
}

.chat-send-btn svg {
  width: 18px;
  height: 18px;
  color: #111827;
}

.dark .chat-send-btn svg {
  color: #ffffff;
}

/* Mobile responsiveness */
@media (max-width: 640px) {
  .chat-container.open {
    width: calc(100vw - 3rem);
    max-width: 320px;
    height: 350px;
  }
}

/* Scrollbar styling for messages */
.chat-messages::-webkit-scrollbar {
  width: 4px;
}

.chat-messages::-webkit-scrollbar-track {
  background: transparent;
}

.chat-messages::-webkit-scrollbar-thumb {
  background-color: #d1d5db;
  border-radius: 2px;
}

.dark .chat-messages::-webkit-scrollbar-thumb {
  background-color: #333333;
}
</style>

<div class="chat-widget">
  <div class="chat-container" id="chatContainer">
    <!-- Header -->
    <div class="chat-header">
      <span class="chat-header-title">uxory.ai</span>
      <button class="chat-toggle-btn" id="chatToggleBtn" aria-label="Toggle chat">
        <!-- Message Icon -->
        <svg class="chat-icon-message" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
        </svg>
        <!-- Close Icon -->
        <svg class="chat-icon-close" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <line x1="18" y1="6" x2="6" y2="18"></line>
          <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
      </button>
    </div>
    
    <!-- Messages -->
    <div class="chat-messages" id="chatMessages">
      <span class="chat-empty-state" id="chatEmptyState">Service currently unavailable. Please check back later.</span>
    </div>
    
    <!-- Input -->
    <div class="chat-input-area">
      <input 
        type="text" 
        class="chat-input" 
        id="chatInput" 
        placeholder="Type a message..."
        autocomplete="off"
      >
      <button class="chat-send-btn" id="chatSendBtn" aria-label="Send message">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <line x1="22" y1="2" x2="11" y2="13"></line>
          <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
        </svg>
      </button>
    </div>
  </div>
</div>

<script>
(function() {
  const chatContainer = document.getElementById('chatContainer');
  const chatToggleBtn = document.getElementById('chatToggleBtn');
  const chatMessages = document.getElementById('chatMessages');
  const chatInput = document.getElementById('chatInput');
  const chatSendBtn = document.getElementById('chatSendBtn');
  const chatEmptyState = document.getElementById('chatEmptyState');
  
  let isOpen = false;
  let messages = [];
  
  // Toggle chat open/close
  function toggleChat() {
    isOpen = !isOpen;
    chatContainer.classList.toggle('open', isOpen);
    
    if (isOpen) {
      // Focus input when chat opens
      setTimeout(() => {
        chatInput.focus();
      }, 300);
    }
  }
  
  // Send message
  function sendMessage() {
    const text = chatInput.value.trim();
    if (!text) return;
    
    messages.push({ text: text, type: 'sent' });
    renderMessages();
    chatInput.value = '';
    chatInput.focus();
    
    // Scroll to bottom
    setTimeout(() => {
      chatMessages.scrollTop = chatMessages.scrollHeight;
    }, 10);
    
    // Auto-respond with service unavailable message
    setTimeout(() => {
      messages.push({ 
        text: 'This service is currently unavailable. Please check back later. We apologize for the inconvenience. Feel free to email us at contact@uxory.com.', 
        type: 'received' 
      });
      renderMessages();
      setTimeout(() => {
        chatMessages.scrollTop = chatMessages.scrollHeight;
      }, 10);
    }, 500);
  }
  
  // Render messages
  function renderMessages() {
    if (messages.length === 0) {
      chatEmptyState.style.display = 'block';
      return;
    }
    
    chatEmptyState.style.display = 'none';
    
    // Clear existing messages (except empty state)
    const existingMessages = chatMessages.querySelectorAll('.chat-message');
    existingMessages.forEach(msg => msg.remove());
    
    // Add messages
    messages.forEach((msg, idx) => {
      const msgEl = document.createElement('div');
      msgEl.className = 'chat-message ' + msg.type;
      msgEl.textContent = msg.text;
      chatMessages.appendChild(msgEl);
    });
  }
  
  // Event listeners
  chatToggleBtn.addEventListener('click', function(e) {
    e.stopPropagation();
    toggleChat();
  });
  
  // Make entire container clickable when closed
  chatContainer.addEventListener('click', function(e) {
    if (!isOpen) {
      toggleChat();
    }
  });
  
  chatSendBtn.addEventListener('click', sendMessage);
  
  chatInput.addEventListener('keydown', function(e) {
    if (e.key === 'Enter') {
      sendMessage();
    }
  });
  
  // Close chat when clicking outside (optional)
  document.addEventListener('click', function(e) {
    if (isOpen && !chatContainer.contains(e.target)) {
      toggleChat();
    }
  });
  
  // Prevent scroll from propagating to page when chat is open
  chatContainer.addEventListener('wheel', function(e) {
    if (isOpen) {
      e.stopPropagation();
      
      const scrollTop = chatMessages.scrollTop;
      const scrollHeight = chatMessages.scrollHeight;
      const clientHeight = chatMessages.clientHeight;
      const atTop = scrollTop === 0;
      const atBottom = scrollTop + clientHeight >= scrollHeight;
      
      // Prevent page scroll when at boundaries
      if ((e.deltaY < 0 && atTop) || (e.deltaY > 0 && atBottom)) {
        e.preventDefault();
      }
    }
  }, { passive: false });
  
  // Prevent touch scroll from propagating
  chatContainer.addEventListener('touchmove', function(e) {
    if (isOpen) {
      e.stopPropagation();
    }
  }, { passive: true });
})();
</script>
