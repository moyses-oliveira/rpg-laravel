<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mockup TT RPG - Dark Cyan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --bg: #071017;
            --panel: #081821;
            --accent: #06b6d4;
            --muted: #6b7280;
        }
        html, body { height: 100%; }
        body {
            background: linear-gradient(180deg, #041014 0%, #071017 60%);
            color: #e6f6f8;
            font-family: Inter, system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial;
            padding-top: 48px;
        }
        .thin-nav {
            height: 44px;
            backdrop-filter: blur(6px);
            border-bottom: 1px solid rgba(6,182,212,0.06);
            position: fixed; top: 0; left: 0; right: 0; z-index: 1030;
            display: flex; align-items: center; padding: 0 1rem;
        }
        .app-brand { font-weight: 600; color: var(--accent); letter-spacing: 0.6px; }
        .app-shell {
            display: grid;
            grid-template-columns: 320px 1fr 320px;
            gap: 18px;
            padding: 18px;
            height: calc(100vh - 48px);
            box-sizing: border-box;
        }
        .left-panel, .right-panel {
            background: var(--panel);
            border-radius: 12px;
            padding: 12px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.6);
            overflow: auto;
        }
        .center-panel {
            background: linear-gradient(180deg, rgba(6,182,212,0.02), transparent);
            border-radius: 12px;
            padding: 12px;
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            position: relative; overflow: hidden;
        }
        .battle-map {
            background-image: linear-gradient(rgba(6,182,212,0.02) 1px, transparent 1px), linear-gradient(90deg, rgba(6,182,212,0.02) 1px, transparent 1px);
            background-size: 40px 40px;
            width: 100%; height: 100%; border-radius: 10px; position: relative;
        }
        .token {
            width: 56px; height: 56px; border-radius: 50%;
            background: linear-gradient(180deg, rgba(6,182,212,0.12), rgba(6,182,212,0.02));
            border: 2px solid rgba(6,182,212,0.14);
            display: flex; align-items: center; justify-content: center;
            color: #041017; font-weight: 700;
            position: absolute; transform: translate(-50%, -50%);
            box-shadow: 0 6px 18px rgba(0,0,0,0.5);
        }
        .token.player { background: linear-gradient(180deg,#06b6d4,#028a9a); color: #00181b; }
        .token.enemy { background: linear-gradient(180deg,#b1066f,#7a053f); color: #fff; }
        .footer-actions {
            position: fixed; left: 50%; transform: translateX(-50%);
            bottom: 18px; z-index: 1050;
        }
        .action-btn {
            border-radius: 8px; padding: 6px 10px; font-size: 0.85rem;
            display: flex; align-items: center; justify-content: center; gap: 6px;
            min-width: auto;
        }
    </style>
</head>
<body>
<div class="thin-nav">
    <div class="d-flex align-items-center w-100">
        <div class="app-brand me-3"><i class="fa-solid fa-dice-d20 me-1"></i> TT-RPG</div>
        <small class="text-muted">Sala: Aventura Sombria • Round 3</small>
        <div class="ms-auto text-muted small">Mestre: <span class="fw-semibold text-white ms-1">Arkan</span></div>
    </div>
</div>

<div class="container-fluid px-3 py-3" style="height:calc(100vh - 48px)">
    <div class="app-shell">
        <aside class="left-panel">
            <h6 class="text-accent mb-3"><i class="fa-solid fa-user"></i> Ficha do Personagem</h6>
            <p class="small text-muted">Detalhes completos do jogador selecionado.</p>
        </aside>
        <main class="center-panel">
            <div class="w-100 h-100 battle-map" id="battleMap">
                <div class="token player" style="left:30%;top:40%">V</div>
                <div class="token player" style="left:45%;top:60%">A</div>
                <div class="token enemy" style="left:60%;top:42%">G</div>
                <div class="token enemy" style="left:70%;top:70%">O</div>
            </div>
        </main>
        <aside class="right-panel">
            <h6 class="text-accent mb-3"><i class="fa-solid fa-users"></i> Jogadores</h6>
            <p class="small text-muted">Status dos aliados e inimigos.</p>
        </aside>
    </div>
</div>

<div class="footer-actions">
    <div class="d-flex gap-2">
        <button class="btn btn-dark action-btn" title="Mover"><i class="fa-solid fa-up-right-from-square"></i></button>
        <button class="btn btn-primary action-btn" title="Atacar"><i class="fa-solid fa-bolt"></i></button>
        <button class="btn btn-outline-light action-btn" title="Curar"><i class="fa-solid fa-heart"></i></button>
        <button class="btn btn-outline-light action-btn" title="Defender"><i class="fa-solid fa-shield"></i></button>
        <button class="btn btn-outline-light action-btn" title="Rolar Dados"><i class="fa-solid fa-dice-d20"></i></button>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
