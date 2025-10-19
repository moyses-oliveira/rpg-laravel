

<template>
  <div>
    <div class="attribute-tag ps-5 pe-5" :class="subclass" v-tooltip:top="label">
      <span><v-icon size="16" class="me-1">{{ icon }}</v-icon></span>
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
  subclass: {
    type: [String],
    default: '',
  }
});
</script>

<style scoped lang="sass">

</style>
