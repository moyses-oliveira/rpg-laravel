import { Application } from "pixi.js";
import PixiApplication from "./PixiApplication";
const BUNNY_URL = 'https://pixijs.io/examples/examples/assets/bunny.png';
const app = new Application();



async function init() {
    const canvasWrapper = document.getElementById('canvas-wrapper');
    const options = {
        width: 800,
        height: 800,
        backgroundColor: 0x000000
    };
    await app.init(options);
    canvasWrapper.appendChild(app.canvas);
    PixiApplication.init(app)
}
init();
