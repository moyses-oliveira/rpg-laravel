import AbstractRendering from "./AbstractRendering";
import {Graphics} from "pixi.js";
import Physics from "../helpers/Physics";
import {MAP_WALLS} from "../dynamicAssets/map";
import VisionMaskRendering from "./VisionMaskRendering";

export default class PlayerRendering extends AbstractRendering {

    radius = 10;
    speed = 2
    mask;
    constructor(container, mask) {
        super();

        this.mask = mask
        this.gfx = new Graphics();
        this.gfx.circle(0, 0, this.radius);
        this.gfx.fill({color: 0x00ff99});

        this.gfx.x = 120;
        this.gfx.y = 120;
        this.appendTo(container);
    }

    render(keys) {
        let nx = this.gfx.x;
        let ny = this.gfx.y;
        if (keys['w'] || keys['ArrowUp']) ny -= this.speed;
        if (keys['s'] || keys['ArrowDown']) ny += this.speed;
        if (keys['a'] || keys['ArrowLeft']) nx -= this.speed;
        if (keys['d'] || keys['ArrowRight']) nx += this.speed;

        if (!Physics.colisions(nx, ny, MAP_WALLS, this.radius)) {
            this.gfx.x = nx;
            this.gfx.y = ny;
        }
        this.mask.render(this.gfx.x, this.gfx.y);
    }


}
