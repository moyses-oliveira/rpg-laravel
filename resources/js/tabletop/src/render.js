import {Graphics, Container} from 'pixi.js';

export default function renderApplication(app) {
    const WORLD_Z = 0;

// Containers
    const world = new Container();

// Simple grid background
    const grid = new Graphics();
    const GRID_SIZE = 48;
    for (let x = 0; x < app.renderer.width; x += GRID_SIZE) {
        grid.setStrokeStyle (1, 0x333333, 0.6).moveTo(x, 0).lineTo(x, app.renderer.height)
    }
    for (let y = 0; y < app.renderer.height; y += GRID_SIZE) {
        grid.setStrokeStyle (1, 0x333333, 0.6).moveTo(0, y).lineTo(app.renderer.width, y)
    }
    world.addChild(grid);

// Walls defined as polygons (arrays of points) or segments. We'll convert polygons to segments.
    const wallsPolygons = [
        // room border
        [{x: 40, y: 40}, {x: app.renderer.width - 40, y: 40}, {
            x: app.renderer.width - 40,
            y: app.renderer.height - 140
        }, {x: 40, y: app.renderer.height - 140}],
        // inner block
        [{x: 260, y: 200}, {x: 460, y: 200}, {x: 460, y: 320}, {x: 360, y: 380}, {x: 260, y: 320}],
        // long thin wall
        [{x: 520, y: 80}, {x: 560, y: 80}, {x: 560, y: 380}, {x: 520, y: 380}],
        // small pillar
        [{x: 120, y: 360}, {x: 160, y: 360}, {x: 160, y: 420}, {x: 120, y: 420}],
    ];

// Convert to segments
    let segments = [];
    for (const poly of wallsPolygons) {
        for (let i = 0; i < poly.length; i++) {
            const a = poly[i];
            const b = poly[(i + 1) % poly.length];
            segments.push({a: {x: a.x, y: a.y}, b: {x: b.x, y: b.y}});
        }
    }

// Draw walls
    const wallsGraphics = new Graphics();
    wallsGraphics.setStrokeStyle (2, 0xdddddd, 1);
    for (const poly of wallsPolygons) {
        wallsGraphics.moveTo(poly[0].x, poly[0].y);
        for (let i = 1; i < poly.length; i++) wallsGraphics.lineTo(poly[i].x, poly[i].y);
        wallsGraphics.closePath();
    }
    wallsGraphics.fill({color: 0x444444});
    world.addChild(wallsGraphics);

// Player
    const player = new Container();
    player.x = 160;
    player.y = 120;
    const body = new Graphics();
    body.circle(0, 0, 10);
    body.fill({color: 0x00ccff});

    player.addChild(body);
    world.addChild(player);

// Direction indicator
    const dirLine = new Graphics();
    player.addChild(dirLine);

// Visibility graphics (we'll use it to 'erase' darkness)
    const darkness = new Graphics();
    darkness.rect(0, 0, app.renderer.width, app.renderer.height);
    darkness.fill({color: 0x000000,alpha: 0.85});

    const visibility = new Graphics();
    // We'll draw the visibility polygon into `visibility` every frame and use blend mode to punch a hole
    visibility.blendMode = 'destination-out';


    app.stage.addChild(world);
    app.stage.addChild(darkness);
    app.stage.addChild(visibility);

    function getIntersection(ray, segment) {
        // ray: {x:ox,y:oy,dx,dy} parametric p = o + t*dir, t>0
        // segment: {a:{x,y}, b:{x,y}} parametric q = a + u*(b-a), u in [0,1]
        const r_px = ray.x;
        const r_py = ray.y;
        const r_dx = ray.dx;
        const r_dy = ray.dy;
        const s_px = segment.a.x;
        const s_py = segment.a.y;
        const s_dx = segment.b.x - segment.a.x;
        const s_dy = segment.b.y - segment.a.y;

        // Solve: r_px + t*r_dx = s_px + u*s_dx
        const r_mag = Math.hypot(r_dx, r_dy);
        const s_mag = Math.hypot(s_dx, s_dy);
        if (r_dx / r_mag === s_dx / s_mag && r_dy / r_mag === s_dy / s_mag) {
            // parallel
            return null;
        }

        const T2 = (r_dx * (s_py - r_py) + r_dy * (r_px - s_px)) / (s_dx * r_dy - s_dy * r_dx);
        const T1 = (s_px + s_dx * T2 - r_px) / r_dx;

        if (T1 >= 0 && T2 >= 0 && T2 <= 1) {
            return {x: r_px + r_dx * T1, y: r_py + r_dy * T1, param: T1};
        }
        return null;
    }

// Collect unique vertices
    function getUniqueVertices(segments) {
        const m = new Map();
        for (const s of segments) {
            const keyA = `${Math.round(s.a.x)}_${Math.round(s.a.y)}`;
            const keyB = `${Math.round(s.b.x)}_${Math.round(s.b.y)}`;
            if (!m.has(keyA)) m.set(keyA, {x: s.a.x, y: s.a.y});
            if (!m.has(keyB)) m.set(keyB, {x: s.b.x, y: s.b.y});
        }
        return Array.from(m.values());
    }

    const vertices = getUniqueVertices(segments);

// Raycasting / visibility computation
    function computeVisibility(px, py) {
        const eps = 0.0001;
        const points = [];
        for (const v of vertices) {
            const angle = Math.atan2(v.y - py, v.x - px);
            // cast 3 rays to avoid missing edges
            for (const a of [angle - 0.0001, angle, angle + 0.0001]) {
                const dx = Math.cos(a);
                const dy = Math.sin(a);
                const ray = {x: px, y: py, dx, dy};
                let closest = null;
                for (const s of segments) {
                    const hit = getIntersection(ray, s);
                    if (hit) {
                        if (!closest || hit.param < closest.param) closest = hit;
                    }
                }
                if (closest) {
                    closest.angle = a;
                    points.push(closest);
                } else {
                    // no intersection: push a far point
                    points.push({x: px + dx * 2000, y: py + dy * 2000, angle: a, param: 2000});
                }
            }
        }
        // remove duplicates by rounding coordinates
        const uniq = new Map();
        for (const p of points) {
            const key = `${Math.round(p.x)}_${Math.round(p.y)}`;
            if (!uniq.has(key) || p.param < uniq.get(key).param) uniq.set(key, p);
        }
        const finalPoints = Array.from(uniq.values());
        // sort by angle
        finalPoints.sort((a, b) => a.angle - b.angle);
        return finalPoints;
    }

// Controls: move with WASD or click to move
    const speed = 220; // px/s
    let targetPos = null;
    let keys = {};
    window.addEventListener('keydown', e => keys[e.key.toLowerCase()] = true);
    window.addEventListener('keyup', e => keys[e.key.toLowerCase()] = false);
    app.view.addEventListener('pointerdown', (e) => {
        const rect = app.view.getBoundingClientRect();
        const x = (e.clientX - rect.left) * (app.renderer.width / rect.width);
        const y = (e.clientY - rect.top) * (app.renderer.height / rect.height);
        targetPos = {x, y};
    });

// main loop
    let last = performance.now();
    app.ticker.add(() => {
        const now = performance.now();
        const dt = (now - last) / 1000;
        last = now;

        // movement
        let dx = 0, dy = 0;
        if (keys['w'] || keys['arrowup']) dy -= 1;
        if (keys['s'] || keys['arrowdown']) dy += 1;
        if (keys['a'] || keys['arrowleft']) dx -= 1;
        if (keys['d'] || keys['arrowright']) dx += 1;
        if (dx !== 0 || dy !== 0) {
            targetPos = null;
        }

        if (targetPos) {
            const vx = targetPos.x - player.x;
            const vy = targetPos.y - player.y;
            const dist = Math.hypot(vx, vy);
            if (dist > 4) {
                player.x += (vx / dist) * speed * dt;
                player.y += (vy / dist) * speed * dt;
            } else targetPos = null;
        } else {
            if (dx !== 0 || dy !== 0) {
                const len = Math.hypot(dx, dy) || 1;
                player.x += (dx / len) * speed * dt;
                player.y += (dy / len) * speed * dt;
            }
        }

        // keep player inside world borders
        player.x = Math.max(0, Math.min(app.renderer.width, player.x));
        player.y = Math.max(0, Math.min(app.renderer.height, player.y));

        // compute visibility
        const pts = computeVisibility(player.x, player.y);

        // draw direction line
        dirLine.clear();
        dirLine.setStrokeStyle (2, 0xffffff, 0.6);
        dirLine.moveTo(0, 0);
        let mx = 0, my = 0;
        app.stage.on('pointermove', (event) => {
            // event.data.global é a posição do ponteiro
            mx = event.data.global.x;
            my = event.data.global.y;

            dirLine.lineTo(mx - player.x, my - player.y);
        });

        visibility.clear();
        if (pts.length > 0) {
            visibility.moveTo(pts[0].x, pts[0].y);
            for (let i = 1; i < pts.length; i++) visibility.lineTo(pts[i].x, pts[i].y);
            visibility.closePath();
        }
        visibility.fill(0xffffff);

        // redraw darkness full-screen each frame (to ensure proper erasing)
        darkness.clear();
        darkness.rect(0, 0, app.renderer.width, app.renderer.height);
        darkness.fill(0x000000, 0.85);

    });

// handle resize: recompute grid and darkness size
    window.addEventListener('resize', () => {
        grid.clear();
        for (let x = 0; x < app.renderer.width; x += GRID_SIZE) {
            grid.setStrokeStyle(1, 0x333333, 0.6).moveTo(x, 0).lineTo(x, app.renderer.height)
        }
        for (let y = 0; y < app.renderer.height; y += GRID_SIZE) {
            grid.setStrokeStyle(1, 0x333333, 0.6).moveTo(0, y).lineTo(app.renderer.width, y)
        }
    });
}
