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
      this.players.push(new PlayerRendering(pos.x, pos.y, this.playersModel[i].avatar, i));
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
    const sx = 1000;
    const sy = 150;
    let position = [];
    for(let x=sx;x<=(sx+100);x+=50)
      for(let y=sy;y<=(sy + 100);y+=50)
        position.push({x,y});

    return position[i];
  }
}
