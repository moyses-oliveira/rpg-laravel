<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <title>PixiJS RPG - Visão com paredes (Visibility / FOV)</title>
    <link rel="stylesheet" href="{{ asset('pixi/demo.css') }}">
</head>
<body>
<div id="app">
    <div id="canvas-wrapper"></div>
    <div class="controls">
        <div class="hint">WASD ou clique para mover — a visão do personagem considera paredes (raycast visibility)</div>
        <div style="margin-left:auto" class="hint">PixiJS demo</div>
    </div>
</div>

<!-- PixiJS via CDN -->
<script type="module" src="{{ asset('tabletop/src/main.js') }}"></script>

</body>
</html>
