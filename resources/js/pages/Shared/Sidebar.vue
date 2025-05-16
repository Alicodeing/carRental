<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
     <aside class="w-64 bg-red-800 text-white h-screen fixed">
      <div class="p-4">
        <h3 class="text-xl font-bold mb-6">Car Rental Admin Panel</h3>
        <ul class="mt-4 space-y-2">
          <li><Link href="/dashboard" class="hover:bg-gray-700 p-2 block rounded">Dashboard Overview</Link></li>
          <li><Link href="/car" class="hover:bg-gray-700 p-2 block rounded">Manage Cars</Link></li>
          <li><Link href="/rentals" class="hover:bg-gray-700 p-2 block rounded">Manage Rentals</Link></li>
          <li><Link href="/customers" class="hover:bg-gray-700 p-2 block rounded">Manage Customers</Link></li>
        </ul>
      </div>
    </aside>
</template>

<style scoped>

</style>