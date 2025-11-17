import {Assets, Container, Graphics, Rectangle, Sprite} from "pixi.js";
import {MAP_WALLS} from "../dynamicAssets/map";
import AbstractContainer from "./AbstractContainer";

export default class MapContainer extends AbstractContainer {

  sprite = null
  w
  h
  hitmap
  hitmapCanvas
  offscreen

  render() {
    this.w = 1586
    this.h = 914
    const map = '/img/scenario04.webp'
    Assets.load(map).then((t) => this.putSprite(t));
    const texture = new Graphics();
    texture.rect(0, 0, this.w, this.h);
    texture.fill({color: 0xFFFFFF, alpha: 1});
    this.gfx.addChild(texture);

    const random = new Graphics();
    random.rect(200, 200, 200, 200);
    random.fill({color: 0x000000, alpha: 1});
    this.gfx.addChild(random);
  }

  async putSprite(texture) {

    this.sprite = new Sprite(texture);
    this.sprite.width = this.w;
    this.sprite.height = this.h;
    this.gfx.addChild(this.sprite);

    const renderer = window.pixiApp.renderer;

    // force canvas output
    const canvas = await renderer.extract.canvas(this.sprite, {
      scale: 1,
      resolution: 1
    });

    this.hitmapCanvas = canvas.getContext("2d");
    this.hitmap = canvas.getContext("2d");

  }

  isTransparentAt(globalX, globalY) {
    if (!this.sprite)
      return true;

    // const local = this.sprite.toLocal({ x: globalX, y: globalY });
    const local = {x: globalX, y: globalY};
    if (
      local.x < 0 || local.y < 0 ||
      local.x >= this.hitmapCanvas.width ||
      local.y >= this.hitmapCanvas.height
    ) {
      return true;
    }

    const pixel = this.hitmap.getImageData(local.x, local.y, 1, 1).data;
    return pixel[3] === 0;
  }
}
