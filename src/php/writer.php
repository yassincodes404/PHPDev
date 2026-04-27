<?php
require_once 'bootstrap.php';
require_auth();
page_start();
?>

<div class="header" style="flex-direction: column; align-items: flex-start; gap: 5px;">
  <div style="width: 100%; display: flex; justify-content: space-between; align-items: center;">
    <div style="font-size: 0.75rem; font-weight: 700; color: var(--primary-color); letter-spacing: 1px;">RESEARCH SUITE</div>
    <div style="font-size: 0.8rem; color: var(--text-muted); display: flex; align-items: center; gap: 15px;">
      <span>↻ 0</span>
      <span>📄 Loading...</span>
    </div>
  </div>
  <div>
    <h1 style="font-size: 1.5rem;">Generate Draft</h1>
    <p style="color: var(--text-muted); font-size: 0.9rem;">Draft, summarize, paraphrase, and save source-aware writing from one focused workspace.</p>
  </div>
</div>

<div class="content-area" style="display: flex; gap: 20px;">
  
  <!-- Left Sidebar Controls -->
  <div style="width: 250px; display: flex; flex-direction: column; gap: 20px;">
    
    <div class="card" style="padding: 20px; margin-bottom: 0;">
      <h3 style="font-size: 0.95rem; font-weight: 700; margin-bottom: 10px;">Writer's Workspace</h3>
      <p style="font-size: 0.8rem; color: var(--text-muted); margin-bottom: 15px;">Draft, summarize, paraphrase, and save source-aware writing from one focused workspace.</p>
      <div style="display: flex; flex-direction: column; gap: 8px;">
        <button class="btn btn-primary" style="font-size: 0.8rem; padding: 8px; border-radius: 20px; width: fit-content;">Generate Draft</button>
        <button class="btn btn-outline" style="font-size: 0.8rem; padding: 8px 15px; border-radius: 20px; width: fit-content; border-color: var(--border-color); color: var(--text-main);">Multi-Doc Summary</button>
        <div style="display: flex; gap: 8px;">
          <button class="btn btn-outline" style="font-size: 0.8rem; padding: 8px 15px; border-radius: 20px; border-color: var(--border-color); color: var(--text-main);">Notes → Paragraphs</button>
          <button class="btn btn-outline" style="font-size: 0.8rem; padding: 8px 15px; border-radius: 20px; border-color: var(--border-color); color: var(--text-main);">Paraphrase</button>
        </div>
        <button class="btn btn-outline" style="font-size: 0.8rem; padding: 8px 15px; border-radius: 20px; width: fit-content; border-color: var(--border-color); color: var(--text-main);">Saved Drafts</button>
      </div>
    </div>

    <div class="card" style="padding: 20px; margin-bottom: 0;">
      <h3 style="font-size: 0.95rem; font-weight: 700; margin-bottom: 10px;">Writing Tone</h3>
      <p style="font-size: 0.8rem; color: var(--text-muted); margin-bottom: 15px;">Draft, summarize, paraphrase, and save source-aware writing from one focused workspace.</p>
      <div style="display: flex; gap: 8px; flex-wrap: wrap;">
        <button class="btn btn-primary" style="font-size: 0.8rem; padding: 6px 12px; border-radius: 20px;">Academic</button>
        <button class="btn btn-outline" style="font-size: 0.8rem; padding: 6px 12px; border-radius: 20px; border-color: var(--border-color); color: var(--text-main);">Simplified</button>
        <button class="btn btn-outline" style="font-size: 0.8rem; padding: 6px 12px; border-radius: 20px; border-color: var(--border-color); color: var(--text-main);">Formal</button>
      </div>
    </div>

    <div class="card" style="padding: 20px; margin-bottom: 0;">
      <h3 style="font-size: 0.95rem; font-weight: 700; margin-bottom: 10px;">Source Documents</h3>
      <p style="font-size: 0.8rem; color: var(--text-muted); margin-bottom: 15px;">Draft, summarize, paraphrase, and save source-aware writing from one focused workspace.</p>
      <div style="border: 1px dashed var(--border-color); border-radius: 8px; padding: 20px; text-align: center;">
        <div style="color: var(--primary-color); font-size: 1.2rem; margin-bottom: 10px;">📄</div>
        <h4 style="font-size: 0.85rem; font-weight: 700; margin-bottom: 10px;">No documents available</h4>
        <p style="font-size: 0.75rem; color: var(--text-muted); line-height: 1.5;">Draft, summarize, paraphrase, and save source-aware writing from one focused workspace.</p>
      </div>
    </div>

  </div>

  <!-- Main Generation Panel -->
  <div style="flex: 1;">
    <div class="card" style="padding: 30px; max-width: 400px;">
      <h2 style="font-size: 1.1rem; font-weight: 700; margin-bottom: 20px;">Generate Draft</h2>
      
      <label style="display: block; font-size: 0.75rem; font-weight: 700; color: var(--text-main); margin-bottom: 10px;">RESEARCH OUTLINE</label>
      <textarea style="width: 100%; height: 180px; padding: 15px; border: 1px solid var(--border-color); border-radius: 8px; background-color: #f8fafc; font-family: inherit; font-size: 0.9rem; color: var(--text-muted); margin-bottom: 20px; resize: none;" readonly>1. Introduction
2. Literature Review
3. Methodology
4. Findings</textarea>

      <label style="display: block; font-size: 0.75rem; font-weight: 700; color: var(--text-main); margin-bottom: 10px;">WORDS PER SECTION</label>
      <input type="text" value="300" style="width: 100%; padding: 12px; border: 1px solid var(--border-color); border-radius: 8px; background-color: #f8fafc; margin-bottom: 25px;">

      <button class="btn btn-primary" style="width: 100%; opacity: 0.5; cursor: not-allowed;">Generate Draft</button>
    </div>
  </div>

</div>
<?php page_end(); ?>
