<template>
  <v-card
    flat
    class="mb-2 pa-2 bg-panel"
  >
    <v-row align="center">
      <v-col cols="3">
        <v-avatar size="48">
          <img :src="player.avatar" alt="avatar" />
        </v-avatar>
      </v-col>
      <v-col cols="9">
        <div class="text-body-2 ciano">{{ player.name }}</div>
        <div class="hp-bar" :style="{ width: player.hp + '%' }"></div>
        <div class="mana-bar mt-1" :style="{ width: player.mana + '%' }"></div>
      </v-col>
    </v-row>
  </v-card>
</template>


<script setup>
  import PlayerModel from '@/modules/board/models/PlayerModel';

  const props = defineProps({
    player: {
      type: PlayerModel,
      required: true
    }
  });


</script>


<style scoped lang="sass">

</style>
