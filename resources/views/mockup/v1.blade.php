<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mockup TT RPG - Dark Cyan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root{
            --bg:#071017;
            --panel:#081821;
            --accent:#06b6d4; /* cyan */
            --muted:#6b7280;
            --glass: rgba(255,255,255,0.03);
        }
        html,body{height:100%;}
        body{
            background: linear-gradient(180deg,#041014 0%, #071017 60%);
            color:#e6f6f8;
            font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
            padding-top:48px; /* space for thin navbar */
        }
        /* Thin top nav */
        .thin-nav{
            height:44px;
            background: transparent;
            backdrop-filter: blur(6px);
            border-bottom: 1px solid rgba(6,182,212,0.06);
            position: fixed;
            top:0;left:0;right:0;z-index:1030;
            display:flex;align-items:center;padding:0 1rem;
        }
        .app-brand{font-weight:600;color:var(--accent);letter-spacing:0.6px}

        /* Layout */
        .app-shell{display:grid;grid-template-columns: 320px 1fr 320px;gap:18px;padding:18px;height:calc(100vh - 48px);box-sizing:border-box}
        .left-panel,.right-panel{background:var(--panel);border-radius:12px;padding:12px;box-shadow:0 6px 18px rgba(0,0,0,0.6);overflow:auto}
        .center-panel{background:linear-gradient(180deg, rgba(6,182,212,0.02), transparent);border-radius:12px;padding:12px;display:flex;flex-direction:column;align-items:center;justify-content:center;position:relative;overflow:hidden}

        /* Map area */
        .battle-map{background-image:linear-gradient( rgba(6,182,212,0.02) 1px, transparent 1px), linear-gradient(90deg, rgba(6,182,212,0.02) 1px, transparent 1px); background-size:40px 40px; width:100%; height:100%; border-radius:10px; position:relative;}
        .token{width:56px;height:56px;border-radius:50%;background:linear-gradient(180deg, rgba(6,182,212,0.12), rgba(6,182,212,0.02));border:2px solid rgba(6,182,212,0.14);display:flex;align-items:center;justify-content:center;color:#041017;font-weight:700;position:absolute;transform:translate(-50%,-50%);box-shadow:0 6px 18px rgba(0,0,0,0.5)}
        .token.player{background:linear-gradient(180deg,#06b6d4,#028a9a);color:#00181b}
        .token.enemy{background:linear-gradient(180deg,#b1066f,#7a053f);color:#fff}

        /* Right players bar */
        .player-row{display:flex;align-items:center;gap:10px;padding:8px;border-radius:8px;background:var(--glass);margin-bottom:8px}
        .avatar{width:56px;height:56px;border-radius:8px;flex-shrink:0;background:linear-gradient(180deg,rgba(255,255,255,0.02),transparent);display:flex;align-items:center;justify-content:center;font-weight:700}
        .stat-bars{flex:1}
        .hp{height:10px;border-radius:6px;background:rgba(255,255,255,0.06);overflow:hidden}
        .hp > i{display:block;height:100%;background:linear-gradient(90deg,var(--accent),#00ffa0);}
        .mp > i{display:block;height:100%;background:linear-gradient(90deg,#6ee7b7,#06b6d4);}

        .dice-scheme{display:flex;gap:6px;align-items:center;justify-content:center;padding-top:10px}
        .dice{width:38px;height:38px;border-radius:6px;background:rgba(255,255,255,0.03);display:flex;align-items:center;justify-content:center;font-weight:700;border:1px solid rgba(255,255,255,0.04)}

        /* Left character sheet */
        .sheet .label{color:var(--muted);font-size:13px}
        .sheet .value{font-weight:600}
        .sheet .section{padding:10px;background:linear-gradient(180deg, rgba(255,255,255,0.01), transparent);border-radius:8px;margin-bottom:10px}

        /* Footer actions */
        .footer-actions{position:fixed;left:50%;transform:translateX(-50%);bottom:18px;z-index:1050}
        .action-btn{min-width:140px;border-radius:12px;padding:12px 18px;font-weight:600}

        /* Responsive */
        @media (max-width:1100px){
            .app-shell{grid-template-columns: 1fr;grid-template-rows:auto 1fr auto;padding-bottom:120px}
            .left-panel,.right-panel{order:2;width:100%}
            .center-panel{order:1}
            .footer-actions{bottom:90px}
        }
    </style>
</head>
<body>
<div class="thin-nav">
    <div class="d-flex align-items-center w-100">
        <div class="app-brand me-3"><i class="bi bi-compass-fill"></i> TT‑RPG</div>
        <small class="text-muted">Sala: Aventura Sombria • Round 3</small>
        <div class="ms-auto text-muted small">Mestre: <span class="fw-semibold text-white ms-1">Arkan</span></div>
    </div>
</div>

<div class="container-fluid px-3 py-3" style="height:calc(100vh - 48px)">
    <div class="app-shell">

        <!-- Left: Character / NPC sheet -->
        <aside class="left-panel sheet">
            <div class="d-flex align-items-center mb-3">
                <div class="me-3 avatar" style="width:72px;height:72px;border-radius:10px">PV</div>
                <div>
                    <div class="h5 mb-0">Valen, Guardião das Marés</div>
                    <div class="text-muted small">Humano • Nível 6 • Druida</div>
                </div>
            </div>

            <div class="section">
                <div class="row">
                    <div class="col-6">
                        <div class="label">Força</div>
                        <div class="value">12</div>
                    </div>
                    <div class="col-6">
                        <div class="label">Destreza</div>
                        <div class="value">14</div>
                    </div>
                </div>
            </div>

            <div class="section">
                <div class="label">Atributos</div>
                <div class="mt-2 small text-muted">Pontos de vida máximos, iniciativa, deslocamento e resistência.</div>
                <ul class="list-unstyled mt-2 small">
                    <li><span class="fw-semibold">HP:</span> 48 / 62</li>
                    <li><span class="fw-semibold">Iniciativa:</span> +3</li>
                    <li><span class="fw-semibold">Deslocamento:</span> 9m</li>
                </ul>
            </div>

            <div class="section">
                <div class="label">Habilidades</div>
                <ul class="list-unstyled mt-2 small">
                    <li>Invocar Maré (2 usos)</li>
                    <li>Forma Selvagem</li>
                    <li>Curar Ferimentos (canalização)</li>
                </ul>
            </div>

            <div class="section">
                <div class="label">Inventário</div>
                <div class="mt-2 small text-muted">Bastão rúnico, capa resistente, poção de cura x2</div>
            </div>

            <div class="d-grid mt-2">
                <button class="btn btn-outline-light">Abrir histórico de ações</button>
            </div>
        </aside>

        <!-- Center: Battle map -->
        <main class="center-panel">
            <div class="w-100 h-100 battle-map" id="battleMap">
                <!-- tokens (example positions) -->
                <div class="token player" style="left:30%;top:40%">V</div>
                <div class="token player" style="left:45%;top:60%">A</div>
                <div class="token enemy" style="left:60%;top:42%">G</div>
                <div class="token enemy" style="left:70%;top:70%">O</div>

                <!-- grid overlay / compass -->
                <div style="position:absolute;right:12px;top:12px;background:rgba(0,0,0,0.25);padding:6px;border-radius:8px;font-size:13px">X: 12 Y: 8</div>
            </div>
        </main>

        <!-- Right: Players bar -->
        <aside class="right-panel">
            <div class="d-flex align-items-center mb-3 justify-content-between">
                <div class="fw-semibold">Jogadores</div>
                <div class="small text-muted">Turno: <span class="text-white fw-semibold">Valen</span></div>
            </div>

            <!-- Player list -->
            <div class="player-row">
                <div class="avatar" style="background-image:linear-gradient(180deg,#07b6d4,#026b6f);color:#001;">V</div>
                <div class="stat-bars">
                    <div class="d-flex justify-content-between small"><div>Valen</div><div class="text-muted">Lv6</div></div>
                    <div class="hp my-1"><i style="width:75%"></i></div>
                    <div class="mp my-1"><i style="width:50%"></i></div>
                </div>
                <div class="text-end small text-muted">3</div>
            </div>

            <div class="player-row">
                <div class="avatar" style="background-image:linear-gradient(180deg,#8b6af7,#5b27c9);">A</div>
                <div class="stat-bars">
                    <div class="d-flex justify-content-between small"><div>Ana</div><div class="text-muted">Lv5</div></div>
                    <div class="hp my-1"><i style="width:60%"></i></div>
                    <div class="mp my-1"><i style="width:80%"></i></div>
                </div>
                <div class="text-end small text-muted">2</div>
            </div>

            <div class="player-row">
                <div class="avatar" style="background-image:linear-gradient(180deg,#ffb86b,#ff7a18);">R</div>
                <div class="stat-bars">
                    <div class="d-flex justify-content-between small"><div>Rook</div><div class="text-muted">Lv4</div></div>
                    <div class="hp my-1"><i style="width:40%"></i></div>
                    <div class="mp my-1"><i style="width:35%"></i></div>
                </div>
                <div class="text-end small text-muted">4</div>
            </div>

            <div class="mt-3">
                <div class="fw-semibold small mb-2">Dados</div>
                <div class="dice-scheme">
                    <div class="dice">d20</div>
                    <div class="dice">d12</div>
                    <div class="dice">d10</div>
                    <div class="dice">d6</div>
                    <div class="dice">d4</div>
                </div>
            </div>

        </aside>

    </div>
</div>

<!-- Footer actions -->
<div class="footer-actions">
    <div class="d-flex gap-2">
        <button class="btn btn-lg btn-dark action-btn" style="border:1px solid rgba(6,182,212,0.14)"><i class="bi bi-box-arrow-up-right me-2"></i>Mover</button>
        <button class="btn btn-lg action-btn" style="background:linear-gradient(90deg,var(--accent),#00ffa0);color:#002;box-shadow:0 8px 30px rgba(6,182,212,0.12)"><i class="bi bi-lightning-fill me-2"></i>Atacar</button>
        <button class="btn btn-lg btn-outline-light action-btn"><i class="bi bi-heart-fill me-2"></i>Curar</button>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Small interactions for mockup
    document.querySelectorAll('.player-row').forEach(row=>{
        row.addEventListener('click', ()=>{
            document.querySelectorAll('.player-row').forEach(r=>r.style.boxShadow='none');
            row.style.boxShadow='0 8px 30px rgba(6,182,212,0.08)';
        });
    });

    // Example: make tokens selectable
    document.querySelectorAll('.token').forEach(t=>{
        t.addEventListener('click', (e)=>{
            e.stopPropagation();
            document.querySelectorAll('.token').forEach(x=>x.style.outline='');
            t.style.outline = '3px solid rgba(6,182,212,0.18)';
        });
    });
</script>
</body>
</html>
