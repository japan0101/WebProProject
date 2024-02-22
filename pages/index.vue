<script>
import Navbar from "~/components/Navbar.vue";
</script>
<script setup>
import { ref, reactive } from 'vue';
const count = ref(0)
</script>
<template>
  <div>
    <Navbar />
    <section class="bg-white dark:bg-gray-900">
      <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
        <h1
          class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
          ร้านอาหารตามสั่งแล้วแต่แอป</h1>
        <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">
          ยินดีต้อนรับ</p>
        <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
          <a href="#" v-if="jsonData.name == null"
            class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center 
            text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
            สมัครสมาชิกเลย!!
            <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
              viewBox="0 0 14 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
          </a>
          <a href="#" v-else
            class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center 
            text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
            View points
            <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
              viewBox="0 0 14 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
          </a>
          <a href="#" v-if="jsonData.name == null"
            class="py-3 px-5 sm:ms-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-70">
            เข้าสู่ระบบ
          </a>
        </div>
      </div>
    </section>

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
