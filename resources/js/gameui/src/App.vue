<template>
  <v-app theme="dark">
    <v-app-bar
      flat
      height="40"
      color="#0f1822"
      density="comfortable"
    >
      <v-toolbar-title class="text-caption ciano">🧙 Mesa de RPG</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn icon variant="text" class="ciano">
        <v-icon>mdi-cog</v-icon>
      </v-btn>
    </v-app-bar>

    <v-main>
      <router-view />
    </v-main>

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
  </v-app>
</template>

<script setup>
  //
import ConnectedMainframe from "@/templates/ConnectedMainframe.vue";
</script>
