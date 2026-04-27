<?php
require_once 'bootstrap.php';
require_auth();
page_start();
?>

<div class="header page-header">
  <div class="flex-between">
    <div>
      <h1 class="page-title">👥 Study Rooms</h1>
      <p class="page-desc">Collaborate and learn together in real-time</p>
    </div>
    <div class="flex-gap">
      <button class="btn btn-outline">🔗 Join Room</button>
      <button class="btn btn-primary">+ Create Room</button>
    </div>
  </div>
</div>

<div class="content-area">
  
  <h2 class="section-title">👑 My Rooms</h2>

  <div class="card empty-state">
    <div class="empty-icon">👥</div>
    <h3 style="font-size: 1.2rem; font-weight: 700; margin-bottom: 10px;">No Study Rooms Yet</h3>
    <p class="page-desc" style="margin-bottom: 25px;">Create a room to start collaborating with friends</p>
    <button class="btn btn-primary">+ Create Your First Room</button>
  </div>

</div>
<?php page_end(); ?>
