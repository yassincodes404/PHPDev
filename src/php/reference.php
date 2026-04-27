<?php
require_once 'bootstrap.php';
require_auth();
page_start();
?>

<div class="header page-header">
  <div class="flex-between">
    <div style="font-size: 0.75rem; font-weight: 700; color: var(--primary-color); letter-spacing: 1px;">RESEARCH SUITE</div>
    <div class="flex-gap" style="font-size: 0.8rem; color: var(--text-muted);">
      <span>📄 0 Documents</span>
      <span>☑ 0 select all</span>
    </div>
  </div>
  <div>
    <h1 class="page-title">Reference Manager</h1>
    <p class="page-desc">Generate citations, compile bibliographies, and fact-check writing against your source documents.</p>
  </div>
</div>

<div class="content-area">
  
  <div class="card">
    <h2 class="section-title">Select Documents</h2>
    <p class="page-desc" style="margin-bottom: 20px;">Choose the sources you want to cite or verify.</p>
    
    <div class="empty-state empty-state-dashed">
      <div style="color: var(--primary-color); font-size: 1.5rem; margin-bottom: 10px;">📄</div>
      <h3 style="font-size: 1rem; font-weight: 600; margin-bottom: 10px;">No documents uploaded yet.</h3>
      <p class="page-desc">Choose the sources you want to cite or verify.</p>
    </div>
  </div>

  <div class="card">
    <div class="flex-between" style="margin-bottom: 25px;">
      <div>
        <h2 class="section-title" style="margin-bottom: 5px;">Reference Manager</h2>
        <p class="page-desc">Citations</p>
      </div>
      <div class="flex-gap">
        <button class="btn btn-primary pill-badge">Citations</button>
        <button class="btn btn-outline pill-badge">Bibliography</button>
        <button class="btn btn-outline pill-badge">Fact Check</button>
      </div>
    </div>

    <div class="flex-gap" style="margin-bottom: 25px;">
      <button class="btn btn-primary pill-badge">APA 7th</button>
      <button class="btn btn-outline pill-badge">MLA 9th</button>
      <button class="btn btn-outline pill-badge">Chicago</button>
    </div>

    <button class="btn btn-primary" style="opacity: 0.5; cursor: not-allowed;">Generate Citations</button>
  </div>

</div>
<?php page_end(); ?>
