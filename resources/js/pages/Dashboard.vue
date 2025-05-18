<script setup>
import { usePage } from '@inertiajs/vue3';
import CarList from './Cars/CarList.vue';
import Layout from './Shared/Layout.vue'

const user = usePage().props.user;
</script>

<template>
  <Layout>
    <div class="max-w-3xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
      <h1 class="text-3xl font-bold mb-4 text-blue-600">Dashboard</h1>
      <p class="text-gray-700 text-lg">Welcome {{ user.name }}!</p>
    </div>

    <!-- <CarList  /> -->
  </Layout>
</template>

<style scoped>
</style>
