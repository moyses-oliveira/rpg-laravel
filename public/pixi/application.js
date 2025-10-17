window.addEventListener('DOMContentLoaded', () => {
    const canvasWrapper = document.getElementById('canvas-wrapper');

const app = new PIXI.Application({
    // resizeTo: canvasWrapper,
    backgroundColor: 0x2b2b2b,
    antialias: true,
});
console.log(app)
    document.body.appendChild(app.canvas);

    return;
document.getElementById('canvas-wrapper').appendChild(app.view);

});
