<template>
  <v-container fluid class="pa-0 player-board">
    <v-row no-gutters style="height: 100%;">

      <v-col cols="3" class="side-panel bg-panel">
        <main-board-panel
          :players="players"
          @move-player="(p)=>movePlayer(p)"
          @view-player="(p)=>viewPlayer(p)"
        />
      </v-col>

      <v-col :cols="!!activePlayer.id ? 6 : 9" class="d-flex flex-column align-center justify-center">
        <vtt-container :players="players"/>
      </v-col>

      <v-col v-if="showSidePanelEnd" cols="3" class="side-panel bg-panel pa-2 d-flex flex-column justify-space-between">
        <v-card flat class="bg-panel pa-0 character">
          <v-card-title class="ciano text-h6 d-flex justify-space-between">
            <div>
              <v-icon class="me-2">{{ sidePanelEndIcon }}</v-icon>
              {{ sidePanelEndTitle }}
            </div>
            <div>
              <v-btn class="close-btn pe-0 ps-0" size="small" @click.prevent="()=>closePanel()">
                <v-icon size="16">mdi-close</v-icon>
              </v-btn>
            </div>
          </v-card-title>
          <v-divider></v-divider>
          <v-card-text class="text-body-2 pt-1 pb-1 pe-2 ps-2 side-panel-card-body">
            <character-info-panel :player="activePlayer" v-if="showCharacterInfo" @close="()=>closeCharacterInfo()"/>
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </v-container>

  <player-board-footer/>
</template>

<script setup>
import CharacterInfoPanel from "@/modules/board/components/CharacterInfoPanel.vue";
import MainBoardPanel from "@/modules/board/components/MainBoardPanel.vue";
import PlayerBoardFooter from "@/modules/board/components/PlayerBoardFooter.vue";
import PlayerModel from "@/modules/board/models/PlayerModel.js";
import {collection} from "@/modules/board/faker/fakePlayers.js";
import {ref} from "vue";
import VttContainer from "@/modules/vtt/VttContainer.vue";
import PixiApplication from "@/modules/vtt/PixiApplication.js";

const players = ref([]);
const showCharacterInfo = ref(false);
const showSidePanelEnd = ref(false);
const sidePanelEndTitle = ref('');
const sidePanelEndIcon = ref('');
const activePlayer = ref(new PlayerModel());
players.value = collection.map((fakeData) => new PlayerModel(fakeData))


function clearMarks(k) {
  players.value.forEach(player => player.clearMarks(k));
}
const viewPlayer = (player) => {
  clearMarks('view');
  activePlayer.value = player;
  showCharacterInfo.value = true;
  showSidePanelEnd.value = true;
  sidePanelEndTitle.value = player.name;
  sidePanelEndIcon.value = 'mdi-account-details';
  player.marks.view = true
};

const closeCharacterInfo = () => {
  console.log('closeCharacterInfo')
  clearMarks('view');
  showCharacterInfo.value=false
}

const movePlayer = (player) => {
  clearMarks('view');
  PixiApplication.selectPlayerById(player.id);
  player.marks.move = true
}

function closePanel() {
  clearMarks('view');
  activePlayer.value = new PlayerModel();
  showCharacterInfo.value = false;
  showSidePanelEnd.value = false;
}

</script>

<style scoped lang="sass">


</style>
