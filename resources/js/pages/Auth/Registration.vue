<script setup>
import { useForm, usePage, Link} from '@inertiajs/vue3';
import { computed } from 'vue';


const flash = computed(() => usePage().props.flash)
const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: ''
});

const submitForm= () => {
    form.post('/register', {
        onSuccess: () => {
            flash.value.success && alert(flash.value.success)
            flash.value.error && alert(flash.value.error)
        }
    })
}

</script>
<template>
      <div class="container mx-auto px-4 py-8">
            <div class="max-w-md mx-auto bg-white shadow-md rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-6 text-center">Create an Account</h2>
                <form @submit.prevent="submitForm">
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
                        <input v-model="form.name" type="text" id="name" class="w-full p-2 border rounded-md" placeholder="Enter your name"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                        <input v-model="form.email" type="email" id="email" class="w-full p-2 border rounded-md"
                            placeholder="Enter your email" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 font-bold mb-2">Password</label>
                        <input v-model="form.password" type="password" id="password" class="w-full p-2 border rounded-md"
                            placeholder="Enter your password" required>
                    </div>
                    <div class="mb-6">
                        <label for="confirm-password" class="block text-gray-700 font-bold mb-2">Confirm
                            Password</label>
                        <input v-model="form.password_confirmation" type="password" id="confirm-password" class="w-full p-2 border rounded-md"
                            placeholder="Confirm your password" required>
                    </div>
                    <button type="submit"
                        class="bg-blue-500 text-white w-full py-2 rounded-md hover:bg-blue-600">Register</button>
                </form>
                <p class="text-center mt-4 text-gray-600">
                    Already have an account?
                    <Link href="/login" class="text-blue-500 hover:text-blue-700">Login here</Link>
                </p>
            </div>
        </div>
</template>

<style scoped>

</style>