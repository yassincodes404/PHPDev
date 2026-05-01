<?php
require_once 'bootstrap.php';
require_auth();
page_start();

$snapshot_stats = [
    ['0', 'Total Notes'],
    ['0', 'Cards Due'],
    ['0', 'Quizzes Taken'],
    ['0', 'Study Sessions'],
];

$priorities = [
    ['Reviews Due', '0'],
    ['Quizzes Pending', '0'],
];
?>

<div class="header">
  <div>
    <h1 class="dash-title">Good morning 👋</h1>
    <p class="dash-muted">Welcome back! Here's your learning overview.</p>
  </div>
  <div class="header-actions">
    <button class="btn btn-primary" onclick="window.location.href='chat.php'">✨ Ask AI Assistant</button>
  </div>
</div>

<div class="content-area">
  <div class="card">
    <h3 class="dash-section-title">
      <span>🎯</span> Learning Snapshot
    </h3>
    <div class="grid-cards dash-snapshot-grid">
      <?php foreach ($snapshot_stats as [$value, $label]): ?>
      <div class="dash-snapshot-item">
        <div class="stat-value dash-stat-value"><?php echo $value; ?></div>
        <div class="stat-label"><?php echo $label; ?></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="card">
    <h3 class="dash-section-title">Quick Note</h3>
    <input type="text" class="search-input dash-note-input" placeholder="Type a thought or save a quick fact...">
  </div>

  <div class="dash-layout">
    <div class="card dash-insight-card">
      <div class="dash-row-between dash-mb-20">
        <h3 class="dash-section-title">
          <span>💡</span> AI Insights
        </h3>
        <a href="chat.php" class="dash-link">Ask AI →</a>
      </div>
      <div class="dash-mb-20">
        <h4>Welcome to Agora AI!</h4>
        <p class="dash-muted dash-text-sm">I'm your AI study assistant. Try asking me to help you create notes, explain complex topics, or generate quizzes.</p>
      </div>
      <div class="dash-row-between">
        <span class="dash-text-xs">🕒 5 min</span>
        <button class="btn btn-primary" onclick="window.location.href='chat.php'">Start Chat</button>
      </div>
      <span class="badge live dash-badge-pos">LOW</span>
    </div>

    <div class="dash-side-col">
      <div class="card">
        <h3 class="dash-section-title">
          <span>🎯</span> Today's Priorities
        </h3>
        <?php foreach ($priorities as [$label, $value]): ?>
        <div class="dash-priority-item">
          <span class="dash-priority-label"><?php echo $label; ?></span>
          <span class="dash-priority-value"><?php echo $value; ?></span>
        </div>
        <?php endforeach; ?>
      </div>

      <!-- AJAX DEMO: Live Insights -->
      <div class="card" style="border-left: 4px solid var(--primary-color);">
        <h3 class="dash-section-title">
          <span>⚡</span> Live Insights
        </h3>
        <p class="dash-text-sm"><strong>Tip:</strong> <span id="live-study-tip">Loading...</span></p>
        <p class="dash-text-xs" style="margin-top: 10px;">
          Server Time: <span id="server-time">--:--:--</span> | 
          Users Online: <span id="online-users">0</span>
        </p>
      </div>
    </div>
  </div>
</div>

<!-- Include AJAX Script -->
<script src="../ajax/app.js"></script>

<?php page_end(); ?>
