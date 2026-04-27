<?php
require_once 'bootstrap.php';
require_auth();
page_start();
?>

<div class="header">
  <div>
    <h1 style="font-size: 1.5rem; display: flex; align-items: center; gap: 10px;">📅 Calendar</h1>
    <p style="color: var(--text-muted); font-size: 0.9rem;">AI-powered study scheduling</p>
  </div>
  <div class="header-actions">
    <button class="btn btn-outline">📊 Insights</button>
    <button class="btn btn-outline">✨ AI Schedule</button>
    <button class="btn btn-primary">+ Add Event</button>
  </div>
</div>

<div class="content-area">
  
  <div style="background-color: white; border: 1px solid var(--border-color); border-radius: 12px; padding: 15px; margin-bottom: 20px; display: flex; align-items: center; gap: 15px;">
    <span style="color: var(--primary-color);">✨</span>
    <input type="text" placeholder="Try: 'Study calculus tomorrow at 3pm' or 'Physics exam next Friday'" style="flex: 1; border: none; outline: none; font-size: 0.95rem; color: var(--text-main);">
    <button class="send-btn" style="width: 32px; height: 32px; font-size: 0.8rem;">➤</button>
  </div>

  <div class="card" style="padding: 25px;">
    <div class="calendar-header">
      <h2 style="font-size: 1.2rem; font-weight: 600;">April 2026</h2>
      <div style="display: flex; align-items: center; gap: 10px;">
        <button class="btn btn-outline" style="padding: 5px 10px; border: none;">&lt;</button>
        <button class="btn btn-outline" style="padding: 5px 15px;">Today</button>
        <button class="btn btn-outline" style="padding: 5px 10px; border: none;">&gt;</button>
      </div>
    </div>
    
    <div style="margin-bottom: 15px; font-size: 0.85rem; color: #f39c12; display: flex; align-items: center; gap: 5px;">
      <span>💡</span> Tip: Click and drag across multiple days to create a multi-day event
    </div>

    <div class="calendar-grid">
      <div class="calendar-day-header">Sun</div>
      <div class="calendar-day-header">Mon</div>
      <div class="calendar-day-header">Tue</div>
      <div class="calendar-day-header">Wed</div>
      <div class="calendar-day-header">Thu</div>
      <div class="calendar-day-header">Fri</div>
      <div class="calendar-day-header">Sat</div>

      <div class="calendar-day inactive"></div>
      <div class="calendar-day inactive"></div>
      <div class="calendar-day inactive"></div>
      <div class="calendar-day"><div class="day-number">1</div></div>
      <div class="calendar-day"><div class="day-number">2</div></div>
      <div class="calendar-day"><div class="day-number">3</div></div>
      <div class="calendar-day"><div class="day-number">4</div></div>

      <div class="calendar-day"><div class="day-number">5</div></div>
      <div class="calendar-day"><div class="day-number">6</div></div>
      <div class="calendar-day"><div class="day-number">7</div></div>
      <div class="calendar-day"><div class="day-number">8</div></div>
      <div class="calendar-day"><div class="day-number">9</div></div>
      <div class="calendar-day"><div class="day-number">10</div></div>
      <div class="calendar-day"><div class="day-number">11</div></div>

      <div class="calendar-day"><div class="day-number">12</div></div>
      <div class="calendar-day"><div class="day-number">13</div></div>
      <div class="calendar-day"><div class="day-number">14</div></div>
      <div class="calendar-day inactive" style="background-color: #f1f8f7;"><div class="day-number active">15</div></div>
      <div class="calendar-day"><div class="day-number">16</div></div>
      <div class="calendar-day"><div class="day-number">17</div></div>
      <div class="calendar-day"><div class="day-number">18</div></div>

      <div class="calendar-day"><div class="day-number">19</div></div>
      <div class="calendar-day"><div class="day-number">20</div></div>
      <div class="calendar-day"><div class="day-number">21</div></div>
      <div class="calendar-day"><div class="day-number">22</div></div>
      <div class="calendar-day"><div class="day-number">23</div></div>
      <div class="calendar-day"><div class="day-number">24</div></div>
      <div class="calendar-day"><div class="day-number">25</div></div>

      <div class="calendar-day"><div class="day-number">26</div></div>
      <div class="calendar-day"><div class="day-number">27</div></div>
      <div class="calendar-day"><div class="day-number">28</div></div>
      <div class="calendar-day"><div class="day-number">29</div></div>
      <div class="calendar-day"><div class="day-number">30</div></div>
      <div class="calendar-day inactive"></div>
      <div class="calendar-day inactive"></div>
    </div>
  </div>

</div>

<?php page_end(); ?>
