<script setup>
import { useForm, usePage } from '@inertiajs/vue3';
import Layout from '../Shared/Layout.vue';
import { computed, ref } from 'vue';
import { useToast } from 'vue-toastification';


const toast = useToast();
const flash = computed(() => usePage().props.flash);

const carImage = ref(null);

const form = useForm({
    name: '',
    brand: '',
    model: '',
    year: '',
    car_type: 'SUV',
    daily_rent_price: '',
    availability: 'Available',
    image: null
});

const handelImage = (event) => {
    const file = event.target.file[0];
    if(file){
        form.image = file;
        carImage.value = URL.createObjectURL(file);
    }
}
const handelSubmit = () => {
    form.post('/car', {
        onSuccess: () => {
            flash.value.success && toast.success(flash.value.success);
            flash.value.error && toast.error(flash.value.error);
        },
        onError: () => {
            toast.error('Failed to add brand. Please try again.');
        }
    })
}

</script>

<template>
    
    <Layout>
        <body class="bg-red-100 text-white min-h-screen flex items-center justify-center">
        <div class="bg-gray-800  p-8 rounded-lg shadow-lg w-full max-w-lg">
            <h2 class="text-2xl font-bold mb-6 text-center text-white-700">Add New Car</h2>
            <form class="space-y-4" @submit.prevent="handelSubmit">
                <div>
                    <label for="carName" class="block text-sm font-medium text-white-700">Car Name</label>
                    <input type="text" id="carName" class="mt-1 block w-full border border-white-300 rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500" v-model="form.name" placeholder="Enter car name">
                </div>

                <div>
                    <label for="brand" class="block text-sm font-medium text-white-700">Brand</label>
                    <input type="text" id="brand" class="mt-1 block w-full border border-white-300 rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500" v-model="form.brand" placeholder="Enter brand">
                </div>

                <div>
                    <label for="model" class="block text-sm font-medium text-white-700">Model</label>
                    <input type="text" id="model" class="mt-1 block w-full border border-white-300 rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500" v-model="form.model"  placeholder="Enter model">
                </div>

                <div>
                    <label for="year" class="block text-sm font-medium text-white-700">Year of Manufacture</label>
                    <input type="number" id="year" class="mt-1 block w-full border border-white-300 rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500" v-model="form.year" placeholder="Enter year">
                </div>

                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700">Car Type</label>
                    <select id="type" class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500" v-model="form.car_type">
                        <option disabled selected>Select car type</option>
                        <option>SUV</option>
                        <option>Sedan</option>
                        <option>Hatchback</option>
                        <option>Coupe</option>
                        <option>Pickup</option>
                    </select>
                </div>

                <div>
                    <label for="rentPrice" class="block text-sm font-medium text-gray-700">Daily Rent Price ($)</label>
                    <input type="number" id="rentPrice" class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500" v-model="form.daily_rent_price" placeholder="Enter rent price">
                </div>

                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Availability Status</label>
                    <select id="status" class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500"  v-model="form.availability">
                        <option>Available</option>
                        <option>Not Available</option>
                    </select>
                </div>

                <div>
                    <label for="carImage" class="block text-sm font-medium text-gray-700">Car Image</label>
                    <input type="file" id="carImage" v-on:change="handelImage" class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg transition duration-200">Save Car</button>
                </div>
            </form>
        </div>
        </body>
   </Layout>
</template>

<style scoped>
    
</style>