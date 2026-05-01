<?php
require_once 'bootstrap.php';
require_auth();
page_start();
?>

<div class="header page-header">
  <div class="flex-between">
    <div>
      <h1 class="page-title">📇 Flashcards</h1>
      <p class="page-desc">Master your subjects with active recall and spaced repetition</p>
    </div>
    <button class="btn btn-primary">✨ Create New Deck</button>
  </div>
</div>

<div class="content-area">
  
  <div class="grid-cards" style="margin-bottom: 40px;">
    <div class="card">
      <div style="font-size: 1.5rem; font-weight: 700; color: var(--primary-color);">0</div>
      <div class="page-desc">Decks Created</div>
    </div>
    <div class="card">
      <div style="font-size: 1.5rem; font-weight: 700; color: #2ecc71;">0</div>
      <div class="page-desc">Cards Studied</div>
    </div>
    <div class="card">
      <div style="font-size: 1.5rem; font-weight: 700; color: #f39c12;">0</div>
      <div class="page-desc">Cards Due Today</div>
    </div>
  </div>

  <div class="empty-state">
    <div class="empty-icon">📇</div>
    <h2 class="section-title">No Decks Yet</h2>
    <p class="page-desc" style="max-width: 400px; margin: 0 auto 20px;">
      Create your first deck or import cards to start your learning journey.
    </p>
    <button class="btn btn-primary">Create Your First Deck</button>
  </div>

</div>

<?php page_end(); ?>
