export default class GfxVision {

    points = [];
    walls = [];
    radius = 200;
    rays = 180;

    constructor(walls, radius = 200, rays = 180) {
        this.walls = walls;
        this.radius = radius;
        this.rays = rays;
    }

    render(px, py) {
        this.points = [];
        // Para cada raio, andamos em passos discretos até radius ou até colidir com uma parede
        for (let i = 0; i < this.rays; i++)
            this.appendPoint(px, py, i);

        return this.points;
    }

    appendPoint(px, py, i) {
        const angle = (i / this.rays) * Math.PI * 2;
        const dx = Math.cos(angle);
        const dy = Math.sin(angle);

        let hitX = px + dx * this.radius;
        let hitY = py + dy * this.radius;

        for (let d = 0; d <= this.radius; d += 1) {
            const rx = px + dx * d;
            const ry = py + dy * d;
            if (this.hasCollisionOnMove(rx, ry)) {
                this.points.push({x: rx, y: ry});
                return;
            }
        }

        this.points.push({x: hitX, y: hitY});
    }

    hasCollisionOnMove(rx, ry) {
        for (const w of this.walls) {
            if (this.checkWallCollision(rx, ry, w)) {
                return true;
            }
        }
        return false;
    }

    checkWallCollision(rx, ry, w) {
        return rx >= w.x && rx <= w.x + w.w && ry >= w.y && ry <= w.y + w.h;
    }
}
