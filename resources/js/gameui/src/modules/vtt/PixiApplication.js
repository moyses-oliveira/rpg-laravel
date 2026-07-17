import {Graphics, Container} from 'pixi.js';
import PlayerRendering from "./rendering/PlayerRendering";
import KeyTriggers from "./controllers/KeyTriggers";
import GameContainer from "./rendering/GameContainer";


export default class PixiApplication {

  static app
  static debug
  static game
  static selectedPlayer = null
  static playersModel = []

  static init(app, playersModel = []) {
    window.vtt = this;
    window.eng = app;
    window.rr = () => this.rerender();
    this.app = app
    this.playersModel = playersModel;
    this.debug = new Container();
    this.game = new GameContainer(app.stage, playersModel);
    this.game.render();
    //this.walls = new WallsContainer(app.stage);
    //this.walls.render();
    this.selectPlayer(0);
    // KeyTriggers.init();

    window.addEventListener('keydown', (e) => this.eventKey(e, true));
    window.addEventListener('keyup', (e) => this.eventKey(e, false));

    setTimeout(()=>this.rerender(), parseInt(200))
  }

  static eventKey(e, press) {
    this.selectedPlayer.action(e.key, press)
    this.rerender();
  }

  static rerender() {
    const p = this.selectedPlayer;
    const app = this.app;
    this.game.mask.clear()
    this.game.players.forEach(p => this.game.mask.draw(p.px, p.py))
    if (!(p instanceof PlayerRendering))
      return;

    // p.render(KeyTriggers.keys)
    const screenWidth = app.renderer.width;
    const screenHeight = app.renderer.height;
    const centerX = screenWidth / 2;
    const centerY = screenHeight / 2;

    app.stage.x = centerX - p.px;
    app.stage.y = centerY - p.py
  }

  static selectPlayer(i) {
    if (this.selectedPlayer) {
      this.selectedPlayer.strokeToken(0x000000);
    }
    this.selectedPlayer = this.game.players[i];
    this.selectedPlayer.strokeToken(0x00ffff);

    this.playersModel.forEach((p) => p.marks.move = false);
    this.playersModel[i].marks.move = true;
    this.rerender();
  }

  static selectPlayerById(i) {
    const playerIndex = this.playersModel.findIndex(p => p.id == i);
    this.selectPlayer(playerIndex);
  }

}
