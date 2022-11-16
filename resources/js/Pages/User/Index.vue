<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { Table } from "@protonemedia/inertiajs-tables-laravel-query-builder";

const props = defineProps({
    users: {
        type: Object,
        default: () => ({}),
    },
    data: {
        type: Object,
        default: () => ({}),
    }
});
</script>
<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                User List
            </h2>
        </template>
        <div class="flex flex-wrap my-2">
            <div v-for="user in users" :key="user.id"
                class="w-full md:w-2/6 xl:w-1/6 flex flex-col bg-white dark:bg-gray-s200 dark:text-white-smooth items-center m-2 shadow rounded">
                <div class="flex w-full place-items-center p-2">
                    <div class="text-xs px-2 py-1 rounded border" :class="{
                        'bg-red-50 border-red-500 text-red-500 dark:bg-gray-s100': user.roles[0].name == 'super admin',
                        'bg-blue-50 border-blue-500 text-blue-500 dark:bg-gray-s100': user.roles[0].name == 'admin',
                        'bg-orange-50 border-orange-500 text-orange-500 dark:bg-gray-s100': user.roles[0].name == 'editor',
                        'bg-green-50 border-green-500 text-green-500 dark:bg-gray-s100': user.roles[0].name == 'guest'
                    }">
                        {{ user.roles[0].name }}
                    </div>
                </div>
                <img class="w-32 h-32 rounded-full"
                    src="https://www.kibrispdr.org/data/312/gambar-cewek2-cantik-4.jpg" />
                <div class="flex flex-col items-center my-5">
                    <div class="font-bold text-xl">
                        {{ user.name }}
                    </div>
                    <div class="font-semibold text-md">
                        {{ user.email }}
                    </div>
                </div>
                <div class="flex flex-wrap justify-between w-full text-xs">
                    <div class="px-3 py-2">
                        Detail
                    </div>
                    <div class="px-3 py-2">
                        Action
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
