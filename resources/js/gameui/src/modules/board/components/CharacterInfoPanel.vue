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
            <attribute-badge class="v-col v-col-12 py-1" :value="player.name" label="Personagem" icon="mdi-sword"/>
            <attribute-badge class="v-col v-col-12 py-1" :value="rcl" label="Raça"
                             icon="mdi-unicorn-variant"/>
            <attribute-badge class="v-col v-col-12 py-1 opacity-70" :value="player.user.name" label="Jogador" icon="mdi-account"/>
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
              <attribute-badge :icon-size="20" :value="player.attributes.dexterity" label="Destreza" icon="mdi-run"/>
            </v-col>
            <v-col cols="4" class="pe-4 ps-4 pb-1 pt-0">
              <attribute-badge :icon-size="20" :value="player.attributes.strength" label="Força" icon="mdi-arm-flex"/>
            </v-col>
            <v-col cols="4" class="pe-4 ps-4 pb-1 pt-0">
              <attribute-badge :icon-size="20" :value="player.attributes.constitution" label="Constituição" icon="mdi-heart"/>
            </v-col>
            <v-col cols="4" class="pe-4 ps-4 pb-0 pt-0">
              <attribute-badge :icon-size="20" :value="player.attributes.intelligence" label="Inteligência"
                               icon="mdi-head-snowflake-outline"/>
            </v-col>
            <v-col cols="4" class="pe-4 ps-4 pb-0 pt-0">
              <attribute-badge :icon-size="20" :value="player.attributes.wisdom" label="Sabedoria" icon="mdi-school"/>
            </v-col>
            <v-col cols="4" class="pe-4 ps-4 pb-0 pt-0">
              <attribute-badge :icon-size="20" :value="player.attributes.charisma" label="Carisma" icon="mdi-music-note"/>
            </v-col>

          </v-row>
        </div>
        <div class="ma-1 mt-3 mb-3">
          <div class="text-caption">HP</div>
          <v-progress-linear color="red-darken-2" height="6" rounded :model-value="player.hp"/>
          <div class="text-caption mt-1">Mana</div>
          <v-progress-linear color="cyan" height="6" rounded :model-value="player.mana"/>
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
            <div class="attribute-tag highlight mb-1" v-for="skill in player.skills">
              {{ skill }}
            </div>
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
            <div class="attribute-tag highlight mb-1" v-for="equip in player.equipments">
              {{ equip }}
            </div>
          </div>
        </div>
      </v-sheet>
    </v-card-text>
  </v-card>

</template>

<script setup>
import AttributeBadge from "@/modules/board/components/AttributeBadge.vue";
import PlayerModel from "@/modules/board/models/PlayerModel.js";
import {computed} from "vue";

const props = defineProps({
  player: {
    type: PlayerModel,
    required: true
  }
});
const rcl = computed(() => {
  if(!props.player.race)
    return "Unknown";
  const p = props.player;
  return ([p.race, p.cls, `Nvl. ${p.level}`]).join(' - ');
});
</script>

<style scoped lang="sass">

</style>
