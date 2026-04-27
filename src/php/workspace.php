<?php
require_once 'bootstrap.php';
require_auth();
page_start();
?>

<div class="header" style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid var(--border-color); padding: 15px 30px;">
  <div style="display: flex; align-items: center; gap: 10px;">
    <h1 style="font-size: 1.2rem; display: flex; align-items: center; gap: 8px;">📁 Workspace</h1>
  </div>
  
  <div style="display: flex; background-color: #f8fafc; padding: 4px; border-radius: 8px; border: 1px solid var(--border-color);">
    <button style="border: none; background-color: var(--primary-color); color: white; padding: 6px 16px; border-radius: 6px; font-size: 0.85rem; font-weight: 600; cursor: pointer;">Notes</button>
    <button style="border: none; background-color: transparent; color: var(--text-muted); padding: 6px 16px; border-radius: 6px; font-size: 0.85rem; font-weight: 600; cursor: pointer;">Graph</button>
    <button style="border: none; background-color: transparent; color: var(--text-muted); padding: 6px 16px; border-radius: 6px; font-size: 0.85rem; font-weight: 600; cursor: pointer;">Split</button>
  </div>

  <div style="display: flex; gap: 10px;">
    <button class="btn btn-outline" style="padding: 6px 12px; font-size: 0.85rem;">📁 New Folder</button>
    <button class="btn btn-primary" style="padding: 6px 12px; font-size: 0.85rem;">+ New Note</button>
  </div>
</div>

<div class="content-area" style="padding: 0; display: flex; flex: 1; height: calc(100vh - 70px);">
  
  <!-- Left Workspace Sidebar -->
  <div style="width: 250px; border-right: 1px solid var(--border-color); display: flex; flex-direction: column; background-color: white;">
    <div style="padding: 15px; border-bottom: 1px solid var(--border-color);">
      <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
        <span style="font-weight: 600; font-size: 0.95rem; display: flex; align-items: center; gap: 5px;">📄 Notes</span>
        <div style="display: flex; gap: 5px;">
          <button style="border: none; background: transparent; cursor: pointer; color: var(--text-muted);">📁</button>
          <button style="border: none; background: #e6f7f5; color: var(--primary-color); border-radius: 4px; width: 24px; height: 24px; display: flex; justify-content: center; align-items: center; cursor: pointer; font-weight: bold;">+</button>
        </div>
      </div>
      
      <div style="display: flex; gap: 5px;">
        <select style="flex: 1; padding: 6px 10px; border-radius: 6px; border: 1px solid var(--border-color); outline: none; font-size: 0.85rem; background-color: #f8fafc;">
          <option>Select project...</option>
        </select>
        <button style="border: 1px solid var(--border-color); background: #f8fafc; color: var(--text-muted); border-radius: 6px; width: 32px; height: 32px; display: flex; justify-content: center; align-items: center; cursor: pointer;">+</button>
      </div>
    </div>

    <div style="flex: 1; display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 20px; text-align: center; color: var(--text-muted);">
      <div style="font-size: 2rem; margin-bottom: 10px; opacity: 0.5;">📁</div>
      <p style="font-size: 0.85rem;">Select a project to begin</p>
    </div>
  </div>

  <!-- Main Editor Area -->
  <div style="flex: 1; display: flex; flex-direction: column; align-items: center; justify-content: center; background-color: #f8fafc;">
    <div style="font-size: 3rem; margin-bottom: 15px; color: var(--border-color);">📄</div>
    <h2 style="font-size: 1.1rem; font-weight: 600; margin-bottom: 10px; color: var(--text-main);">Select a note to edit</h2>
    <p style="font-size: 0.9rem; color: var(--text-muted);">Choose a note from the sidebar or create a new one</p>
  </div>

</div>
<?php page_end(); ?>
