<?php
require_once 'bootstrap.php';
require_auth();
page_start();
?>

<div class="header">
  <div>
    <h1 style="font-size: 1.5rem; display: flex; align-items: center; gap: 10px;">💳 Billing & Subscription</h1>
    <p style="color: var(--text-muted); font-size: 0.9rem;">Manage your plan, usage, and payment methods</p>
  </div>
</div>

<div class="content-area">
  
  <div class="grid-cards" style="grid-template-columns: repeat(3, 1fr); margin-bottom: 20px;">
    <!-- Free Plan -->
    <div class="plan-card active">
      <span class="plan-badge">Current Plan</span>
      <h3 style="display: flex; align-items: center; gap: 8px;"><span>⭐</span> Free</h3>
      <div class="plan-price">$0<span>/month</span></div>
      <ul class="plan-features">
        <li>Up to 1 GB storage</li>
        <li>60 min voice transcription</li>
        <li>Basic AI assistant</li>
        <li>5 workspaces</li>
        <li>Community support</li>
      </ul>
      <button class="btn" style="background-color: #f1f5f9; color: var(--text-muted); width: 100%; cursor: default;">Current Plan</button>
    </div>

    <!-- Pro Plan -->
    <div class="plan-card">
      <span class="plan-badge" style="background-color: #34495e;">Popular</span>
      <h3 style="display: flex; align-items: center; gap: 8px;"><span>👑</span> Pro</h3>
      <div class="plan-price">$9.99<span>/month</span></div>
      <ul class="plan-features">
        <li>Up to 10 GB storage</li>
        <li>600 min voice transcription</li>
        <li>Advanced AI with all teaching modes</li>
        <li>Unlimited workspaces</li>
        <li>Priority support</li>
        <li>Session lock & incognito mode</li>
        <li>Data export & backup</li>
      </ul>
      <button class="btn btn-primary" style="width: 100%;">⚡ Upgrade</button>
    </div>

    <!-- Team Plan -->
    <div class="plan-card">
      <h3 style="display: flex; align-items: center; gap: 8px;"><span>👥</span> Team</h3>
      <div class="plan-price">$24.99<span>/month</span></div>
      <ul class="plan-features">
        <li>Up to 50 GB storage</li>
        <li>3000 min voice transcription</li>
        <li>Everything in Pro</li>
        <li>Team workspaces & invitations</li>
        <li>Admin dashboard</li>
        <li>Role-based permissions</li>
        <li>Dedicated support</li>
      </ul>
      <button class="btn btn-primary" style="width: 100%;">⚡ Upgrade</button>
    </div>
  </div>

  <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 20px; margin-bottom: 20px;">
    <!-- Usage -->
    <div class="card" style="margin-bottom: 0;">
      <h3 style="font-size: 1rem; margin-bottom: 20px;">Usage</h3>
      
      <div style="margin-bottom: 20px;">
        <div style="display: flex; justify-content: space-between; font-size: 0.9rem; margin-bottom: 8px;">
          <span>Storage</span>
          <span style="color: var(--text-muted);">0 B / 0 B</span>
        </div>
        <div style="height: 8px; background-color: var(--border-color); border-radius: 4px; overflow: hidden;">
          <div style="height: 100%; width: 0%; background-color: var(--primary-color);"></div>
        </div>
      </div>

      <div>
        <div style="display: flex; justify-content: space-between; font-size: 0.9rem; margin-bottom: 8px;">
          <span>Transcription</span>
          <span style="color: var(--text-muted);">0m / 60m</span>
        </div>
        <div style="height: 8px; background-color: var(--border-color); border-radius: 4px; overflow: hidden;">
          <div style="height: 100%; width: 0%; background-color: var(--primary-color);"></div>
        </div>
      </div>
    </div>

    <!-- Payment Methods -->
    <div class="card" style="margin-bottom: 0;">
      <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h3 style="font-size: 1rem;">Payment Methods</h3>
        <button class="btn btn-outline" style="padding: 4px 10px; font-size: 0.8rem;">+ Add</button>
      </div>
      
      <div style="border: 1px solid var(--border-color); border-radius: 8px; padding: 15px; display: flex; justify-content: space-between; align-items: center;">
        <div style="display: flex; align-items: center; gap: 15px;">
          <div style="background-color: #f1f5f9; padding: 8px 12px; border-radius: 6px; font-weight: bold; color: #2c3e50;">💳</div>
          <div>
            <div style="font-weight: 500; font-size: 0.95rem;">Visa ****4242</div>
            <div style="font-size: 0.8rem; color: var(--text-muted);">Expires 12/28</div>
          </div>
        </div>
        <span style="background-color: var(--active-bg); color: var(--primary-color); padding: 4px 8px; border-radius: 4px; font-size: 0.75rem; font-weight: 600;">Default</span>
      </div>
    </div>
  </div>

  <!-- Invoice History -->
  <div class="card">
    <h3 style="font-size: 1rem; margin-bottom: 20px; display: flex; align-items: center; gap: 8px;"><span>🧾</span> Invoice History</h3>
    <table style="width: 100%; border-collapse: collapse; text-align: left;">
      <thead>
        <tr style="border-bottom: 1px solid var(--border-color); color: var(--text-muted); font-size: 0.9rem;">
          <th style="padding: 12px 10px; font-weight: 500;">Invoice</th>
          <th style="padding: 12px 10px; font-weight: 500;">Date</th>
          <th style="padding: 12px 10px; font-weight: 500;">Plan</th>
          <th style="padding: 12px 10px; font-weight: 500;">Amount</th>
          <th style="padding: 12px 10px; font-weight: 500;">Status</th>
        </tr>
      </thead>
      <tbody>
        <tr style="border-bottom: 1px solid #f1f5f9;">
          <td style="padding: 15px 10px; font-weight: 500;">inv-001</td>
          <td style="padding: 15px 10px; color: var(--text-muted); font-size: 0.9rem;">2026-02-01</td>
          <td style="padding: 15px 10px; font-size: 0.9rem;">Pro</td>
          <td style="padding: 15px 10px; font-weight: 500;">$9.99</td>
          <td style="padding: 15px 10px;"><span style="background-color: #e6fdf2; color: #2ecc71; padding: 4px 8px; border-radius: 4px; font-size: 0.75rem; font-weight: 600;">paid</span></td>
        </tr>
        <tr>
          <td style="padding: 15px 10px; font-weight: 500;">inv-002</td>
          <td style="padding: 15px 10px; color: var(--text-muted); font-size: 0.9rem;">2026-01-01</td>
          <td style="padding: 15px 10px; font-size: 0.9rem;">Pro</td>
          <td style="padding: 15px 10px; font-weight: 500;">$9.99</td>
          <td style="padding: 15px 10px;"><span style="background-color: #e6fdf2; color: #2ecc71; padding: 4px 8px; border-radius: 4px; font-size: 0.75rem; font-weight: 600;">paid</span></td>
        </tr>
      </tbody>
    </table>
  </div>

</div>

<?php page_end(); ?>
