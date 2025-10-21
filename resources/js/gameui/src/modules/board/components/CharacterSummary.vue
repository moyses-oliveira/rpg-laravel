<template>
  <v-card
    flat
    class="mb-2 pa-2 info-group"
  >
    <v-row align="center" dense>
      <v-col cols="4" class="text-center">
        <div >
        <v-avatar size="48">
          <img :src="player.avatar" alt="avatar"/>
        </v-avatar>
        </div>

      </v-col>
      <v-col cols="8">
        <div class="opacity-20 ">
          <v-row>
            <v-col cols="8" class="justify-space-between">
              <div class="d-flex justify-start bg-white ps-3 rounded-lg">
                <span><v-icon class="mr-1" size="16">mdi-account</v-icon></span>
                <div style="max-width: 16ch; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                  {{ player.user.name }}
                </div>
              </div>
            </v-col>
            <v-col cols="4">
              <div class="text-end">Nvl. {{ player.level }}</div>
            </v-col>

          </v-row>
        </div>
        <v-row dense>
          <v-col>
            <div class="hp-bar mt-2">
              <span :style="{ width: player.hp + '%' }"></span>
            </div>
          </v-col>
          <v-col>
            <div class="mana-bar mt-2">
              <span :style="{ width: player.mana + '%' }"></span>
            </div>
          </v-col>
        </v-row>
        <div class="text-lime-lighten-4 mt-2 d-flex justify-space-between">
          <div>{{ player.race }} / {{ player.cls }}</div>
        </div>

      </v-col>
    </v-row>
    <hr class="opacity-20 mt-1 mb-2"/>
    <v-row>
      <v-col cols="6">
        <div class="ciano">
          {{ player.name }}
        </div>
      </v-col>
      <v-col cols="6">
        <div class="text-end character-actions">
          <v-btn-group size="x-small" style="height: 26px;">
            <v-btn size="x-small" variant="elevated">
              <v-icon size="16" left>mdi-eye</v-icon>
            </v-btn>
            <v-btn size="x-small" variant="elevated">
              <v-icon size="16" left>mdi-volume-high</v-icon>
            </v-btn>
            <v-btn size="x-small" variant="elevated">
              <v-icon size="16" left>mdi-cancel</v-icon>
            </v-btn>
            <v-btn size="x-small" variant="elevated">
              <v-icon size="16" left>mdi-chat</v-icon>
            </v-btn>
          </v-btn-group>
        </div>
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
