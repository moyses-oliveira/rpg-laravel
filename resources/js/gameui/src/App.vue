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

  </v-app>
</template>

<script setup>
  //
import ConnectedMainframe from "@/templates/ConnectedMainframe.vue";
</script>
