import AbstractRendering from "./AbstractRendering";
import {Assets, Graphics, Sprite} from "pixi.js";
import Physics from "../helpers/Physics";
import {MAP_WALLS} from "../dynamicAssets/map";


export default class PlayerRendering extends AbstractRendering {

  radius = 10;
  speed = 2
  px = 0;
  py = 0;

  constructor(x, y, img) {
    super();
    this.gfx = new Graphics();

    const disk = new Graphics();
    disk.circle(0, 0, this.radius);
    disk.fill({color: 0x00ff99});
    this.gfx.addChild(disk);

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
  }

  render(keys) {
    let nx = this.gfx.x;
    let ny = this.gfx.y;
    if (keys['w'] || keys['ArrowUp']) ny -= this.speed;
    if (keys['s'] || keys['ArrowDown']) ny += this.speed;
    if (keys['a'] || keys['ArrowLeft']) nx -= this.speed;
    if (keys['d'] || keys['ArrowRight']) nx += this.speed;

    if (!Physics.colisions(nx, ny, MAP_WALLS, this.radius)) {
      this.setPos(nx, ny)
    }
  }

  setPos(x, y) {
    this.gfx.x = x;
    this.gfx.y = y;
    this.px = x;
    this.py = y;
  }


}
