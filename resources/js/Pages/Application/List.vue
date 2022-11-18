<script setup>
import AuthenticatedLayout from '@/Layouts/Super Admin/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Head title="Application" />

    <AuthenticatedLayout>
        <!-- <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                User List
            </h2>
        </template> -->
        <div class="bg-white dark:bg-gray-s200 dark:text-white-smooth my-4 rounded py-4 px-4 shadow">
            <button class="bg-blue-50 dark:bg-gray-s100 border border-blue-500 px-4 py-2 rounded">
                Create Applications
            </button>
        </div>
    </AuthenticatedLayout>
</template>
