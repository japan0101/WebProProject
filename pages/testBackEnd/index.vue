<template>
  <div class="text">This text has the color defined by the theme.</div>
</template>

<script setup>
import { ref } from 'vue';
import { onMounted } from 'vue';

const theme = {
  color:'red'
}

onMounted(() => {
  if (window.outerWidth < 1100) {
    theme.color = 'blue';
  }
});
</script>

<style scoped>
.text {
  color: v-bind('theme.color');
}
</style>