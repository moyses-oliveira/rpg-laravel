export default class AbstractRendering {

    gfx;
    parent;

    appendTo(parent) {
        this.parent = parent;
        parent.addChild(this.gfx);
    }
}
