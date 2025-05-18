<template>
  <div class="max-w-2xl mx-auto p-6 bg-white rounded-2xl shadow">
    <h2 class="text-2xl font-bold mb-4">Create New Rental</h2>
    <form @submit.prevent="submit" class="space-y-4">
      <!-- User Select -->
      <div>
        <label for="user_id" class="block text-sm font-medium text-gray-700">Customer</label>
        <select v-model="form.user_id" id="user_id" class="mt-1 block w-full rounded border-gray-300">
          <option value="">Select Customer</option>
          <option v-for="user in users" :key="user.id" :value="user.id">
            {{ user.name }}
          </option>
        </select>
        <span class="text-red-500 text-sm" v-if="form.errors.user_id">{{ form.errors.user_id }}</span>
      </div>

      <!-- Car Select -->
      <div>
        <label for="car_id" class="block text-sm font-medium text-gray-700">Car</label>
        <select v-model="form.car_id" id="car_id" class="mt-1 block w-full rounded border-gray-300">
          <option value="">Select Car</option>
          <option v-for="car in cars" :key="car.id" :value="car.id">
            {{ car.name }} - {{ car.brand }}
          </option>
        </select>
        <span class="text-red-500 text-sm" v-if="form.errors.car_id">{{ form.errors.car_id }}</span>
      </div>

      <!-- Start Date -->
      <div>
        <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
        <input type="date" id="start_date" v-model="form.start_date"
               class="mt-1 block w-full rounded border-gray-300" />
        <span class="text-red-500 text-sm" v-if="form.errors.start_date">{{ form.errors.start_date }}</span>
      </div>

      <!-- End Date -->
      <div>
        <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
        <input type="date" id="end_date" v-model="form.end_date"
               class="mt-1 block w-full rounded border-gray-300" />
        <span class="text-red-500 text-sm" v-if="form.errors.end_date">{{ form.errors.end_date }}</span>
      </div>

      <!-- Total Cost -->
      <div>
        <label for="total_cost" class="block text-sm font-medium text-gray-700">Total Cost</label>
        <input type="number" id="total_cost" v-model="form.total_cost" step="0.01"
               class="mt-1 block w-full rounded border-gray-300" />
        <span class="text-red-500 text-sm" v-if="form.errors.total_cost">{{ form.errors.total_cost }}</span>
      </div>

      <!-- Submit Button -->
      <div>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
          Create Rental
        </button>
      </div>
    </form>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
  users: Array,
  cars: Array,
})

const form = useForm({
  user_id: '',
  car_id: '',
  start_date: '',
  end_date: '',
  total_cost: '',
})

const submit = () => {
  form.post('/rentals')
}
</script>
