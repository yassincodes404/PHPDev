<?php
require_once 'bootstrap.php';
require_auth();
page_start();
?>

<div class="header page-header">
  <div class="flex-between">
    <div>
      <h1 class="page-title">❓ Quiz Mode</h1>
      <p class="page-desc">Test your knowledge with AI-generated quizzes from your notes and documents</p>
    </div>
    <button class="btn btn-primary">✨ Generate Quiz</button>
  </div>
</div>

<div class="content-area">
  
  <div style="display: flex; flex-direction: column; gap: 15px; margin-bottom: 40px;">
    <?php
    $stats = [
        ['val' => '0', 'label' => 'Total Quizzes', 'color' => 'var(--primary-color)'],
        ['val' => '0', 'label' => 'Completed', 'color' => '#2ecc71'],
        ['val' => '0%', 'label' => 'Avg Score', 'color' => '#f39c12'],
        ['val' => '0', 'label' => 'Questions Attempted', 'color' => '#3498db']
    ];
    foreach($stats as $s): ?>
    <div class="card flex-gap" style="margin-bottom: 0; padding: 20px 30px;">
      <div style="font-size: 1.5rem; font-weight: 700; color: <?php echo $s['color']; ?>; width: 40px;"><?php echo $s['val']; ?></div>
      <div class="page-desc"><?php echo $s['label']; ?></div>
    </div>
    <?php endforeach; ?>
  </div>

  <div class="empty-state">
    <div class="empty-icon">❓</div>
    <h2 class="section-title">No Quizzes Yet</h2>
    <p class="page-desc" style="max-width: 500px; margin-bottom: 30px;">Generate your first quiz from a topic, notes, or documents</p>
    <button class="btn btn-primary">✨ Generate Quiz</button>
  </div>

</div>
<?php page_end(); ?>
