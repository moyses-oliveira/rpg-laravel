
import MapContainer from "./MapContainer";
import AbstractContainer from "./AbstractContainer";
import VisionMaskRendering from "./VisionMaskRendering";
import PlayerRendering from "./PlayerRendering";

export default class GameContainer extends AbstractContainer{

    map
    mask
    player
    constructor(parent) {
        super(parent);
        this.map = new MapContainer(this.gfx)
    }

    render() {
        this.map.render();
        this.mask = new VisionMaskRendering(this.parent, this.gfx)
        this.player = new PlayerRendering(this.parent, this.mask)
    }
}
