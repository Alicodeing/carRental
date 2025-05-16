<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import Layout from '../Shared/Layout.vue';
import { useToast } from 'vue-toastification';

const props = defineProps({
    cars: Object
});

</script>

<template>
    <!-- <Layout> -->
        <div class="p-4">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold">Car List</h1>
                <Link href="/cars/create" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">Add Car</Link>
            </div>
            <table class="w-full table-auto border">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="p-2">Name</th>
                        <th class="p-2">Brand</th>
                        <th class="p-2">model</th>
                        <th class="p-2">year</th>
                        <th class="p-2">car_type</th>
                        <th class="p-2">daily_rent_price</th>
                        <th class="p-2">availability</th>
                        <th class="p-2">image</th>
                        <th class="p-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(brand, index) in brands" :key="index">
                        <td class="p-2">{{ brand.name }}</td>
                        <td class="p-2">{{ brand.brand }}</td>
                        <td class="p-2">{{ brand.model }}</td>
                        <td class="p-2">{{ brand.year }}</td>
                        <td class="p-2">{{ brand.car_type }}</td>
                        <td class="p-2">{{ brand.daily_rent_price }}</td>
                        <td class="p-2">{{ brand.availability }}</td>
                        <td class="p-2"><img :src="brand.image" alt="" class="w-10 h-10 rounded-full"></td>
                        <td class="p-2 space-x-2">
                            <Link href="" class="text-blue-600">Edit</Link>
                            <Link href="#" method="delete" as="button" class="text-red-600">Delete</Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    <!-- </Layout> -->
</template>
