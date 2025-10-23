export default class Physics {
    static colisions(x, y, walls, radius) {
        for (const w of walls) {
            const closestX = Math.max(w.x, Math.min(x, w.x + w.w));
            const closestY = Math.max(w.y, Math.min(y, w.y + w.h));
            const dx = x - closestX;
            const dy = y - closestY;
            if (dx * dx + dy * dy < radius * radius) {
                return true;
            }
        }
        return false;
    }
}
