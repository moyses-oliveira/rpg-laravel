import {Graphics} from "pixi.js";
import AbstractRendering from "./AbstractRendering";
import GfxVision from "../helpers/GfxVision";
import {MAP_WALLS} from "../dynamicAssets/map";

export default class VisionMaskRendering extends AbstractRendering{

    gfxVision;

    constructor(container, gameContainer) {
        super();
        this.gfxVision = new GfxVision(MAP_WALLS, 800, 800);
        this.gfx = new Graphics();
        this.gfx.interactive = false;
        this.gfx.position.set(0, 0);
        this.appendTo(container);
        gameContainer.mask = this.gfx;
    }

    clear() {
      this.gfx.clear();
    }

    draw(x,y) {
        const pts = this.gfxVision.render(x,y);

        if (pts.length) {
            this.gfx.poly(pts);
            this.gfx.fill({ color: 0xffffff, alpha: 1 });
        }
    }


}
