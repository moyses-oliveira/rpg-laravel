

<template>
  <div>
    <div class="attribute-tag" :class="subclass" v-tooltip:top="label">
      <span><v-icon :size="iconSize" class="me-1">{{ icon }}</v-icon></span>
      <span>{{ value }}</span>
    </div>
  </div>
</template>
<script setup>

const props = defineProps({
  icon: {
    type: String,
    required: true,
  },
  label: {
    type: String,
    required: true,
  },
  value: {
    type: [String, Number],
    required: true,
  },
  iconSize: {
    type: [Number],
    default: 16
  },
  subclass: {
    type: [String],
    default: '',
  }
});
</script>

<style scoped lang="sass">

</style>
