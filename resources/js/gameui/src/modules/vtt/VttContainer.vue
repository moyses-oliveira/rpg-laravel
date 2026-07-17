<template>
  <div style="overflow: auto;height: calc(100vh - 80px);width: 100%;">
    <div ref="container" style="width: 100%;height: 100%;">

    </div>
  </div>
</template>

<script setup>
import * as PIXI from "pixi.js";
import PixiApplication from "./PixiApplication";
import {ref, onMounted} from 'vue';

const container = ref(null);

const props = defineProps({
  players: {
    type: Array,
    required: true,
  },
});

onMounted(() => {

  const containerWidth = container.value?.clientWidth || 0;
  const containerHeight = container.value?.clientHeight || 0;


  console.log(`Container Width: ${containerWidth}, Container Height: ${containerHeight}`);
  const app = new PIXI.Application();
  const options = {
    width: containerWidth - 20,
    height: containerHeight - 20,
    backgroundColor: 0x000000
  };

  if (!container.value)
    return;


  app.init(options)
    .then(() => {
      container.value.appendChild(app.canvas);
      PixiApplication.init(app, props.players)
    })

});

</script>


<style scoped lang="sass">

</style>
