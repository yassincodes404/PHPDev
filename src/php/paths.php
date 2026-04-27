<?php
require_once 'bootstrap.php';
require_auth();
page_start();

$stats = [
    ['📚', 'var(--primary-color)', '0', 'Total Paths'],
    ['✅', '#2ecc71', '0', 'Steps Done'],
    ['⏱️', '#f39c12', '0h', 'Hours Studied'],
    ['📈', '#e74c3c', '0', 'Active Paths'],
];

$recommended_paths = [
    ['Effective Study Techniques', 'Improve your learning efficiency with proven methods', '8h estimated'],
    ['Critical Thinking Mastery', 'Develop analytical thinking for better problem solving', '12h estimated'],
    ['Memory & Retention Techniques', 'Optimize how you retain and recall information', '6h estimated'],
];
?>

<div class="header paths-header">
  <div>
    <h1 class="paths-title">🛤️ Learning Paths</h1>
    <p class="paths-desc">AI-powered personalized learning journeys</p>
  </div>
  <button class="btn btn-primary paths-btn-sm">+ Create Path</button>
</div>

<div class="content-area">
  
  <div class="grid-cards paths-stats-grid">
    <?php foreach ($stats as [$icon, $color, $value, $label]): ?>
    <div class="card paths-stat-card">
      <div class="paths-stat-icon" style="color: <?php echo $color; ?>;"><?php echo $icon; ?></div>
      <div>
        <div class="paths-stat-value"><?php echo $value; ?></div>
        <div class="paths-stat-label"><?php echo $label; ?></div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>

  <h2 class="paths-section-title">
    <span class="paths-title-icon">✨</span> Recommended For You
  </h2>

  <div class="grid-cards paths-rec-grid">
    <?php foreach ($recommended_paths as [$title, $description, $time]): ?>
    <div class="card paths-rec-card">
      <span class="paths-tag">✨ AI SUGGESTED</span>
      <h3 class="paths-rec-title"><?php echo $title; ?></h3>
      <p class="paths-rec-desc"><?php echo $description; ?></p>
      <div class="paths-rec-time">⏱️ <?php echo $time; ?></div>
    </div>
    <?php endforeach; ?>
  </div>

  <div class="paths-toolbar">
    <div class="paths-search-wrap">
      <span class="paths-search-icon">🔍</span>
      <input type="text" class="paths-search-input" placeholder="Search paths by title or subj">
    </div>
    
    <div class="paths-filter-row">
      <div class="paths-pill-group">
        <button class="paths-pill paths-pill-active">All Levels</button>
        <button class="paths-pill paths-pill-muted">Beginner</button>
        <button class="paths-pill paths-pill-muted">Intermediate</button>
        <button class="paths-pill paths-pill-muted">Advanced</button>
      </div>
      <div class="paths-pill-group">
        <button class="paths-pill paths-pill-active">All</button>
        <button class="paths-pill paths-pill-muted">In Progress</button>
        <button class="paths-pill paths-pill-muted">Completed</button>
        <button class="paths-pill paths-pill-muted">Not Started</button>
      </div>
      <select class="paths-sort-select">
        <option>Recent</option>
      </select>
    </div>
  </div>

  <div class="card paths-empty">
    <div class="paths-empty-icon">🛤️</div>
    <h2 class="paths-empty-title">No Learning Paths Yet</h2>
    <p class="paths-empty-desc">Create your first learning path manually or let AI generate a personalized curriculum based on your interests.</p>
    <div class="paths-empty-actions">
      <button class="btn btn-primary paths-btn-lg">+ Create Path</button>
      <button class="btn btn-outline paths-btn-lg paths-btn-white">✨ Try AI Generation</button>
    </div>
  </div>

</div>
<?php page_end(); ?>
