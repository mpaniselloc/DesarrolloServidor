<header class="header">
  <div class="logo">
    <img src="<?php echo file_exists('assets/logo.png') ? 'assets/logo.png' : '../assets/logo.png'; ?>" alt="logo">
  </div>
  <?php if (isset($_SESSION['usuario'])): ?>
    <div style="color: #333; font-size: 15px;">
      user: <?php echo htmlspecialchars($_SESSION['usuario']); ?> | hora inicio:<?php echo date("H:i", $_SESSION['tiempo']); ?>
    </div>
  <?php endif; ?>
</header>