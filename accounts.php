<?php
$accounts = [
    ['id' => 1, 'type' => 'Cuenta Corriente', 'number' => '1104-0000-0048-4821', 'balance' => 12450.75,  'currency' => 'USD', 'color' => '#4f46e5', 'opened' => '2019-03-15', 'status' => 'Activa'],
    ['id' => 2, 'type' => 'Cuenta de Ahorros', 'number' => '1104-0000-0033-3309', 'balance' => 45820.00, 'currency' => 'USD', 'color' => '#0891b2', 'opened' => '2018-07-22', 'status' => 'Activa'],
    ['id' => 3, 'type' => 'Tarjeta de Credito', 'number' => '4242-****-****-7742', 'balance' => -2340.50,'currency' => 'USD', 'color' => '#dc2626', 'opened' => '2021-11-01', 'status' => 'Activa'],
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cuentas — NovaBanco</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .accounts-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px; }
        .acc-card { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius); overflow: hidden; transition: transform 0.2s; }
        .acc-card:hover { transform: translateY(-3px); }
        .acc-card-top { padding: 24px; background: linear-gradient(135deg, var(--c), color-mix(in srgb, var(--c) 60%, #000)); position: relative; overflow: hidden; }
        .acc-card-top::after { content:''; position:absolute; bottom:-30px; right:-30px; width:120px; height:120px; background:rgba(255,255,255,0.07); border-radius:50%; }
        .acc-card-top .type { font-size:12px; opacity:.8; margin-bottom:4px; }
        .acc-card-top .num { font-size:14px; letter-spacing:2px; margin-bottom:16px; opacity:.75; }
        .acc-card-top .bal { font-size:30px; font-weight:800; }
        .acc-card-bottom { padding: 16px 24px; display: flex; justify-content: space-between; align-items: center; }
        .meta-item { font-size: 12px; color: var(--text-muted); }
        .meta-value { font-size: 13px; font-weight: 600; color: var(--text); margin-top: 2px; }
        .status-dot { display: inline-block; width: 8px; height: 8px; border-radius: 50%; background: var(--positive); margin-right: 6px; }
    </style>
</head>
<body>
    <aside class="sidebar">
        <div class="sidebar-logo">
            <span class="logo-icon">N</span>
            <span class="logo-text">NovaBanco</span>
        </div>
        <nav class="sidebar-nav">
            <a href="index.php" class="nav-item"><span class="nav-icon">⊞</span><span>Dashboard</span></a>
            <a href="accounts.php" class="nav-item active"><span class="nav-icon">🏦</span><span>Cuentas</span></a>
            <a href="transactions.php" class="nav-item"><span class="nav-icon">↔</span><span>Movimientos</span></a>
            <a href="transfer.php" class="nav-item"><span class="nav-icon">→</span><span>Transferir</span></a>
            <a href="#" class="nav-item"><span class="nav-icon">📊</span><span>Reportes</span></a>
            <a href="#" class="nav-item"><span class="nav-icon">⚙</span><span>Configuracion</span></a>
        </nav>
        <div class="sidebar-footer">
            <div class="user-avatar">FA</div>
            <div class="user-info">
                <div class="user-name">Francisco Aybar</div>
                <div class="user-account">****-****-****-4821</div>
            </div>
        </div>
    </aside>

    <main class="main">
        <header class="topbar">
            <div class="topbar-left">
                <h1 class="page-title">Mis Cuentas</h1>
                <span class="page-date"><?= count($accounts) ?> cuentas activas</span>
            </div>
            <div class="topbar-right">
                <button class="btn-primary">+ Nueva Cuenta</button>
            </div>
        </header>
        <div class="content">
            <div class="accounts-grid">
                <?php foreach ($accounts as $acc): ?>
                <div class="acc-card">
                    <div class="acc-card-top" style="--c: <?= $acc['color'] ?>">
                        <div class="type"><?= htmlspecialchars($acc['type']) ?></div>
                        <div class="num"><?= $acc['number'] ?></div>
                        <div class="bal <?= $acc['balance'] < 0 ? 'negative' : '' ?>">
                            <?= $acc['balance'] < 0 ? '-' : '' ?>$<?= number_format(abs($acc['balance']), 2, '.', ',') ?>
                            <span style="font-size:14px;font-weight:400;opacity:.7"><?= $acc['currency'] ?></span>
                        </div>
                    </div>
                    <div class="acc-card-bottom">
                        <div>
                            <div class="meta-item">Apertura</div>
                            <div class="meta-value"><?= date('d/m/Y', strtotime($acc['opened'])) ?></div>
                        </div>
                        <div>
                            <div class="meta-item">Estado</div>
                            <div class="meta-value">
                                <span class="status-dot"></span><?= $acc['status'] ?>
                            </div>
                        </div>
                        <div>
                            <a href="transactions.php" class="btn-primary" style="padding:8px 14px;font-size:12px;text-decoration:none;display:inline-block">Ver movimientos</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>
</body>
</html>
<?php // bug arreglado
// ok
// ok
BUG
// ok
// ok
