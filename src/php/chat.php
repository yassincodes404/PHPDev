<?php
require_once 'bootstrap.php';
require_auth();
page_start();
?>

<div class="chat-container" style="background-color: var(--bg-color);">
  <div class="chat-messages">
    
    <!-- AI Message 1 -->
    <div class="message">
      <div class="message-avatar" style="background-color: #f1f5f9; color: var(--text-muted);">
        🤖
      </div>
      <div style="max-width: 80%;">
        <div class="message-content" style="padding: 0; overflow: hidden;">
          <div style="background-color: #f8fafc; padding: 10px 15px; border-bottom: 1px solid var(--border-color); display: flex; justify-content: space-between; align-items: center; font-size: 0.85rem; color: var(--text-muted); cursor: pointer;">
            <div style="display: flex; align-items: center; gap: 8px;">
              <span style="color: var(--primary-color);">✓</span> Reasoning Complete <span style="font-size: 0.75rem; background: #e2e8f0; padding: 2px 6px; border-radius: 4px;">1 step</span>
            </div>
            <span>⌄</span>
          </div>
          <div style="padding: 15px;">
            Hello there! I'm Agora AI, your intelligent study assistant. How can I help you learn effectively today?
          </div>
        </div>
      </div>
    </div>

    <!-- User Message -->
    <div class="message user">
      <div class="message-avatar">
        👤
      </div>
      <div class="message-content">
        how are you
      </div>
    </div>

    <!-- AI Message 2 -->
    <div class="message">
      <div class="message-avatar" style="background-color: #f1f5f9; color: var(--text-muted);">
        🤖
      </div>
      <div style="max-width: 80%;">
        <div class="message-content" style="padding: 0; overflow: hidden;">
          <div style="background-color: #f8fafc; padding: 10px 15px; border-bottom: 1px solid var(--border-color); display: flex; justify-content: space-between; align-items: center; font-size: 0.85rem; color: var(--text-muted); cursor: pointer;">
            <div style="display: flex; align-items: center; gap: 8px;">
              <span style="color: var(--primary-color);">✓</span> Reasoning Complete <span style="font-size: 0.75rem; background: #e2e8f0; padding: 2px 6px; border-radius: 4px;">1 step</span>
            </div>
            <span>⌄</span>
          </div>
          <div style="padding: 15px;">
            As an AI, I don't experience feelings, but I'm ready and functioning perfectly to assist you with your studies! How can I help you today?
          </div>
        </div>
      </div>
    </div>

  </div>

  <div class="chat-input-container">
    <div class="chat-input-wrapper">
      <div style="display: flex; gap: 10px; color: var(--text-muted); padding-left: 10px;">
        <span style="cursor: pointer;">📎</span>
        <span style="cursor: pointer;">📷</span>
      </div>
      <input type="text" class="chat-input" placeholder="Ask me anything...">
      <button class="send-btn">
        <span>➤</span>
      </button>
    </div>
  </div>
</div>

<?php page_end(); ?>
