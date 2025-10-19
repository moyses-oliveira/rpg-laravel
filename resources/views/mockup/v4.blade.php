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
            color: #42c7f3;
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
            transition: all 0.3s ease;
        }
        .left-panel.hidden {
            transform: translateX(-120%);
            opacity: 0;
            visibility: hidden;
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
            cursor: pointer;
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
            transition: all 0.2s ease-in-out;
        }
        .action-btn:hover {
            box-shadow: 0 0 12px rgba(6,182,212,0.5);
            transform: scale(1.1);
        }
        .char-stat {
            background: rgba(255,255,255,0.03);
            border-radius: 8px;
            padding: 6px 10px;
            margin-bottom: 6px;
        }
        .char-avatar {
            width: 40px; height: 40px; border-radius: 50%;
            background: #06b6d4; color: #00181b;
            display: flex; align-items: center; justify-content: center;
            font-weight: bold; margin-right: 8px;
        }
    </style>

    <style>
        /* Sobrescrevendo estilos do botão para um tom brilhoso azul piscina */
        .btn {
            background: linear-gradient(180deg, #00c6ff, #0072ff); /* Tom brilhoso azul piscina */
            color: #ffffff; /* Sempre deixar o texto claro */
            border: none;
            transition: all 0.3s ease-in-out;
        }

        .btn:hover {
            background: linear-gradient(180deg, #0072ff, #00c6ff); /* Invertendo gradiente no hover para efeito */
            box-shadow: 0 0 14px rgba(0, 198, 255, 0.6); /* Adicionando brilho no hover */
        }

        /* Sobrescrevendo texto geral para tons mais claros onde necessário */
        .text-dark, .text-muted {
            color: #e0f7fa !important; /* Azul piscina claro */
        }

        .char-avatar.bg-info,
        .char-avatar.bg-primary {

            color: #b3eaf2; /* Tons azul claro suave para reduzir o contraste */
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
    <div class="app-shell" style="grid-template-columns: 320px 1fr 320px;">
        <!-- Painel de jogadores e dados agora à esquerda -->
        <aside class="right-panel">
            <h6 class="text-accent mb-3"><i class="fa-solid fa-users"></i> Jogadores</h6>
            <div class="char-stat d-flex align-items-center">
                <div class="char-avatar bg-info text-dark">V</div>
                <div>
                    <strong>Valen</strong>
                    <div class="small text-muted">HP 85/100 | MP 50/70</div>
                </div>
            </div>
            <div class="char-stat d-flex align-items-center">
                <div class="char-avatar bg-primary">A</div>
                <div>
                    <strong>Artemis</strong>
                    <div class="small text-muted">HP 60/90 | MP 30/60</div>
                </div>
            </div>
            <hr class="border-secondary">
            <h6 class="text-accent mb-2"><i class="fa-solid fa-dice"></i> Dados</h6>
            <div class="d-flex flex-wrap gap-2">
                <button class="btn btn-outline-light btn-sm"><i class="fa-solid fa-dice-one"></i></button>
                <button class="btn btn-outline-light btn-sm"><i class="fa-solid fa-dice-two"></i></button>
                <button class="btn btn-outline-light btn-sm"><i class="fa-solid fa-dice-three"></i></button>
                <button class="btn btn-outline-light btn-sm"><i class="fa-solid fa-dice-four"></i></button>
                <button class="btn btn-outline-light btn-sm"><i class="fa-solid fa-dice-five"></i></button>
                <button class="btn btn-outline-light btn-sm"><i class="fa-solid fa-dice-six"></i></button>
            </div>
        </aside>

        <main class="center-panel">
            <div class="w-100 h-100 battle-map" id="battleMap">
                <div class="token player" style="left:30%;top:40%" onclick="toggleFicha('Valen')">V</div>
                <div class="token player" style="left:45%;top:60%" onclick="toggleFicha('Artemis')">A</div>
                <div class="token enemy" style="left:60%;top:42%">G</div>
                <div class="token enemy" style="left:70%;top:70%">O</div>
            </div>
        </main><!-- Ficha do personagem agora à direita, inicialmente oculta -->
        <aside class="left-panel hidden" id="fichaPanel">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="text-accent"><i class="fa-solid fa-user"></i> Ficha do Personagem</h6>
                <button class="btn btn-sm btn-outline-light" id="close-character-card"><i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div id="fichaContent">
                <p class="small text-muted">Selecione um personagem para ver os detalhes.</p>
            </div>
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
<script>

    function toggleFicha(nome) {
        const ficha = document.getElementById('fichaPanel');
        const content = document.getElementById('fichaContent');
        ficha.classList.remove('hidden');
        content.innerHTML = `
<p class='small fw-semibold text-white border-bottom pb-1 mb-2' style='font-size: 0.9rem;'>Atributos:</p>
        <div class='row small mb-2'>
            <div class='col-6 mb-1'>
                <span class='badge bg-primary d-flex justify-content-between w-100'>Força: <strong>${nome === 'Valen' ? '14' : '10'}</strong></span>
            </div>
            <div class='col-6 mb-1'>
                <span class='badge bg-primary d-flex justify-content-between w-100'>Destreza: <strong>${nome === 'Valen' ? '12' : '18'}</strong></span>
            </div>
            <div class='col-6 mb-1'>
                <span class='badge bg-primary d-flex justify-content-between w-100'>Constituição: <strong>${nome === 'Valen' ? '16' : '12'}</strong></span>
            </div>
            <div class='col-6 mb-1'>
                <span class='badge bg-primary d-flex justify-content-between w-100'>Inteligência: <strong>${nome === 'Valen' ? '18' : '14'}</strong></span>
            </div>
            <div class='col-6 mb-1'>
                <span class='badge bg-primary d-flex justify-content-between w-100'>Sabedoria: <strong>${nome === 'Valen' ? '20' : '12'}</strong></span>
            </div>
            <div class='col-6 mb-1'>
                <span class='badge bg-primary d-flex justify-content-between w-100'>Carisma: <strong>${nome === 'Valen' ? '10' : '14'}</strong></span>
            </div>
        </div>
        <p class='small fw-semibold text-white border-bottom pb-1 mb-2 mt-1' style='font-size: 0.9rem;'>Equipamentos:</p>
        <div class='badge bg-secondary'>${nome === 'Valen' ? 'Cajado da Floresta' : 'Arco Longo'}</div>
<hr/>
        <p class='small fw-semibold text-white border-bottom pb-1 mt-1 mb-2' style='font-size: 0.9rem;'>Habilidades:</p>
        <div class='badge bg-secondary '>${nome === 'Valen' ? 'Cura Natural' : 'Disparo Triplo'}</div>
<hr/>
`;
    }

    function fecharFicha() {
        const ficha = document.getElementById('fichaPanel');
        ficha.classList.add('hidden');
    }

    document.getElementById('close-character-card').addEventListener('click', () => fecharFicha());

</script>
</body>
</html>
