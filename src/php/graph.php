<?php
require_once 'bootstrap.php';
require_auth();
page_start();
?>

<div class="header" style="border-bottom: 1px solid var(--border-color);">
  <div style="display: flex; align-items: center; gap: 15px;">
    <h1 style="font-size: 1.5rem; display: flex; align-items: center; gap: 10px;">🕸️ Knowledge Graph</h1>
    <span style="font-size: 0.85rem; color: var(--text-muted); background-color: var(--bg-color); padding: 4px 10px; border-radius: 20px;">0 concepts • 0 connections</span>
  </div>
  <div class="header-actions">
    <button class="btn btn-primary">+ Add Concept</button>
    <button class="btn btn-outline">↓ Export</button>
    <button class="btn btn-outline">↑ Import</button>
  </div>
</div>

<div class="content-area" style="padding: 0; display: flex; flex-direction: column; flex: 1;">
  <div style="flex: 1; background-image: radial-gradient(var(--border-color) 1px, transparent 1px); background-size: 20px 20px; background-position: -10px -10px; position: relative; min-height: 500px; height: 100%;">
    
    <!-- React Flow Controls mock -->
    <div style="position: absolute; bottom: 20px; left: 20px; background-color: white; border: 1px solid var(--border-color); border-radius: 8px; display: flex; flex-direction: column; overflow: hidden; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
      <button style="border: none; background: white; padding: 8px; cursor: pointer; border-bottom: 1px solid var(--border-color); font-weight: bold;">+</button>
      <button style="border: none; background: white; padding: 8px; cursor: pointer; border-bottom: 1px solid var(--border-color); font-weight: bold;">-</button>
      <button style="border: none; background: white; padding: 8px; cursor: pointer; border-bottom: 1px solid var(--border-color);">[ ]</button>
      <button style="border: none; background: white; padding: 8px; cursor: pointer;">🔒</button>
    </div>

    <!-- Minimap mock -->
    <div style="position: absolute; bottom: 20px; right: 20px; width: 150px; height: 100px; background-color: white; border: 1px solid var(--border-color); border-radius: 4px; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
    </div>
    
    <div style="position: absolute; bottom: 5px; left: 60px; font-size: 0.6rem; color: #aaa;">React Flow</div>
  </div>
</div>
<?php page_end(); ?>
