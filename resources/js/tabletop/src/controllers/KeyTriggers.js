export default class KeyTriggers {

    static keys = {};
    static init() {

        window.addEventListener('keydown', (e) => (this.keys[e.key] = true));
        window.addEventListener('keyup', (e) => (this.keys[e.key] = false));

    }

}
