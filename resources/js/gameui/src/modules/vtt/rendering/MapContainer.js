import {Assets, Container, Graphics, Sprite} from "pixi.js";
import {MAP_WALLS} from "../dynamicAssets/map";
import AbstractContainer from "./AbstractContainer";

export default class MapContainer extends AbstractContainer {


    render() {
        for (const w of MAP_WALLS) {
            const g = new Graphics();
            g.rect(w.x, w.y, w.w, w.h);
            g.fill({color: 0x000000, alpha: 0.0});
            this.gfx.addChild(g);
        }
        const map = '/img/scenario.webp'
        Assets.load(map).then((texture) => {
          const sprite = new Sprite(texture);
          sprite.width = 1596;
          sprite.height = 912;
          this.gfx.addChild(sprite);
        });
        const texture = new Graphics();
        texture.rect(0, 0, 800, 800);
        texture.fill({color: 0xFFFFFF, alpha: 1});
        this.gfx.addChild(texture);

        const random = new Graphics();
        random.rect(200, 200, 200, 200);
        random.fill({color: 0x000000, alpha: 1});
        this.gfx.addChild(random);
    }
}
