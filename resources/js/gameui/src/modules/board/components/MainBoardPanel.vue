<template>
  <v-card flat class="bg-panel pa-3 character">
    <v-card-title class="ciano text-h6 d-flex align-center">
      <v-icon class="me-2">mdi-account-details</v-icon>
      Jogadores
    </v-card-title>
    <v-divider></v-divider>

    <v-card-text class="text-body-2 pa-0 side-panel-card-body">
      <!-- Jogadores -->
      <div v-for="player in players" :key="player.id" class="jogador">
        <character-summary :player="player" />
      </div>

      <!-- Dados -->
      <div class="dados mt-2">
        <div v-for="d in ['D4','D6','D8','D10','D12','D20']" :key="d" class="dado">
          {{ d }}
        </div>
      </div>
    </v-card-text>
  </v-card>
</template>

<script setup>
import PlayerModel from "@/modules/board/models/PlayerModel.js";
import CharacterSummary from "@/modules/board/components/CharacterSummary.vue";
function makeid(length) {
  var result           = '';
  var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
  var charactersLength = characters.length;
  for ( var i = 0; i < length; i++ ) {
    result += characters.charAt(Math.floor(Math.random() * charactersLength));
  }
  return result;
}
function fakePlayer(props) {
  const p = new PlayerModel();
  p.id = makeid(8);
  p.name = props.name;
  p.avatar = props.avatar;
  p.hp = props.hp;
  p.mana = props.mana;
  return p;
}
const players = [
  fakePlayer({
    name: "Player 1",
    hp: 80,
    mana: 50,
    avatar: "https://i.pravatar.cc/50?img=11",
  }),
  fakePlayer({
    name: "Player 2",
    hp: 60,
    mana: 70,
    avatar: "https://i.pravatar.cc/50?img=5",
  }),
  fakePlayer({
    name: "Player 3",
    hp: 90,
    mana: 40,
    avatar: "https://i.pravatar.cc/50?img=65",
  }),
  fakePlayer({
    name: "Player 4",
    hp: 100,
    mana: 60,
    avatar: "https://i.pravatar.cc/50?img=68",
  }),
];
</script>
<style scoped lang="sass">

</style>
