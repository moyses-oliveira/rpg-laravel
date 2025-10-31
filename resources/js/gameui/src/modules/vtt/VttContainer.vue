<template>
  <div style="overflow: auto;height: calc(100vh - 120px)">
    <div ref="container">

    </div>
  </div>
</template>

<script setup>
import * as PIXI from "pixi.js";
import PixiApplication from "./PixiApplication";
import {ref, onMounted} from 'vue';

const container = ref(null);

const app = new PIXI.Application();
const options = {
  width: 800,
  height: 800,
  backgroundColor: 0x000000
};
const props = defineProps({
  players: {
    type: Array,
    required: true,
  },
});

onMounted(() => {

  if (!container.value)
    return;


  app.init()
    .then(() => {
      container.value.appendChild(app.canvas);
      PixiApplication.init(app, props.players)
    })

});

</script>


<style scoped lang="sass">

</style>
