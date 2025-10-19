<template>

  <v-card flat class="bg-panel pa-3">
    <v-card-title class="ciano text-h6 d-flex align-center">
      <v-icon class="me-2">mdi-account-details</v-icon>
      Ficha de Personagem
    </v-card-title>
    <v-divider></v-divider>

    <v-card-text class="text-body-2 pa-0">
      <!-- BLOCO 1: INFORMAÇÕES -->
      <v-sheet class="pa-2 mt-2" color="#0d141b" rounded="lg" border>
        <div class="text-caption ciano mb-1 d-flex align-center">
          <v-icon size="16" class="me-1">mdi-information</v-icon>Informações
        </div>

        <v-row dense>
          <attribute-badge class="v-col v-col-12 py-1" value="José Paulo" label="Jogador" icon="mdi-account"/>
          <attribute-badge class="v-col v-col-12 py-1" value="Artemis Volski" label="Personagem" icon="mdi-sword"/>
          <attribute-badge class="v-col v-col-12 py-1" value="Elfo - Druida - Nv. 7" label="Raça" icon="mdi-unicorn-variant"/>
        </v-row>

      </v-sheet>

      <!-- BLOCO 2: ATRIBUTOS -->
      <v-sheet class="pa-2 mt-2 attribute-block" color="#0d141b" rounded="lg" border>
        <div class="text-caption ciano mb-1 d-flex align-center">
          <v-icon size="16" class="me-1">mdi-sword-cross</v-icon>Atributos
        </div>
        <v-row dense>
          <attribute-badge class="v-col v-col-4 py-1" subclass="justified" value="7" label="Destreza" icon="mdi-run"/>
          <attribute-badge class="v-col v-col-4 py-1" subclass="justified" value="5" label="Força" icon="mdi-arm-flex"/>
          <attribute-badge class="v-col v-col-4 py-1" subclass="justified" value="6" label="Constituição" icon="mdi-heart"/>
          <attribute-badge class="v-col v-col-4 py-1" subclass="justified" value="8" label="Inteligência" icon="mdi-head-snowflake-outline"/>
          <attribute-badge class="v-col v-col-4 py-1" subclass="justified" value="4" label="Sabedoria" icon="mdi-school"/>
          <attribute-badge class="v-col v-col-4 py-1" subclass="justified" value="3" label="Carisma" icon="mdi-music-note"/>
        </v-row>
        <div class="mt-2">
          <div class="text-caption">HP</div>
          <v-progress-linear color="red-darken-2" height="6" rounded model-value="80" />
          <div class="text-caption mt-1">Mana</div>
          <v-progress-linear color="cyan" height="6" rounded model-value="60" />
        </div>
      </v-sheet>

      <!-- BLOCO 3: HABILIDADES -->
      <v-sheet class="pa-2 mt-2" color="#0d141b" rounded="lg" border>
        <div class="text-caption ciano mb-1 d-flex align-center">
          <v-icon size="16" class="me-1">mdi-lightning-bolt</v-icon>Habilidades
        </div>
        <div class="d-flex flex-wrap gap-2">
          <div class="attribute-tag">Forma Selvagem</div>
          <div class="attribute-tag">Rajada de Vento</div>
          <div class="attribute-tag">Chamado da Floresta</div>
        </div>
      </v-sheet>

      <!-- BLOCO 4: EQUIPAMENTOS -->
      <v-sheet class="pa-2 mt-2" color="#0d141b" rounded="lg" border>
        <div class="text-caption ciano mb-1 d-flex align-center">
          <v-icon size="16" class="me-1">mdi-backpack</v-icon>Equipamentos
        </div>
        <div class="d-flex flex-wrap gap-2">
          <div class="attribute-tag">Bastão Druídico</div>
          <div class="attribute-tag">Amuleto da Lua</div>
          <div class="attribute-tag">Poções de Cura (3)</div>
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
