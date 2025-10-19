<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wireframe - TTRPG Mockup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="/mockup/v5.style.css">
</head>
<body>
<div class="app-shell">
    <header class="topbar d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center gap-3">
            <a class="btn btn-sm btn-outline-light btn-compact" href="#"><i class="fa fa-arrow-left"></i></a>
            <div class="brand">TTRPG • Mockup</div>
        </div>
        <div class="d-flex align-items-center gap-2 text-muted">
            <i class="fa fa-search"></i>
            <i class="fa fa-bell"></i>
            <i class="fa fa-user-circle"></i>
        </div>
    </header>

    <div class="main">
        <!-- LEFT PANEL -->
        <aside class="side-panel">
            <h6 class="text-uppercase text-muted small">Party</h6>
            <div class="mt-2">
                <div class="character">
                    <div class="avatar">A</div>
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between align-items-center">
                            <strong>Aria</strong>
                            <small class="stat">Lvl 5</small>
                        </div>
                        <div class="d-flex gap-2 mt-1">
                            <div class="progress" style="height:6px;width:100%">
                                <div class="progress-bar" style="width:65%;background:var(--accent)"></div>
                            </div>
                            <small class="stat">HP 65/100</small>
                        </div>
                    </div>
                </div>

                <div class="character">
                    <div class="avatar">B</div>
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between align-items-center">
                            <strong>Borin</strong>
                            <small class="stat">Lvl 4</small>
                        </div>
                        <div class="d-flex gap-2 mt-1">
                            <div class="progress" style="height:6px;width:100%">
                                <div class="progress-bar" style="width:40%;background:#f97316"></div>
                            </div>
                            <small class="stat">HP 40/100</small>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-3" style="border-color:rgba(255,255,255,0.03)">
            <div class="d-flex gap-2">
                <button class="btn btn-sm btn-outline-light btn-compact w-100"><i class="fa fa-comment"></i> Chat</button>
                <button class="btn btn-sm btn-outline-light btn-compact w-100"><i class="fa fa-cog"></i></button>
            </div>
        </aside>

        <!-- CENTER -->
        <main class="center-area">
            <div class="board-wrap">
                <div class="board-title">DM: "A fierce dragon blocks your path!"</div>
                <div class="hex-board d-flex align-items-center justify-content-center">
                    <!-- Wireframe placeholders for hexes / tokens -->
                    <div class="row w-100 gx-3">
                        <div class="col-12 d-flex justify-content-center mb-3">
                            <div class="placeholder-glow" style="width:86%;height:260px;display:flex;align-items:center;justify-content:center;border-radius:12px;border:2px dashed rgba(6,182,212,0.08)">
                                <div class="text-center text-muted">
                                    <div style="font-size:1.1rem;font-weight:600;color:var(--muted)">Board (wireframe)</div>
                                    <div style="font-size:.85rem;margin-top:.4rem;color:var(--muted)">hex grid / miniatures / terrain</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- small roll panel left inside board -->
                <div style="position:absolute;left:18px;bottom:18px;">
                    <div class="controls d-flex flex-column gap-2">
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-outline-light btn-compact"><i class="fa fa-dice"></i></button>
                            <button class="btn btn-sm btn-outline-light btn-compact"><i class="fa fa-bolt"></i></button>
                            <button class="btn btn-sm btn-outline-light btn-compact"><i class="fa fa-shield-alt"></i></button>
                        </div>
                        <button class="btn btn-sm btn-primary btn-compact text-white"><i class="fa fa-dice fa-fw"></i> ROLL</button>
                    </div>
                </div>

                <div class="dialog-bubble">"Decida sua ação"</div>
            </div>

            <!-- bottom controls inside center column (mini-map, journal, music...) -->
            <div class="d-flex justify-content-center">
                <div class="btn-group" role="group">
                    <button class="btn btn-sm btn-outline-light btn-compact"><i class="fa fa-map"></i></button>
                    <button class="btn btn-sm btn-outline-light btn-compact"><i class="fa fa-book"></i></button>
                    <button class="btn btn-sm btn-outline-light btn-compact"><i class="fa fa-music"></i></button>
                    <button class="btn btn-sm btn-outline-light btn-compact"><i class="fa fa-cog"></i></button>
                </div>
            </div>
        </main><!-- RIGHT PANEL -->
        <aside class="side-panel slim">
            <div class="d-flex justify-content-between align-items-center selected-header">
                <div class="selected-info">
                    <small class="text-muted">Selected</small>
                    <div class="d-flex align-items-center gap-2 mt-1 selected-title">
                        <div class="mini-icon selected-icon">
                            <i class="fa fa-user"></i>
                        </div>
                        <strong>Goblin Guard</strong>
                    </div>
                </div>
                <div class="text-end selected-stats">
                    <div class="text-muted">AC 13</div>
                    <div class="text-muted">HP 18</div>
                </div>
            </div>

            <div class="stat-list">
                <h6 class="text-uppercase stat-title small">Attributes</h6>
                <div class="row ps-1 pe-1">
                    <div class="col-12 stat-row badge bg-cyan">
                        <div class="d-flex justify-content-between">
                            <span>Força</span>
                            <span>10</span>
                        </div>
                    </div>
                    <div class="col-12 stat-row badge bg-cyan">
                        <div class="d-flex justify-content-between">
                            <span>Destreza</span>
                            <span>14</span>
                        </div>
                    </div>
                    <div class="col-12 stat-row badge bg-cyan">
                        <div class="d-flex justify-content-between">
                            <span>Constituição</span>
                            <span>12</span>
                        </div>
                    </div>
                    <div class="col-12 stat-row badge bg-cyan">
                        <div class="d-flex justify-content-between">
                            <span>Percepção</span>
                            <span>13</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="skill-list">
                <h6 class="text-uppercase stat-title small">Skills</h6>
                <div class="row ps-1 pe-1">
                    <div class="col-12 stat-row badge bg-cyan">
                        <div class="d-flex justify-content-between">
                            <span>Stealth</span>
                            <span>+5</span>
                        </div>
                    </div>
                    <div class="col-12 stat-row badge bg-cyan">
                        <div class="d-flex justify-content-between">
                            <span>Athletics</span>
                            <span>+2</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="inventory-list">
                <h6 class="text-uppercase stat-title small">Inventory</h6>
                <div class="row ps-1 pe-1">
                    <div class="col-12 stat-row badge bg-cyan">
                        <span>Short Sword</span>
                    </div>
                    <div class="col-12 stat-row badge bg-cyan">
                        <span>Shield</span>
                    </div>
                    <div class="col-12 stat-row badge bg-cyan">
                        <span>Health Potion</span>
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2 action-buttons">
                <button class="btn btn-sm btn-compact w-100 action-btn-primary">
                    <i class="fa fa-battle"></i> Actions
                </button>
                <button class="btn btn-sm btn-compact w-100 action-btn-secondary">
                    <i class="fa fa-info-circle"></i>
                </button>
            </div>
        </aside>

    </div>

    <footer class="bottombar">
        <div class="d-flex align-items-center gap-3">
            <button class="btn btn-sm btn-outline-light btn-compact"><i class="fa fa-arrow-left"></i></button>
            <div class="text-muted small">Turn 3 • Round 1</div>
        </div>

        <div class="flex-grow-1 d-flex justify-content-center">
            <div class="toolbar">
                <button class="btn btn-sm btn-outline-light btn-compact"><i class="fa fa-comments"></i></button>
                <button class="btn btn-sm btn-outline-light btn-compact"><i class="fa fa-hammer"></i></button>
                <button class="btn btn-sm btn-outline-light btn-compact"><i class="fa fa-eye"></i></button>
            </div>
        </div>

        <div class="d-flex gap-2 align-items-center">
            <div class="text-muted small">Players: 4</div>
            <button class="btn btn-sm btn-outline-light btn-compact"><i class="fa fa-share-alt"></i></button>
        </div>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
