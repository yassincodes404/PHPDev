<?php
require_once 'bootstrap.php';
require_auth();
page_start();
?>

<div class="header">
  <div>
    <h1 style="font-size: 1.5rem; display: flex; align-items: center; gap: 10px;">⏱️ Focus Mode</h1>
    <p style="color: var(--text-muted); font-size: 0.9rem;">Momentum-driven focus sessions with local restore, shield controls, and analytics.</p>
  </div>
</div>

<div class="content-area">
  
  <div class="grid-cards" style="grid-template-columns: repeat(4, 1fr); margin-bottom: 20px;">
    <div class="card" style="display: flex; align-items: center; gap: 15px; padding: 15px;">
      <div style="background-color: var(--primary-color); color: white; width: 40px; height: 40px; border-radius: 8px; display: flex; justify-content: center; align-items: center;">⏱️</div>
      <div>
        <div style="font-size: 1.2rem; font-weight: 700;">0m</div>
        <div style="font-size: 0.8rem; color: var(--text-muted);">Today</div>
      </div>
    </div>
    <div class="card" style="display: flex; align-items: center; gap: 15px; padding: 15px;">
      <div style="background-color: #e67e22; color: white; width: 40px; height: 40px; border-radius: 8px; display: flex; justify-content: center; align-items: center;">🔥</div>
      <div>
        <div style="font-size: 1.2rem; font-weight: 700;">0</div>
        <div style="font-size: 0.8rem; color: var(--text-muted);">starting</div>
      </div>
    </div>
    <div class="card" style="display: flex; align-items: center; gap: 15px; padding: 15px;">
      <div style="background-color: #9b59b6; color: white; width: 40px; height: 40px; border-radius: 8px; display: flex; justify-content: center; align-items: center;">📈</div>
      <div>
        <div style="font-size: 1.2rem; font-weight: 700;">0%</div>
        <div style="font-size: 0.8rem; color: var(--text-muted);">Efficiency</div>
      </div>
    </div>
    <div class="card" style="display: flex; align-items: center; gap: 15px; padding: 15px;">
      <div style="background-color: #3498db; color: white; width: 40px; height: 40px; border-radius: 8px; display: flex; justify-content: center; align-items: center;">⚠️</div>
      <div>
        <div style="font-size: 1.2rem; font-weight: 700;">low</div>
        <div style="font-size: 0.8rem; color: var(--text-muted);">Burnout Risk</div>
      </div>
    </div>
  </div>

  <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 20px;">
    
    <!-- Left Column -->
    <div style="display: flex; flex-direction: column; gap: 20px;">
      <div class="card" style="padding: 25px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
          <h2 style="font-size: 1.1rem; font-weight: 600; display: flex; align-items: center; gap: 8px;">
            <span style="color: var(--primary-color);">⏱️</span> New Focus Session
          </h2>
          <span style="background-color: #f39c12; color: white; font-size: 0.7rem; padding: 4px 8px; border-radius: 4px; font-weight: 600;">MEDIUM SHIELD DEFAULT</span>
        </div>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 15px;">
          <div>
            <label style="display: block; font-size: 0.85rem; margin-bottom: 5px;">Goal</label>
            <input type="text" placeholder="Ship the focus dashboard MVP" style="margin-bottom: 0;">
          </div>
          <div>
            <label style="display: block; font-size: 0.85rem; margin-bottom: 5px;">Subject</label>
            <input type="text" placeholder="Frontend / Backend / Math" style="margin-bottom: 0;">
          </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 15px;">
          <div>
            <label style="display: block; font-size: 0.85rem; margin-bottom: 5px;">Focus Minutes</label>
            <input type="number" value="25" style="margin-bottom: 0;">
          </div>
          <div>
            <label style="display: block; font-size: 0.85rem; margin-bottom: 5px;">Shield Level</label>
            <select style="margin-bottom: 0;">
              <option>Medium</option>
              <option>High</option>
              <option>Low</option>
            </select>
          </div>
        </div>

        <div style="display: flex; gap: 10px; margin-bottom: 15px;">
          <button class="btn btn-outline" style="font-size: 0.8rem; padding: 6px 12px; border-radius: 20px;">⚪ Zen</button>
          <button class="btn btn-outline" style="font-size: 0.8rem; padding: 6px 12px; border-radius: 20px; margin-left: auto;">🔕 DND</button>
        </div>

        <div style="margin-bottom: 20px;">
          <select style="margin-bottom: 0; width: 100%;">
            <option>Ambient Off</option>
            <option>Rain</option>
            <option>Coffee Shop</option>
          </select>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
          <div>
            <label style="display: block; font-size: 0.85rem; margin-bottom: 5px;">Success Criteria</label>
            <div style="display: flex; gap: 10px;">
              <input type="text" placeholder="Finish analytics aggregation" style="margin-bottom: 0;">
              <button class="btn btn-outline">Add</button>
            </div>
          </div>
          <div>
            <label style="display: block; font-size: 0.85rem; margin-bottom: 5px;">Micro Tasks</label>
            <div style="display: flex; gap: 10px;">
              <input type="text" placeholder="Add task" style="margin-bottom: 0;">
              <button class="btn btn-outline">Add</button>
            </div>
          </div>
        </div>

        <button class="btn btn-primary" style="background-color: transparent; color: var(--text-main); font-weight: 600; padding: 0; border: none;">
          ▷ Start Focus Mode
        </button>
      </div>
      
      <div class="card" style="padding: 25px;">
        <h2 style="font-size: 1.1rem; font-weight: 600; margin-bottom: 15px; display: flex; align-items: center; gap: 8px;">
          <span style="color: var(--primary-color);">📈</span> Weekly Heatmap
        </h2>
        <div style="display: grid; grid-template-columns: 30px 1fr 1fr 1fr 1fr; gap: 10px;">
          <div style="font-size: 0.8rem; color: var(--text-muted);">Thu</div>
          <div style="background-color: #f8fafc; border-radius: 4px; height: 20px;"></div>
          <div style="background-color: #e6f7f5; border-radius: 4px; height: 20px;"></div>
          <div style="background-color: #f8fafc; border-radius: 4px; height: 20px;"></div>
          <div style="background-color: #f8fafc; border-radius: 4px; height: 20px;"></div>

          <div style="font-size: 0.8rem; color: var(--text-muted);">Fri</div>
          <div style="background-color: #f8fafc; border-radius: 4px; height: 20px;"></div>
          <div style="background-color: #f8fafc; border-radius: 4px; height: 20px;"></div>
          <div style="background-color: #e6f7f5; border-radius: 4px; height: 20px;"></div>
          <div style="background-color: #f8fafc; border-radius: 4px; height: 20px;"></div>
        </div>
      </div>
    </div>

    <!-- Right Column -->
    <div style="display: flex; flex-direction: column; gap: 20px;">
      
      <div class="card" style="padding: 25px;">
        <h2 style="font-size: 1rem; font-weight: 600; margin-bottom: 15px; display: flex; align-items: center; gap: 8px;">
          <span style="color: var(--primary-color);">📋</span> Floating Task List
        </h2>
        <p style="font-size: 0.85rem; color: var(--text-muted);">Draft tasks will appear here once the session starts.</p>
      </div>

      <div class="card" style="padding: 25px;">
        <h2 style="font-size: 1rem; font-weight: 600; margin-bottom: 15px; display: flex; align-items: center; gap: 8px;">
          <span style="color: var(--primary-color);">⚠️</span> Distraction Insights
        </h2>
        <div style="background-color: #f8fafc; border: 1px solid var(--border-color); border-radius: 8px; padding: 15px;">
          <h3 style="font-size: 0.95rem; margin-bottom: 5px;">Stable focus</h3>
          <p style="font-size: 0.85rem; color: var(--text-muted);">Your recent sessions stayed clean with minimal distraction pressure.</p>
        </div>
      </div>

      <div class="card" style="padding: 25px;">
        <h2 style="font-size: 1rem; font-weight: 600; margin-bottom: 15px; display: flex; align-items: center; gap: 8px;">
          <span style="color: var(--primary-color);">💡</span> Pace Hints
        </h2>
        <ul style="font-size: 0.85rem; color: var(--text-muted); list-style: none;">
          <li style="margin-bottom: 10px; display: flex; gap: 8px;"><span style="color: var(--primary-color);">&gt;</span> Start with one focused session to unlock pace insights.</li>
          <li style="margin-bottom: 10px; display: flex; gap: 8px;"><span style="color: var(--primary-color);">&gt;</span> Adding subjects to sessions will improve your personalized recommendations.</li>
        </ul>
      </div>

      <div class="card" style="padding: 25px;">
        <h2 style="font-size: 1rem; font-weight: 600; margin-bottom: 15px; display: flex; align-items: center; gap: 8px;">
          <span style="color: var(--primary-color);">🏆</span> Recent Wins
        </h2>
        <p style="font-size: 0.85rem; color: var(--text-muted);">Complete a session to populate this list.</p>
      </div>
      
      <div class="card" style="padding: 25px;">
        <h2 style="font-size: 1rem; font-weight: 600; margin-bottom: 15px; display: flex; align-items: center; gap: 8px;">
          <span style="color: var(--primary-color);">⌛</span> Recent Sessions
        </h2>
        <p style="font-size: 0.85rem; color: var(--text-muted);">Complete a session to populate this list.</p>
      </div>

    </div>
  </div>
</div>
<?php page_end(); ?>
