<script setup>
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps({
    car: Object,
});
// const carImage = ref(null);
const form = useForm({
    name: props.car.name,
    brand: props.car.brand,
    model: props.car.model,
    year: props.car.year,
    car_type: props.car.car_type,
    daily_rent_price: props.car.daily_rent_price,
    availability: props.car.availability,
    image: props.car.image,
    _method: "PUT",
});

const handleImage = (event) => {
    const file = event.target.files[0];
    if (file) {
        form.image = file;
        carImage.value = URL.createObjectURL(file);
    }
};

const updateCar = () => {
    form.put(`/car/${props.car.id}`, {
        onSuccess: () => {
            alert("Car updated successfully!");
        },
    });
};
</script>

<template>
    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow mt-10">
        <h2 class="text-2xl font-bold mb-4">Edit Car</h2>

        <form @submit.prevent="updateCar">
            <div class="mb-4">
                <label for="name" class="block mb-1 font-medium">Name</label>
                <input id="name" v-model="form.name" class="w-full p-2 border rounded" />
            </div>

            <div class="mb-4">
                <label for="brand" class="block mb-1 font-medium">Brand</label>
                <input id="brand" v-model="form.brand" class="w-full p-2 border rounded" />
            </div>

            <div class="mb-4">
                <label for="model" class="block mb-1 font-medium">Model</label>
                <input id="model" v-model="form.model" class="w-full p-2 border rounded" />
            </div>

            <div class="mb-4">
                <label for="year" class="block mb-1 font-medium">Year</label>
                <input
                    id="year"
                    v-model="form.year"
                    type="number"
                    class="w-full p-2 border rounded"
                />
            </div>

             <div class="mb-4">
            <label fro="car_type" class="block mb-1 font-medium">Car Type</label>
            <select id="car_type" v-model="form.car_type" class="w-full p-2 border rounded">
                <option value="Sedan">Sedan</option>
                <option value="SUV">SUV</option>
                <option value="Hatchback">Hatchback</option>
                <option value="Coupe">Coupe</option>
                <option value="Convertible">Convertible</option>
                <option value="Pickup Truck">Pickup Truck</option>
                <option value="Van">Van</option>
                <option value="Wagon">Wagon</option>
                <option value="Luxury">Luxury</option>
                <option value="Electric">Electric</option>
                <option value="Hybrid">Hybrid</option>
            </select>
            </div>

            <div class="mb-4">
                <label for="daily_rent_price" class="block mb-1 font-medium">Daily Rent Price</label>
                <input
                    id="daily_rent_price"
                    v-model="form.daily_rent_price"
                    type="number"
                    step="0.01"
                    class="w-full p-2 border rounded"
                />
            </div>

            <div class="mb-4">
                <label for="availability" class="block mb-1 font-medium">Available?</label>
                <select
                    id="availability"
                    v-model="form.availability"
                    class="w-full p-2 border rounded"
                >
                    <option :value="true">Yes</option>
                    <option :value="false">No</option>
                </select>
            </div>

            <div class="mb-4">
                <label
                    for="car-image"
                    class="block text-gray-700 font-bold mb-2"
                    >Image</label
                >
                <input
                    v-on:change="handleImage"
                    type="file"
                    id="car-image"
                    class="w-full p-2 border rounded-md"
                />
            </div>

            <button
                type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
            >
                Update Car
            </button>
        </form>
    </div>
</template>

<style scoped></style>
