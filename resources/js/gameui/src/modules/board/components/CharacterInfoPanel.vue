<template>

  <v-card flat class="bg-panel pa-0 character">
    <v-card-title class="ciano text-h6 d-flex align-center">
      <v-icon class="me-2">mdi-account-details</v-icon>
      Ficha de Personagem
    </v-card-title>
    <v-divider></v-divider>

    <v-card-text class="text-body-2 pt-1 pb-1 pe-2 ps-2 side-panel-card-body">
      <!-- BLOCO 1: INFORMAÇÕES -->
      <v-sheet class="pa-2 mt-2 info-group" rounded="lg" border>
        <div class="info-group-title">
          <v-icon size="16" class="me-1">mdi-information</v-icon>
          Informações
        </div>

        <div class="me-1 ms-1 mb-2">
          <v-row dense>
            <attribute-badge class="v-col v-col-12 py-1" value="José Paulo" label="Jogador" icon="mdi-account"/>
            <attribute-badge class="v-col v-col-12 py-1" value="Artemis Volski" label="Personagem" icon="mdi-sword"/>
            <attribute-badge class="v-col v-col-12 py-1" value="Elfo - Druida - Nv. 7" label="Raça"
                             icon="mdi-unicorn-variant"/>
          </v-row>
        </div>

      </v-sheet>

      <!-- BLOCO 2: ATRIBUTOS -->
      <v-sheet class="pa-2 mt-2 attribute-block info-group" rounded="lg" border>
        <div class="info-group-title">
          <v-icon size="16" class="me-1">mdi-sword-cross</v-icon>
          Atributos
        </div>
        <div class="ma-1">
          <v-row dense>
            <v-col cols="4" class="pe-4 ps-4 pb-1 pt-0">
              <attribute-badge :icon-size="20" value="7" label="Destreza" icon="mdi-run"/>
            </v-col>
            <v-col cols="4" class="pe-4 ps-4 pb-1 pt-0">
              <attribute-badge :icon-size="20" value="5" label="Força" icon="mdi-arm-flex"/>
            </v-col>
            <v-col cols="4" class="pe-4 ps-4 pb-1 pt-0">
              <attribute-badge :icon-size="20" value="6" label="Constituição" icon="mdi-heart"/>
            </v-col>
            <v-col cols="4" class="pe-4 ps-4 pb-0 pt-0">
              <attribute-badge :icon-size="20" value="8" label="Inteligência"
                               icon="mdi-head-snowflake-outline"/>
            </v-col>
            <v-col cols="4" class="pe-4 ps-4 pb-0 pt-0">
              <attribute-badge :icon-size="20" value="4" label="Sabedoria" icon="mdi-school"/>
            </v-col>
            <v-col cols="4" class="pe-4 ps-4 pb-0 pt-0">
              <attribute-badge :icon-size="20" value="3" label="Carisma" icon="mdi-music-note"/>
            </v-col>

          </v-row>
        </div>
        <div class="ma-1 mt-3 mb-3">
          <div class="text-caption">HP</div>
          <v-progress-linear color="red-darken-2" height="6" rounded model-value="80"/>
          <div class="text-caption mt-1">Mana</div>
          <v-progress-linear color="cyan" height="6" rounded model-value="60"/>
        </div>
      </v-sheet>

      <!-- BLOCO 3: HABILIDADES -->
      <v-sheet class="pa-2 mt-2 info-group" rounded="lg" border>
        <div class="info-group-title">
          <v-icon size="16" class="me-1">mdi-lightning-bolt</v-icon>
          Habilidades
        </div>
        <div class="me-1 ms-1 mb-2">
          <div class="d-flex flex-wrap gap-2">
            <div class="attribute-tag highlight mb-1">Forma Selvagem</div>
            <div class="attribute-tag highlight mb-1">Rajada de Vento</div>
            <div class="attribute-tag highlight mb-1">Chamado da Floresta</div>
          </div>
        </div>
      </v-sheet>

      <!-- BLOCO 4: EQUIPAMENTOS -->
      <v-sheet class="pa-2 mt-2 info-group" rounded="lg" border>
        <div class="info-group-title">
          <v-icon size="16" class="me-1">mdi-toolbox</v-icon>
          Equipamentos
        </div>
        <div class="me-1 ms-1 mb-2">
          <div class="d-flex flex-wrap gap-2">
            <div class="attribute-tag highlight mb-1">Bastão Druídico</div>
            <div class="attribute-tag highlight mb-1">Amuleto da Lua</div>
            <div class="attribute-tag highlight mb-1">Poções de Cura (3)</div>
          </div>
        </div>
      </v-sheet>
    </v-card-text>
  </v-card>

</template>

<script setup>

import AttributeBadge from "@/modules/board/components/AttributeBadge.vue";
</script>

<style scoped lang="sass">

</style>
