<template>
  <div>
    <h1 class="text-xl font-bold mb-4">All Rentals</h1>
    <div class="mb-4">
      <Link href="/rentals/create" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
        + Add New Rental
      </Link>
    </div>
    <table class="min-w-full border">
      <thead>
        <tr>
          <th>ID</th>
          <th>Customer</th>
          <th>Car</th>
          <th>Start</th>
          <th>End</th>
          <th>Cost</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="rental in rentals" :key="rental.id">
          <td>{{ rental.id }}</td>
          <td>{{ rental.user.name }}</td>
          <td>{{ rental.car.name }} ({{ rental.car.brand }})</td>
          <td>{{ rental.start_date }}</td>
          <td>{{ rental.end_date }}</td>
          <td>{{ rental.total_cost }}</td>
          <td>
            <span
              :class="{
                'text-green-500': status(rental) === 'Completed',
                'text-yellow-500': status(rental) === 'Ongoing',
                'text-red-500': status(rental) === 'Canceled'
              }"
            >
              {{ status(rental) }}
            </span>
          </td>
          <td>
            <Link :href="`/rentals/${rental.id}/edit`" class="text-blue-600 mr-2">Edit</Link>
            <Link method="delete" :href="`/rentals/${rental.id}`" class="text-red-600">Delete</Link>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
defineProps({ rentals: Array });

const status = (rental) => {
  const today = new Date();
  const end = new Date(rental.end_date);
  if (end < today) return 'Completed';
  const start = new Date(rental.start_date);
  if (start <= today && today <= end) return 'Ongoing';
  return 'Canceled';
};
</script>
