<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>
    <div class="min-h-screen bg-gray-100">

        <div class="w-full min-h-screen sm:max-w-md overflow-hidden">
            <slot />
        </div>
    </div>
</template>
