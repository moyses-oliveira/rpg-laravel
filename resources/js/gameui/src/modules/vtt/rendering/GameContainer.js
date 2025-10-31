import MapContainer from "./MapContainer";
import AbstractContainer from "./AbstractContainer";
import VisionMaskRendering from "./VisionMaskRendering";
import PlayerRendering from "./PlayerRendering";

export default class GameContainer extends AbstractContainer {

  map
  mask
  players = []
  playersModel = []
  totalPlayers = 0


  constructor(parent, playersModel) {
    super(parent);
    this.playersModel = playersModel
    this.map = new MapContainer(this.gfx)
    this.totalPlayers = this.playersModel.length;
    for (let i = 0; i < this.totalPlayers; i++) {
      const pos = this.randomPos(i);
      this.players.push(new PlayerRendering(pos.x, pos.y, this.playersModel[i].avatar));
    }
  }

  render() {
    this.map.render();
    this.mask = new VisionMaskRendering(this.parent, this.gfx)
    this.players.forEach(p => p.appendTo(this.parent))
    //   const p = ;
    //   p.appendTo(this.parent)
    //   [i] = (p);
    // }
    // this.players =  [
    //   new PlayerRendering(this.parent, 60, 100)
    // ];
  }

  randomPos(i) {
    let position = [];
    for(let x=40;x<=100;x+=20)
      for(let y=40;y<=100;y+=20)
        position.push({x,y});

    return position[i];
  }
}
