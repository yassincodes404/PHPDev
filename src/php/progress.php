<?php
require_once 'bootstrap.php';
require_auth();
page_start();
?>

<div class="header" style="flex-direction: column; align-items: flex-start; gap: 15px;">
  <div>
    <h1 style="font-size: 1.5rem; display: flex; align-items: center; gap: 10px;">📈 Progress</h1>
    <p style="color: var(--text-muted); font-size: 0.9rem;">Track your learning journey</p>
  </div>
</div>

<div class="content-area">
  
  <div style="display: flex; flex-direction: column; gap: 15px; margin-bottom: 30px;">
    <div class="card" style="margin-bottom: 0; display: flex; align-items: center; gap: 20px; padding: 20px 30px;">
      <div style="background-color: #9b59b6; color: white; width: 40px; height: 40px; border-radius: 8px; display: flex; justify-content: center; align-items: center;">⏱️</div>
      <div>
        <div style="font-size: 1.2rem; font-weight: 700;">0h</div>
        <div style="font-size: 0.8rem; color: var(--text-muted);">Total Study Time</div>
      </div>
    </div>
    <div class="card" style="margin-bottom: 0; display: flex; align-items: center; gap: 20px; padding: 20px 30px;">
      <div style="background-color: #e67e22; color: white; width: 40px; height: 40px; border-radius: 8px; display: flex; justify-content: center; align-items: center;">🔥</div>
      <div>
        <div style="font-size: 1.2rem; font-weight: 700;">0</div>
        <div style="font-size: 0.8rem; color: var(--text-muted);">Day Streak</div>
      </div>
    </div>
    <div class="card" style="margin-bottom: 0; display: flex; align-items: center; gap: 20px; padding: 20px 30px;">
      <div style="background-color: #2ecc71; color: white; width: 40px; height: 40px; border-radius: 8px; display: flex; justify-content: center; align-items: center;">🏅</div>
      <div>
        <div style="font-size: 1.2rem; font-weight: 700;">0%</div>
        <div style="font-size: 0.8rem; color: var(--text-muted);">Focus Efficiency</div>
      </div>
    </div>
    <div class="card" style="margin-bottom: 0; display: flex; align-items: center; gap: 20px; padding: 20px 30px;">
      <div style="background-color: #3498db; color: white; width: 40px; height: 40px; border-radius: 8px; display: flex; justify-content: center; align-items: center;">📖</div>
      <div>
        <div style="font-size: 1.2rem; font-weight: 700;">Low</div>
        <div style="font-size: 0.8rem; color: var(--text-muted);">Burnout Risk</div>
      </div>
    </div>
  </div>

  <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
    <!-- Weekly Study Time -->
    <div>
      <h2 style="font-size: 1rem; font-weight: 600; margin-bottom: 20px; display: flex; align-items: center; gap: 8px;">
        <span style="color: var(--primary-color);">📈</span> Weekly Study Time
      </h2>
      <div style="display: flex; align-items: flex-end; gap: 10px; height: 100px; margin-bottom: 10px; border-bottom: 1px solid var(--border-color); padding-bottom: 10px;">
        <div style="flex: 1; display: flex; flex-direction: column; align-items: center; gap: 5px;">
          <div style="width: 100%; background-color: #6a5acd; border-radius: 4px; height: 10px;"></div>
          <div style="font-size: 0.75rem; color: var(--text-muted);">Thu</div>
        </div>
        <div style="flex: 1; display: flex; flex-direction: column; align-items: center; gap: 5px;">
          <div style="width: 100%; background-color: #6a5acd; border-radius: 4px; height: 10px;"></div>
          <div style="font-size: 0.75rem; color: var(--text-muted);">Fri</div>
        </div>
        <div style="flex: 1; display: flex; flex-direction: column; align-items: center; gap: 5px;">
          <div style="width: 100%; background-color: #6a5acd; border-radius: 4px; height: 10px;"></div>
          <div style="font-size: 0.75rem; color: var(--text-muted);">Sat</div>
        </div>
        <div style="flex: 1; display: flex; flex-direction: column; align-items: center; gap: 5px;">
          <div style="width: 100%; background-color: #6a5acd; border-radius: 4px; height: 10px;"></div>
          <div style="font-size: 0.75rem; color: var(--text-muted);">Sun</div>
        </div>
        <div style="flex: 1; display: flex; flex-direction: column; align-items: center; gap: 5px;">
          <div style="width: 100%; background-color: #6a5acd; border-radius: 4px; height: 10px;"></div>
          <div style="font-size: 0.75rem; color: var(--text-muted);">Mon</div>
        </div>
        <div style="flex: 1; display: flex; flex-direction: column; align-items: center; gap: 5px;">
          <div style="width: 100%; background-color: #6a5acd; border-radius: 4px; height: 10px;"></div>
          <div style="font-size: 0.75rem; color: var(--text-muted);">Tue</div>
        </div>
        <div style="flex: 1; display: flex; flex-direction: column; align-items: center; gap: 5px;">
          <div style="width: 100%; background-color: #6a5acd; border-radius: 4px; height: 10px;"></div>
          <div style="font-size: 0.75rem; color: var(--text-muted);">Wed</div>
        </div>
      </div>
      <div style="display: flex; justify-content: space-between; font-size: 0.8rem; color: var(--text-muted);">
        <span>Total: 0 min</span>
        <span>Avg: 0 min/day</span>
      </div>
    </div>
    
    <!-- Subject Mastery -->
    <div>
      <h2 style="font-size: 1rem; font-weight: 600; margin-bottom: 20px; display: flex; align-items: center; gap: 8px;">
        <span style="color: var(--primary-color);">🎯</span> Subject Mastery
      </h2>
    </div>
  </div>

  <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 20px;">
    <!-- Focus Heatmap -->
    <div>
      <h2 style="font-size: 1rem; font-weight: 600; margin-bottom: 15px; display: flex; align-items: center; gap: 8px;">
        <span style="color: var(--primary-color);">📈</span> Focus Heatmap
      </h2>
      <div style="display: grid; grid-template-columns: 30px 1fr 1fr 1fr 1fr; gap: 10px;">
        <div style="font-size: 0.8rem; color: var(--text-muted);">Thu</div>
        <div style="background-color: #e6f7f5; border-radius: 4px; height: 20px;"></div>
        <div style="background-color: #e6f7f5; border-radius: 4px; height: 20px;"></div>
        <div style="background-color: #e6f7f5; border-radius: 4px; height: 20px;"></div>
        <div style="background-color: #e6f7f5; border-radius: 4px; height: 20px;"></div>

        <div style="font-size: 0.8rem; color: var(--text-muted);">Fri</div>
        <div style="background-color: #e6f7f5; border-radius: 4px; height: 20px;"></div>
        <div style="background-color: #e6f7f5; border-radius: 4px; height: 20px;"></div>
        <div style="background-color: #e6f7f5; border-radius: 4px; height: 20px;"></div>
        <div style="background-color: #e6f7f5; border-radius: 4px; height: 20px;"></div>
        
        <div style="font-size: 0.8rem; color: var(--text-muted);">Sat</div>
        <div style="background-color: #e6f7f5; border-radius: 4px; height: 20px;"></div>
        <div style="background-color: #e6f7f5; border-radius: 4px; height: 20px;"></div>
        <div style="background-color: #e6f7f5; border-radius: 4px; height: 20px;"></div>
        <div style="background-color: #e6f7f5; border-radius: 4px; height: 20px;"></div>
      </div>
    </div>
    
    <!-- Focus Insights -->
    <div>
      <h2 style="font-size: 1rem; font-weight: 600; margin-bottom: 15px; display: flex; align-items: center; gap: 8px;">
        <span style="color: var(--primary-color);">💡</span> Focus Insights
      </h2>
      <div style="background-color: transparent;">
        <h3 style="font-size: 0.95rem; margin-bottom: 5px;">Stable focus</h3>
        <p style="font-size: 0.85rem; color: var(--text-muted);">Your recent sessions stayed clean with minimal distraction pressure.</p>
      </div>
    </div>
  </div>

</div>
<?php page_end(); ?>
