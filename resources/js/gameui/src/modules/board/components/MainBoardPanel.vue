<template>
  <v-card flat class="bg-panel pa-3 character">
    <v-card-title class="ciano text-h6 d-flex align-center">
      <v-icon class="me-2">mdi-account-details</v-icon>
      Jogadores
    </v-card-title>
    <v-divider></v-divider>

    <v-card-text class="text-body-2 pa-0 mt-3 side-panel-card-body">
      <!-- Jogadores -->
      <div v-for="player in players" :key="player.id" class="jogador">
        <character-summary :player="player" @view="()=>viewPlayer(player)" />
      </div>

    </v-card-text>
  </v-card>
</template>

<script setup>
import PlayerModel from "@/modules/board/models/PlayerModel.js";
import CharacterSummary from "@/modules/board/components/CharacterSummary.vue";
import {defineEmits} from 'vue'

const emit = defineEmits(['view-player'])

function viewPlayer(player) {
  emit("view-player", player);
}

defineProps({
  players: {
    type: Array,
    required: true,
  },
});
</script>
<style scoped lang="sass">

</style>
