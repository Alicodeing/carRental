<script setup>
import { Link, router, usePage } from '@inertiajs/vue3'
import { computed } from 'vue'

const props = defineProps({
  cars: Array
})

// const flash = computed(() => usePage().props.flash)

const deleteCar = (id) => {
  if (confirm('Are you sure you want to delete this car?')) {
    router.delete(`/car/${id}`)
  }
}
</script>

<template>
  <div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Car List</h1>

    <!-- Flash Message -->
    <!-- <div v-if="flash.success" class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
      {{ flash.success }}
    </div> -->

    <!-- Create Button -->
    <div class="mb-4">
      <Link href="/car/create" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
        + Add New Car
      </Link>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
      <table class="min-w-full bg-white border">
        <thead>
          <tr class="bg-gray-100 text-left text-sm">
            <th class="px-4 py-2 border">#</th>
            <th class="px-4 py-2 border">Name</th>
            <th class="px-4 py-2 border">Brand</th>
            <th class="px-4 py-2 border">Model</th>
            <th class="px-4 py-2 border">Year</th>
            <th class="px-4 py-2 border">Type</th>
            <th class="px-4 py-2 border">Price</th>
            <th class="px-4 py-2 border">Available</th>
            <th class="px-4 py-2 border">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(car, index) in cars" :key="car.id" class="text-sm">
            <td class="px-4 py-2 border">{{ index + 1 }}</td>
            <td class="px-4 py-2 border">{{ car.name }}</td>
            <td class="px-4 py-2 border">{{ car.brand }}</td>
            <td class="px-4 py-2 border">{{ car.model }}</td>
            <td class="px-4 py-2 border">{{ car.year }}</td>
            <td class="px-4 py-2 border">{{ car.car_type }}</td>
            <td class="px-4 py-2 border">${{ car.daily_rent_price }}</td>
            <td class="px-4 py-2 border">
              <span :class="car.availability ? 'text-green-600' : 'text-red-600'">
                {{ car.availability ? 'Yes' : 'No' }}
              </span>
            </td>
            <td class="px-4 py-2 border space-x-2">
              <Link :href="`/car/${car.id}/edit`" class="text-blue-500 hover:underline">Edit</Link>
              <button @click="deleteCar(car.id)" class="text-red-500 hover:underline">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
