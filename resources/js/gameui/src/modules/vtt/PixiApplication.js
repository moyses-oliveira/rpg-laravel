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
    static init(app) {

        this.debug = new Container();
        this.game = new GameContainer(app.stage);
        this.game.render();
        this.walls = new WallsContainer(app.stage);
        this.walls.render();
        KeyTriggers.init();
        app.ticker.add(() => {
            this.game.player.render(KeyTriggers.keys)
        });
    }
}
