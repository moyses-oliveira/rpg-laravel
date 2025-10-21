<template>
  <v-card
    flat
    class="mb-2 pa-2 info-group character-summary"
  >
    <v-row align="center" dense>
      <v-col cols="4" class="text-center">
        <div>
          <v-avatar size="48">
            <img :src="player.avatar" alt="avatar"/>
          </v-avatar>
        </div>

      </v-col>
      <v-col cols="8">
        <v-row dense class="mt-0 mb-0">
          <v-col>
            <div class="ciano inline-text">{{ player.name }}</div>
          </v-col>
          <v-col class="text-end text-lime-lighten-4 inline-text">{{ player.race }} / {{ player.cls }}</v-col>
        </v-row>
        <v-row dense>
          <v-col>
            <div class="hp-bar">
              <span :style="{ width: player.hp + '%' }"></span>
            </div>
          </v-col>
          <v-col>
            <div class="mana-bar">
              <span :style="{ width: player.mana + '%' }"></span>
            </div>
          </v-col>
        </v-row>
        <div class="mt-3 mb-0">
          <div class="character-user-info" style="height: 26px;">
            <div class="d-flex justify-space-between opacity-20 mt-2 mb-0">
              <div class="text-start">Nvl. {{ player.level }}</div>
              <div class="d-flex justify-start bg-white ps-3 rounded-lg">
                <span><v-icon class="mr-1" size="16">mdi-account</v-icon></span>
                <div class="inline-text">
                  {{ player.user.name }}
                </div>
              </div>
            </div>
          </div>
          <div class="character-actions text-end mt-1 mb-0">
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
