<script setup>
import { ref, reactive } from 'vue';
const count = ref(0)
</script>

<template>
  <div>
    <h1>Data from PHP:</h1>
    <p>{{ jsonData.name }}</p>
  </div>
</template>


<script>
import axios from 'axios';
export default {
  data() {
    return {
      jsonData: []  // Initialize an empty array to store the fetched JSON data
    };
  },
  created() {
    // Fetch data from PHP file when the component is created
    this.fetchData();
  },
  methods: {
    async fetchData() {
      try {
        // Make an HTTP GET request to the PHP file
        const response = await axios.get('/api/backend/test.php');

        // Assign the fetched JSON data to the component's data property
        this.jsonData = response.data;
      } catch (error) {
        console.error('Error fetching data:', error);
      }
    }
  }
}
</script>