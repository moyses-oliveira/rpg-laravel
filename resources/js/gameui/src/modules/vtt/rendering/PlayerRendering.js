import AbstractRendering from "./AbstractRendering";
import {Assets, Container, Graphics, Sprite} from "pixi.js";
import Physics from "../helpers/Physics";
import {MAP_WALLS} from "../dynamicAssets/map";
import PixiApplication from "@/modules/vtt/PixiApplication.js";


export default class PlayerRendering extends AbstractRendering {

  radius = 20;
  speed = 2
  px = 0;
  py = 0;
  token = null;

  constructor(x, y, img, key) {
    super();
    this.gfx = new Container();
    this.gfx.eventMode = 'static';

    this.token = new Graphics();
    this.token.circle(0, 0, this.radius);
    this.token.stroke({ width: 4, color: 0x000000 });
    this.gfx.addChild(this.token);

    Assets.load(img).then((texture) => {
      const sprite = new Sprite(texture);
      sprite.anchor.set(0.5);
      sprite.width = this.radius * 2;
      sprite.height = this.radius * 2;
      const mask = new Graphics();
      mask.circle(0, 0, this.radius);
      mask.fill();
      sprite.mask = mask;
      this.gfx.addChild(sprite);
      this.gfx.addChild(mask);
    });
    this.setPos(x, y)

    this.gfx.on('pointertap', () => {
      PixiApplication.selectPlayer(key);
    });
  }

  strokeToken(strokeColor) {
    this.token.clear();
    this.token.circle(0, 0, 20);
    this.token.stroke({width: 4, color: strokeColor});
  }

  render(keys) {
    const vtt = window.vtt;
    let nx = this.gfx.x;
    let ny = this.gfx.y;
    if (keys['w'] || keys['ArrowUp']) ny -= this.speed;
    if (keys['s'] || keys['ArrowDown']) ny += this.speed;
    if (keys['a'] || keys['ArrowLeft']) nx -= this.speed;
    if (keys['d'] || keys['ArrowRight']) nx += this.speed;

    if (!vtt.game.map.isTransparentAt(nx, ny)) {
      this.setPos(nx, ny)
    }
    //
    // if (!Physics.colisions(nx, ny, MAP_WALLS, this.radius)) {
    // }
  }

  setPos(x, y) {
    this.gfx.x = x;
    this.gfx.y = y;
    this.px = x;
    this.py = y;
  }


}
