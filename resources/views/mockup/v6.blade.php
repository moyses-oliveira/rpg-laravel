<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wireframe Interativo - TTRPG Mockup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root{
            --bg:#081018;--panel:#0f1a22;--accent:#06b6d4;--muted:#94a3b8;
        }
        html,body{height:100%;background:var(--bg);color:#e6f7fb;font-family:Inter,system-ui,Arial;margin:0}
        .app-shell{height:100vh;display:flex;flex-direction:column}
        .topbar{background:linear-gradient(90deg,rgba(255,255,255,0.02),rgba(255,255,255,0.01));border-bottom:1px solid rgba(255,255,255,0.03);padding:.5rem 1rem}
        .topbar .brand{font-weight:600;color:var(--accent)}
        .main{flex:1;display:flex;gap:1rem;padding:1rem;align-items:stretch;overflow:hidden}
        .side-panel{width:260px;background:var(--panel);border-radius:.6rem;padding:1rem;box-shadow:0 6px 20px rgba(2,6,23,0.6);transition:all .4s ease}
        .side-panel.hidden{transform:translateX(-110%);opacity:0}
        .side-panel.slim{width:220px;transition:all .4s ease}
        .side-panel.slim.hidden{transform:translateX(110%);opacity:0}
        .center-area{flex:1;display:flex;flex-direction:column;gap:1rem;overflow:hidden}
        .board-wrap{flex:1;background:linear-gradient(180deg,rgba(6,11,14,0.6),rgba(7,12,15,0.8));border-radius:1rem;padding:1rem;display:flex;align-items:center;justify-content:center;position:relative;border:1px solid rgba(6,182,212,0.06)}
        .hex-board{width:720px;height:420px;background:radial-gradient(circle at 40% 30%,rgba(6,182,212,0.03),transparent 20%),linear-gradient(180deg,rgba(255,255,255,0.01),transparent);border-radius:18px;display:grid;place-items:center;border:1px dashed rgba(255,255,255,0.03);box-shadow:inset 0 0 40px rgba(6,182,212,0.02)}
        .board-title{position:absolute;top:16px;left:50%;transform:translateX(-50%);background:rgba(0,0,0,0.25);padding:.35rem .8rem;border-radius:999px;border:1px solid rgba(6,182,212,0.12);font-size:.95rem}
        .controls .btn-compact{padding:.35rem .5rem;font-size:.85rem;border-radius:.45rem}
        .character{display:flex;gap:.6rem;align-items:center;padding:.45rem;border-radius:.5rem;margin-bottom:.5rem;background:linear-gradient(180deg,rgba(255,255,255,0.01),transparent)}
        .avatar{width:44px;height:44px;border-radius:8px;background:linear-gradient(180deg,rgba(255,255,255,0.02),rgba(0,0,0,0.2));display:flex;align-items:center;justify-content:center;color:var(--muted);font-weight:700}
        .stat{font-size:.78rem;color:var(--muted)}
        .bottombar{height:72px;background:var(--panel);border-top:1px solid rgba(255,255,255,0.02);display:flex;align-items:center;gap:1rem;padding:0 1rem;border-radius:0 0 .8rem .8rem}
        .toolbar{display:flex;gap:.6rem;align-items:center}
        .dialog-bubble{position:absolute;top:70px;left:50%;transform:translateX(-50%);background:linear-gradient(180deg,rgba(0,0,0,0.45),rgba(0,0,0,0.55));padding:.6rem 1rem;border-radius:.6rem;border:1px solid rgba(6,182,212,0.14);font-size:.95rem}
        .stat-list .row{border-bottom:1px dashed rgba(255,255,255,0.03);padding:.45rem 0}
        .mini-icon{width:36px;height:36px;border-radius:.45rem;display:inline-flex;align-items:center;justify-content:center;background:rgba(255,255,255,0.02);color:var(--muted)}
    </style>
</head>
<body>
<div class="app-shell">
    <header class="topbar d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center gap-3">
            <button id="toggleLeft" class="btn btn-sm btn-outline-light btn-compact"><i class="fa fa-bars"></i></button>
            <div class="brand">TTRPG • Mockup</div>
        </div>
        <div class="d-flex align-items-center gap-2 text-muted">
            <i class="fa fa-search"></i>
            <i class="fa fa-bell"></i>
            <i class="fa fa-user-circle"></i>
        </div>
    </header>

    <div class="main">
        <aside id="leftPanel" class="side-panel">
            <h6 class="text-uppercase text-muted small">Party</h6>
            <div class="mt-2">
                <div class="character"><div class="avatar">A</div><div><strong>Aria</strong><div class="stat">HP 65/100</div></div></div>
                <div class="character"><div class="avatar">B</div><div><strong>Borin</strong><div class="stat">HP 40/100</div></div></div>
            </div>
        </aside>

        <main class="center-area">
            <div class="board-wrap">
                <div class="board-title" id="dmMessage">DM: "A fierce dragon blocks your path!"</div>
                <div class="hex-board">
                    <div class="text-muted">[ Wireframe Tabuleiro ]</div>
                </div>
                <div style="position:absolute;left:18px;bottom:18px;">
                    <div class="controls d-flex flex-column gap-2">
                        <button id="rollDice" class="btn btn-sm btn-primary btn-compact text-white"><i class="fa fa-dice"></i> ROLL</button>
                        <div id="rollResult" class="text-center text-muted small"></div>
                    </div>
                </div>
            </div>
        </main>

        <aside id="rightPanel" class="side-panel slim">
            <div class="d-flex justify-content-between align-items-center">
                <div><small class="text-muted">Selected</small><div><strong>Goblin Guard</strong></div></div>
                <button id="toggleRight" class="btn btn-sm btn-outline-light btn-compact"><i class="fa fa-xmark"></i></button>
            </div>
            <div class="stat-list mt-3">
                <div class="row"><div class="col-8">Força</div><div class="col-4 text-end">10</div></div>
                <div class="row"><div class="col-8">Destreza</div><div class="col-4 text-end">14</div></div>
            </div>
        </aside>
    </div>

    <footer class="bottombar justify-content-between">
        <button id="toggleRightPanel" class="btn btn-sm btn-outline-light btn-compact"><i class="fa fa-user"></i> Stats</button>
        <div class="text-muted small">Turno 3 • Rodada 1</div>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const leftPanel = document.getElementById('leftPanel');
    const rightPanel = document.getElementById('rightPanel');
    document.getElementById('toggleLeft').addEventListener('click', ()=>{
        leftPanel.classList.toggle('hidden');
    });
    document.getElementById('toggleRightPanel').addEventListener('click', ()=>{
        rightPanel.classList.toggle('hidden');
    });
    document.getElementById('toggleRight').addEventListener('click', ()=>{
        rightPanel.classList.add('hidden');
    });
    const rollBtn = document.getElementById('rollDice');
    const rollResult = document.getElementById('rollResult');
    rollBtn.addEventListener('click', ()=>{
        const val = Math.floor(Math.random()*20)+1;
        rollResult.innerText = `🎲 Rolagem: ${val}`;
        const msg = document.getElementById('dmMessage');
        msg.innerText = val > 10 ? `Sucesso! (${val})` : `Falha... (${val})`;
    });
</script>
</body>
</html>
