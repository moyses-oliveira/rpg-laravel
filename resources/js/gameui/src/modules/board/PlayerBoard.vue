<template>
  <v-container fluid class="pa-0 player-board">
    <v-row no-gutters style="height: 100%;">

      <v-col cols="3" class="side-panel bg-panel pa-2">
        <main-board-panel :players="players"/>
      </v-col>

      <!-- Centro (Mapa de batalha) -->
      <v-col cols="6" class="d-flex flex-column align-center justify-center">
        <tabletop />
      </v-col>

      <!-- Painel Direito (Jogadores + Dados) -->
      <v-col cols="3" class="side-panel bg-panel pa-2 d-flex flex-column justify-space-between">
        <character-info-panel />
      </v-col>
    </v-row>
  </v-container>

  <player-board-footer />
</template>

<script setup>
import CharacterInfoPanel from "@/modules/board/components/CharacterInfoPanel.vue";
import MainBoardPanel from "@/modules/board/components/MainBoardPanel.vue";
import PlayerBoardFooter from "@/modules/board/components/PlayerBoardFooter.vue";
import Tabletop from "@/modules/board/components/Tabletop.vue";
import PlayerModel from "@/modules/board/models/PlayerModel.js";
import {collection} from "@/modules/board/faker/fakePlayers.js";
import {ref} from "vue";
const players = ref([]);

players.value = collection.map((fakeData)=>new PlayerModel(fakeData))



</script>

<style scoped lang="sass">


</style>
