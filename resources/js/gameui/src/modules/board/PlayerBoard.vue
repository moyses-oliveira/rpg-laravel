<template>
  <v-container fluid class="pa-0" style="height: calc(100vh - 100px);">
    <v-row no-gutters style="height: 100%;">

      <v-col cols="3" class="bg-panel pa-2">
        <character-info-panel />
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
        <!-- Jogadores -->
        <div>
          <v-card
            v-for="player in players"
            :key="player.name"
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
        </div>

        <!-- Dados -->
        <div class="dados mt-2">
          <div v-for="d in ['D4','D6','D8','D10','D12','D20']" :key="d" class="dado">
            {{ d }}
          </div>
        </div>
      </v-col>
    </v-row>
  </v-container>
</template>

<script setup>

import CharacterInfoPanel from "@/modules/board/components/CharacterInfoPanel.vue";
</script>

<style scoped lang="sass">

</style>
