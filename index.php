<!-- Soy un comentario de una sola linea-->

<?php
session_start();

// Simulacion de datos del banco
$user = [
    'name' => 'Francisco Aybar',
    'account' => '****-****-****-4821',
    'avatar' => 'FA',
];

$accounts = [
    ['id' => 1, 'type' => 'Cuenta Corriente', 'number' => '****4821', 'balance' => 12450.75, 'currency' => 'USD', 'color' => '#4f46e5'],
    ['id' => 2, 'type' => 'Cuenta de Ahorros', 'number' => '****3309', 'balance' => 45820.00, 'currency' => 'USD', 'color' => '#0891b2'],
    ['id' => 3, 'type' => 'Tarjeta de Credito', 'number' => '****7742', 'balance' => -2340.50, 'currency' => 'USD', 'color' => '#dc2626'],
];

$transactions = [
    ['date' => '2026-03-18', 'desc' => 'Netflix Subscription', 'category' => 'Entretenimiento', 'amount' => -15.99, 'icon' => '🎬'],
    ['date' => '2026-03-17', 'desc' => 'Transferencia recibida - Maria Lopez', 'category' => 'Transferencia', 'amount' => 500.00, 'icon' => '↙'],
    ['date' => '2026-03-16', 'desc' => 'Supermercado La Colonia', 'category' => 'Compras', 'amount' => -87.43, 'icon' => '🛒'],
    ['date' => '2026-03-15', 'desc' => 'Salario mensual', 'category' => 'Ingresos', 'amount' => 3200.00, 'icon' => '💼'],
    ['date' => '2026-03-14', 'desc' => 'Gasolinera Shell', 'category' => 'Transporte', 'amount' => -45.00, 'icon' => '⛽'],
    ['date' => '2026-03-13', 'desc' => 'Restaurante La Pergola', 'category' => 'Alimentacion', 'amount' => -62.80, 'icon' => '🍽'],
    ['date' => '2026-03-12', 'desc' => 'Amazon Prime', 'category' => 'Compras', 'amount' => -14.99, 'icon' => '📦'],
    ['date' => '2026-03-11', 'desc' => 'Pago de Luz - ENEE', 'category' => 'Servicios', 'amount' => -120.00, 'icon' => '💡'],
];

$spending = [
    ['category' => 'Alimentacion', 'spent' => 420, 'budget' => 600, 'color' => '#f59e0b'],
    ['category' => 'Transporte',   'spent' => 180, 'budget' => 250, 'color' => '#10b981'],
    ['category' => 'Entretenimiento', 'spent' => 95, 'budget' => 100, 'color' => '#8b5cf6'],
    ['category' => 'Servicios',    'spent' => 340, 'budget' => 400, 'color' => '#0891b2'],
];

$total_balance = array_sum(array_column($accounts, 'balance'));
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaBanco — Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-logo">
            <span class="logo-icon">N</span>
            <span class="logo-text">NovaBanco</span>
        </div>
        <nav class="sidebar-nav">
            <a href="#" class="nav-item active">
                <span class="nav-icon">⊞</span>
                <span>Dashboard</span>
            </a>
            <a href="accounts.php" class="nav-item">
                <span class="nav-icon">🏦</span>
                <span>Cuentas</span>
            </a>
            <a href="transactions.php" class="nav-item">
                <span class="nav-icon">↔</span>
                <span>Movimientos</span>
            </a>
            <a href="transfer.php" class="nav-item">
                <span class="nav-icon">→</span>
                <span>Transferir</span>
            </a>
            <a href="#" class="nav-item">
                <span class="nav-icon">📊</span>
                <span>Reportes</span>
            </a>
            <a href="#" class="nav-item">
                <span class="nav-icon">⚙</span>
                <span>Configuracion</span>
            </a>
        </nav>
        <div class="sidebar-footer">
            <div class="user-avatar"><?= $user['avatar'] ?></div>
            <div class="user-info">
                <div class="user-name"><?= htmlspecialchars($user['name']) ?></div>
                <div class="user-account"><?= $user['account'] ?></div>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main">
        <!-- Header -->
        <header class="topbar">
            <div class="topbar-left">
                <h1 class="page-title">Dashboard</h1>
                <span class="page-date"><?= date('l, d \d\e F \d\e Y') ?></span>
            </div>
            <div class="topbar-right">
                <button class="btn-icon" title="Notificaciones">
                    🔔 <span class="badge">3</span>
                </button>
                <button class="btn-primary" onclick="window.location='transfer.php'">+ Transferir</button>
            </div>
        </header>

        <div class="content">
            <!-- Balance total -->
            <div class="balance-hero">
                <div class="balance-hero-left">
                    <p class="balance-label">Balance Total</p>
                    <h2 class="balance-amount">$<?= number_format($total_balance, 2, '.', ',') ?></h2>
                    <span class="balance-trend positive">▲ 2.4% este mes</span>
                </div>
                <div class="balance-hero-right">
                    <div class="mini-stat">
                        <span class="mini-label">Ingresos (Mar)</span>
                        <span class="mini-value positive">+$3,700.00</span>
                    </div>
                    <div class="mini-stat">
                        <span class="mini-label">Gastos (Mar)</span>
                        <span class="mini-value negative">-$346.21</span>
                    </div>
                </div>
            </div>

            <!-- Tarjetas de cuentas -->
            <section class="section">
                <h3 class="section-title">Mis Cuentas</h3>
                <div class="cards-grid">
                    <?php foreach ($accounts as $acc): ?>
                    <div class="account-card" style="--card-color: <?= $acc['color'] ?>">
                        <div class="card-header">
                            <span class="card-type"><?= htmlspecialchars($acc['type']) ?></span>
                            <span class="card-currency"><?= $acc['currency'] ?></span>
                        </div>
                        <div class="card-number"><?= $acc['number'] ?></div>
                        <div class="card-balance <?= $acc['balance'] < 0 ? 'negative' : '' ?>">
                            $<?= number_format(abs($acc['balance']), 2, '.', ',') ?>
                            <?= $acc['balance'] < 0 ? '<span class="debt-label">deuda</span>' : '' ?>
                        </div>
                        <div class="card-footer">
                            <a href="accounts.php?id=<?= $acc['id'] ?>" class="card-link">Ver detalle →</a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <!-- Dos columnas: transacciones + presupuesto -->
            <div class="two-col">
                <!-- Ultimas transacciones -->
                <section class="section">
                    <div class="section-header">
                        <h3 class="section-title">Ultimos Movimientos</h3>
                        <a href="transactions.php" class="link-all">Ver todos →</a>
                    </div>
                    <div class="transactions-list">
                        <?php foreach ($transactions as $tx): ?>
                        <div class="tx-item">
                            <div class="tx-icon"><?= $tx['icon'] ?></div>
                            <div class="tx-info">
                                <div class="tx-desc"><?= htmlspecialchars($tx['desc']) ?></div>
                                <div class="tx-meta">
                                    <span class="tx-category"><?= $tx['category'] ?></span>
                                    <span class="tx-date"><?= date('d M', strtotime($tx['date'])) ?></span>
                                </div>
                            </div>
                            <div class="tx-amount <?= $tx['amount'] > 0 ? 'positive' : 'negative' ?>">
                                <?= $tx['amount'] > 0 ? '+' : '' ?>$<?= number_format(abs($tx['amount']), 2) ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </section>

                <!-- Presupuesto mensual -->
                <section class="section">
                    <div class="section-header">
                        <h3 class="section-title">Presupuesto Mensual</h3>
                        <span class="month-label">Marzo 2026</span>
                    </div>
                    <div class="budget-list">
                        <?php foreach ($spending as $sp): ?>
                        <?php $pct = round(($sp['spent'] / $sp['budget']) * 100); ?>
                        <div class="budget-item">
                            <div class="budget-top">
                                <span class="budget-cat"><?= $sp['category'] ?></span>
                                <span class="budget-nums">$<?= $sp['spent'] ?> / $<?= $sp['budget'] ?></span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill <?= $pct >= 90 ? 'danger' : '' ?>"
                                     style="width: <?= $pct ?>%; background: <?= $sp['color'] ?>"></div>
                            </div>
                            <span class="budget-pct"><?= $pct ?>%</span>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Acciones rapidas -->
                    <div class="quick-actions">
                        <h4 class="quick-title">Acciones Rapidas</h4>
                        <div class="quick-grid">
                            <a href="transfer.php" class="quick-btn">
                                <span>↗</span> Transferir
                            </a>
                            <a href="#" class="quick-btn">
                                <span>📱</span> Recargar
                            </a>
                            <a href="#" class="quick-btn">
                                <span>📄</span> Estado de Cuenta
                            </a>
                            <a href="#" class="quick-btn">
                                <span>💳</span> Pagar Tarjeta
                            </a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
</body>
</html>
