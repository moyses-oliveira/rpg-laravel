import {Graphics, Container} from 'pixi.js';

import VisionMaskRendering from "./rendering/VisionMaskRendering";
import PlayerRendering from "./rendering/PlayerRendering";
import KeyTriggers from "./controllers/KeyTriggers";
import WallsContainer from "./rendering/WallsContainer";
import GameContainer from "./rendering/GameContainer";

export default class PixiApplication {

  static debug
  static game
  static walls
  static selectedPlayer = null
  static playersModel =[]

  static init(app, playersModel = []) {


    this.playersModel = playersModel;
    this.debug = new Container();
    this.game = new GameContainer(app.stage, playersModel);
    this.game.render();
    this.walls = new WallsContainer(app.stage);
    this.walls.render();
    // this.selectedPlayer = this.game.players[0];
    KeyTriggers.init();
    app.ticker.add(() => {
      const p = this.selectedPlayer;
      this.game.mask.clear()
      this.game.players.forEach(p => this.game.mask.draw(p.px, p.py))
      if(!(p instanceof PlayerRendering))
        return;

      p.render(KeyTriggers.keys)
    });
  }
}
