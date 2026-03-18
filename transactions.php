<?php
$transactions = [
    ['date' => '2026-03-18', 'desc' => 'Netflix Subscription',        'category' => 'Entretenimiento', 'amount' => -15.99,  'icon' => '🎬', 'status' => 'completado'],
    ['date' => '2026-03-17', 'desc' => 'Transferencia - Maria Lopez',  'category' => 'Transferencia',    'amount' => 500.00,  'icon' => '↙',  'status' => 'completado'],
    ['date' => '2026-03-16', 'desc' => 'Supermercado La Colonia',      'category' => 'Compras',          'amount' => -87.43,  'icon' => '🛒', 'status' => 'completado'],
    ['date' => '2026-03-15', 'desc' => 'Salario mensual',              'category' => 'Ingresos',         'amount' => 3200.00, 'icon' => '💼', 'status' => 'completado'],
    ['date' => '2026-03-14', 'desc' => 'Gasolinera Shell',             'category' => 'Transporte',       'amount' => -45.00,  'icon' => '⛽', 'status' => 'completado'],
    ['date' => '2026-03-13', 'desc' => 'Restaurante La Pergola',       'category' => 'Alimentacion',     'amount' => -62.80,  'icon' => '🍽', 'status' => 'completado'],
    ['date' => '2026-03-12', 'desc' => 'Amazon Prime',                 'category' => 'Compras',          'amount' => -14.99,  'icon' => '📦', 'status' => 'completado'],
    ['date' => '2026-03-11', 'desc' => 'Pago de Luz - ENEE',           'category' => 'Servicios',        'amount' => -120.00, 'icon' => '💡', 'status' => 'completado'],
    ['date' => '2026-03-10', 'desc' => 'Farmacia Kielsa',              'category' => 'Salud',            'amount' => -35.50,  'icon' => '💊', 'status' => 'completado'],
    ['date' => '2026-03-09', 'desc' => 'Transferencia enviada - Juan', 'category' => 'Transferencia',    'amount' => -200.00, 'icon' => '↗',  'status' => 'completado'],
    ['date' => '2026-03-08', 'desc' => 'Spotify Premium',              'category' => 'Entretenimiento',  'amount' => -9.99,   'icon' => '🎵', 'status' => 'completado'],
    ['date' => '2026-03-07', 'desc' => 'Gimnasio Anytime Fitness',     'category' => 'Salud',            'amount' => -45.00,  'icon' => '🏋', 'status' => 'completado'],
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Movimientos — NovaBanco</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .filter-bar { display:flex; gap:10px; margin-bottom:20px; flex-wrap:wrap; }
        .filter-btn { background:var(--surface2); border:1px solid var(--border); color:var(--text-muted); border-radius:20px; padding:6px 16px; cursor:pointer; font-size:12px; transition:all 0.2s; }
        .filter-btn.active, .filter-btn:hover { border-color:var(--accent); color:#818cf8; background:rgba(79,70,229,0.1); }
        .tx-table { width:100%; border-collapse:collapse; }
        .tx-table th { text-align:left; padding:10px 12px; font-size:11px; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.5px; border-bottom:1px solid var(--border); }
        .tx-table td { padding:14px 12px; border-bottom:1px solid var(--border); font-size:13px; vertical-align:middle; }
        .tx-table tr:hover td { background:var(--surface2); }
        .status-badge { padding:3px 10px; border-radius:20px; font-size:11px; font-weight:600; background:rgba(16,185,129,0.15); color:var(--positive); }
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
            <a href="accounts.php" class="nav-item"><span class="nav-icon">🏦</span><span>Cuentas</span></a>
            <a href="transactions.php" class="nav-item active"><span class="nav-icon">↔</span><span>Movimientos</span></a>
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
                <h1 class="page-title">Movimientos</h1>
                <span class="page-date">Marzo 2026</span>
            </div>
            <div class="topbar-right">
                <button class="btn-primary" onclick="window.location='transfer.php'">+ Transferir</button>
            </div>
        </header>
        <div class="content">
            <section class="section">
                <div class="filter-bar">
                    <button class="filter-btn active">Todos</button>
                    <button class="filter-btn">Ingresos</button>
                    <button class="filter-btn">Gastos</button>
                    <button class="filter-btn">Transferencias</button>
                </div>
                <table class="tx-table">
                    <thead>
                        <tr>
                            <th>Descripcion</th>
                            <th>Categoria</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th style="text-align:right">Monto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($transactions as $tx): ?>
                        <tr>
                            <td>
                                <div style="display:flex;align-items:center;gap:12px">
                                    <span style="font-size:18px"><?= $tx['icon'] ?></span>
                                    <span style="font-weight:500"><?= htmlspecialchars($tx['desc']) ?></span>
                                </div>
                            </td>
                            <td><span class="tx-category"><?= $tx['category'] ?></span></td>
                            <td style="color:var(--text-muted)"><?= date('d M Y', strtotime($tx['date'])) ?></td>
                            <td><span class="status-badge"><?= $tx['status'] ?></span></td>
                            <td style="text-align:right;font-weight:700" class="<?= $tx['amount'] > 0 ? 'positive' : 'negative' ?>">
                                <?= $tx['amount'] > 0 ? '+' : '' ?>$<?= number_format(abs($tx['amount']), 2) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
        </div>
    </main>
    <script>
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
            });
        });
    </script>
</body>
</html>
