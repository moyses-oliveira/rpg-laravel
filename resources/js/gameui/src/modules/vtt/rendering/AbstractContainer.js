import AbstractRendering from "./AbstractRendering";
import {Container} from "pixi.js";

export default class AbstractContainer extends AbstractRendering {

    constructor(parent) {
        super();
        this.gfx = new Container()
        this.appendTo(parent)
    }

}
