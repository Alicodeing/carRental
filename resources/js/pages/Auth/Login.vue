<script setup>
import { useForm, usePage, Link} from '@inertiajs/vue3';
import { onMounted,  computed } from 'vue';

const flash = computed(() => usePage().props.flash)
const form = useForm({
    email : '',
    password : ''

})
const props = defineProps({
    sitting: Object
})

const login = () => {
    form.post('/login', {
        onSuccess: () => {
            flash.value.success && alert(flash.value.success)
            flash.value.error && alert(flash.value.error)
        }
    })
    

}

</script>

<template>
    <!-- Login Form -->
    <div class="max-w-md mx-auto bg-white shadow-md rounded-lg p-6">
      <h2 class="text-2xl font-bold mb-6 text-center">Login to Your Car Rental Account</h2>
      <form @submit.prevent="login">
        <div class="mb-4">
          <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
          <input type="email" id="email" class="w-full p-2 border rounded-md" v-model="form.email" placeholder="Enter your email" required>
        </div>
        <div class="mb-6">
          <label for="password" class="block text-gray-700 font-bold mb-2">Password</label>
          <input type="password" id="password" class="w-full p-2 border rounded-md" v-model="form.password" placeholder="Enter your password" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white w-full py-2 rounded-md hover:bg-blue-600">Login</button>
      </form>
      <p class="text-center mt-4 text-gray-600">
        Don't have an account? 
        <a href="/register" class="text-blue-500 hover:text-blue-700">Register here</a>
      </p>
    </div>
</template>

<style scoped>
    
</style>