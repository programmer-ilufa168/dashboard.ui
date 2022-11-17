<script setup>
import AuthenticatedLayout from '@/Layouts/Guest/AuthenticatedLayout.vue'
import { Head } from '@inertiajs/inertia-vue3';
</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="flex flex-wrap">
            <div
                class="bg-white shadow dark:text-white-smooth dark:bg-gray-s200 my-5 rounded py-4 px-3 w-full md:w-1/3">
                Akun Anda Belum di Setujui oleh admin
            </div>
        </div>
    </AuthenticatedLayout>
</template>
