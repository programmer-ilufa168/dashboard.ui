<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>
        <div class="flex flex-wrap">
            <div
                class="bg-white shadow dark:text-white-smooth dark:bg-gray-s200 my-5 rounded py-4 px-3 w-full md:w-1/3">
                Data Application
            </div>
        </div>
    </AuthenticatedLayout>
</template>
