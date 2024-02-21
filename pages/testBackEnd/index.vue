<template>
  <p>{{ jsonData }}</p>
</template>

<script>
import axios from 'axios';
export default {
  data() {
    return {
      jsonData: null
    };
  },
  created() {
    this.fetchData();
  },
  methods: {
    async fetchData() {
      try {
        const response = await axios.get('/api/backend/test.php');
        this.jsonData = response.data;
      } catch (error) {
        console.error('Error fetching data:', error);
      }
    }
  }
}
</script>