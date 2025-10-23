import AbstractContainer from "./AbstractContainer";
import {Container, Graphics} from "pixi.js";
import {MAP_WALLS} from "../dynamicAssets/map";

export default class WallsContainer extends AbstractContainer {


    render() {
        for (const w of MAP_WALLS) {
            const outline = new Graphics()
                .rect(w.x, w.y, w.w, w.h)
                .stroke({color: 0x666666, width: 2, alpha: 0.9});
            this.gfx.addChild(outline);
        }
    }
}
