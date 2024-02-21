<template>
  <div class="text">This text has the color defined by the theme.</div>
</template>

<script setup>
import { onMounted, onBeforeUnmount  } from 'vue';

const theme = {
  color:'red'
}

const handleResize = () => {
  if (window.innerWidth < 1100) {
    theme.color = 'blue';
    theme.textHeight = '300px'; // Update text height based on condition
  } else {
    theme.color = 'red';
    theme.textHeight = '200px'; // Reset text height if condition not met
  }
};

onMounted(() => {
  handleResize(); // Call the method on component mount
  window.addEventListener('resize', handleResize); // Listen for window resize events
});

onBeforeUnmount(() => {
  window.removeEventListener('resize', handleResize); // Remove the event listener on component unmount
});
</script>

<style scoped>
.text {
  color: v-bind('theme.color');
}
</style>
