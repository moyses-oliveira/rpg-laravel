<template>
  <v-container fluid class="pa-0 player-board">
    <v-row no-gutters style="height: 100%;">

      <v-col cols="3" class="bg-panel pa-2">
        <left-board-panel/>
      </v-col>

      <!-- Centro (Mapa de batalha) -->
      <v-col cols="6" class="d-flex flex-column align-center justify-center">
        <v-sheet
          height="100%"
          width="100%"
          class="d-flex align-center justify-center bg-panel"
          style="border: 1px solid #00ffff33;"
        >
          <div class="text-center">
            <v-icon size="60" class="ciano mb-2">mdi-map</v-icon>
            <div class="text-caption ciano">Mapa de Batalha</div>
            <v-btn class="mt-3" color="cyan-darken-2" variant="tonal">
              Alternar Grid
            </v-btn>
          </div>
        </v-sheet>
      </v-col>

      <!-- Painel Direito (Jogadores + Dados) -->
      <v-col cols="3" class="bg-panel pa-2 d-flex flex-column justify-space-between">
        <character-info-panel />
      </v-col>
    </v-row>
  </v-container>

  <v-footer
    color="#0f1822"
    app
    class="d-flex justify-center"
    height="60"
  >
    <v-btn icon color="cyan" variant="text"><v-icon>mdi-sword</v-icon></v-btn>
    <v-btn icon color="cyan" variant="text"><v-icon>mdi-shield</v-icon></v-btn>
    <v-btn icon color="cyan" variant="text"><v-icon>mdi-lightning-bolt</v-icon></v-btn>
    <v-btn icon color="cyan" variant="text"><v-icon>mdi-chat</v-icon></v-btn>
    <v-btn icon color="cyan" variant="text"><v-icon>mdi-dice-multiple</v-icon></v-btn>
  </v-footer>
</template>

<script setup>
import CharacterInfoPanel from "@/modules/board/components/CharacterInfoPanel.vue";
import LeftBoardPanel from "@/modules/board/components/LeftBoardPanel.vue";

</script>

<style scoped lang="sass">

</style>
