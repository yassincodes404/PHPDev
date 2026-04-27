<?php
require_once 'bootstrap.php';
require_auth();
page_start();
?>

<div class="header">
  <div>
    <h1 style="font-size: 1.5rem; display: flex; align-items: center; gap: 10px;">📄 Documents</h1>
    <p style="color: var(--text-muted); font-size: 0.9rem;">Upload, inspect, and reuse source files across notes, flashcards, and grounded research.</p>
  </div>
</div>

<div class="content-area">
  
  <div class="card">
    <h3 style="font-size: 1rem; margin-bottom: 5px;">Upload Documents</h3>
    <p style="color: var(--text-muted); font-size: 0.85rem; margin-bottom: 20px;">Drop files here or click to add new sources.</p>
    
    <div class="upload-zone">
      <div class="upload-icon">↑</div>
      <h4 style="margin-bottom: 8px;">Drop files here or click to upload</h4>
      <p style="color: var(--text-muted); font-size: 0.85rem;">Supports PDF, TXT, MD, DOCX • Max 10MB</p>
    </div>
  </div>

  <div class="card">
    <h3 style="font-size: 1rem; margin-bottom: 5px;">Document Library</h3>
    <p style="color: var(--text-muted); font-size: 0.85rem; margin-bottom: 20px;">0 files available</p>
    
    <div style="border: 1px dashed var(--border-color); border-radius: 12px; padding: 50px 20px; text-align: center; background-color: #fcfcfc;">
      <div style="font-size: 2rem; color: var(--primary-color); margin-bottom: 15px;">📄</div>
      <h4 style="margin-bottom: 10px; font-weight: 600;">No Documents Yet</h4>
      <p style="color: var(--text-muted); font-size: 0.9rem; max-width: 400px; margin: 0 auto;">
        Upload your first document to extract text, search content, and generate study materials.
      </p>
    </div>
  </div>

</div>

<?php page_end(); ?>
