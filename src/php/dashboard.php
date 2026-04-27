<?php
require_once 'bootstrap.php';
require_auth();
page_start();

$snapshot_stats = [
    ['0m', 'Focus today'],
    ['0', 'starting streak tier'],
    ['0%', 'Focus efficiency'],
    ['Low', 'Burnout risk'],
    ['0', 'Total Notes'],
    ['0', 'Cards Due'],
    ['0h', 'Total Study Hours'],
    ['0', 'Sessions Completed'],
];

$priorities = [
    ['Calendar Events', '0'],
    ['Reviews Due', '0'],
];
?>

<div class="header">
  <div>
    <h1 class="dash-title">Good morning 👋</h1>
    <p class="dash-muted">Welcome back! Here's your learning overview.</p>
  </div>
  <div class="header-actions">
    <button class="btn btn-primary">Start Focus Session</button>
  </div>
</div>

<div class="content-area">
  <div class="card">
    <h3 class="dash-section-title">
      <span>🎯</span> Focus Snapshot
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
    <input type="text" class="search-input dash-note-input" placeholder="New Note">
  </div>

  <div class="dash-layout">
    <div class="card dash-insight-card">
      <div class="dash-row-between dash-mb-20">
        <h3 class="dash-section-title">
          <span>💡</span> AI Insights
        </h3>
        <a href="#" class="dash-link">Ask AI →</a>
      </div>
      <div class="dash-mb-20">
        <h4>Welcome to Agora AI!</h4>
        <p class="dash-muted dash-text-sm">I'm your AI study assistant. Try asking me to help you create notes, schedule study sessions, or quiz you on topics.</p>
      </div>
      <div class="dash-row-between">
        <span class="dash-text-xs">🕒 5 min</span>
        <button class="btn btn-primary">Start Chat</button>
      </div>
      <span class="badge live dash-badge-pos">LOW</span>
    </div>

    <div class="dash-side-col">
      <div class="card">
        <h3 class="dash-section-title">
          <span>📅</span> Today's Priorities
        </h3>
        <?php foreach ($priorities as [$label, $value]): ?>
        <div class="dash-priority-item">
          <span class="dash-priority-label"><?php echo $label; ?></span>
          <span class="dash-priority-value"><?php echo $value; ?></span>
        </div>
        <?php endforeach; ?>
        <div class="dash-next-event">
          <div class="dash-next-event-title">Next Event</div>
          <div class="dash-next-event-value">No upcoming events</div>
        </div>
      </div>
      <div class="card">
        <h3 class="dash-section-title">
          <span>📈</span> Weekly Progress
        </h3>
      </div>
    </div>
  </div>
</div>

<?php page_end(); ?>
