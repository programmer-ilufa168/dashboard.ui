<script setup>
import { ref } from "vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import { Link } from "@inertiajs/inertia-vue3";

import { useDark, useToggle } from '@vueuse/core';

const showingNavigationDropdown = ref(false);
const showingMenuUserDropdown = ref(false);

const openSide = ref(false);

const isDark = useDark();
const toggleDark = useToggle(isDark);

console.log(route().current('user.*'));
// console.log(route().currentRouteName());
</script>

<template>
    <div class="h-screen w-full bg-gray-50 dark:bg-gray-s100">
        <aside
            class="overflow-scroll bg-white dark:bg-gray-s100 scroll-smooth fixed inset-y-0 z-20 flex flex-col flex-shrink-0 max-h-screen shadow-xl"
            :class="{ 'w-64': openSide, 'hidden md:block md:w-64': !openSide }">
            <div class="flex justify-between place-items-center dark:text-white-smooth py-4 px-3">
                <div class="text-2xl font-bold">Dashboard</div>
                <button class="md:hidden flex place-items-center" @click="openSide = !openSide">
                    <font-awesome-icon icon="fa-solid fa-xmark" class="dark:text-white-smooth text-2xl" />
                </button>
            </div>
            <div class="dark:text-white-smooth w-full">
                <ul class="flex flex-col space-y-1">
                    <li class="font-bold">
                        <Link href="/dashboard">
                        <div class="px-4 py-2 rounded mx-2 flex place-items-center space-x-2 hover:bg-gray-100 hover:dark:bg-gray-s200 hover:text-gray-800 hover:dark:text-white"
                            :class="{ 'dark:bg-gray-s200 bg-gray-100 dark:text-white': route().current('dashboard'), 'text-gray-s200 dark:text-white-smooth': !route().current('dashboard') }">
                            <div>
                                <font-awesome-icon icon="fa-solid fa-house" />
                            </div>
                            <div>
                                Dashboard
                            </div>
                        </div>
                        </Link>
                    </li>
                    <li>
                        <!-- {{ route().currentRouteName() }} -->
                    </li>
                    <li class="font-bold">
                        <div @click="showingMenuUserDropdown = !showingMenuUserDropdown"
                            class="px-4 py-2 rounded mx-2 flex justify-between place-items-center hover:bg-gray-100 hover:dark:bg-gray-s200 hover:text-gray-800 hover:dark:text-white"
                            :class="{ 'dark:bg-gray-s200 bg-gray-100 dark:text-white': route().current('user.*'), 'text-white-s200 dark:text-white-smooth': !route().current('user.*') }">
                            <div class="flex space-x-2 place-items-center">
                                <font-awesome-icon icon="fa-solid fa-user" />
                                <span>User</span>
                            </div>
                            <div v-if="showingMenuUserDropdown">
                                <font-awesome-icon icon="fa-solid fa-chevron-down" />
                            </div>
                            <div v-else>
                                <font-awesome-icon icon="fa-solid fa-chevron-right" />
                            </div>
                        </div>
                        <ul v-show="showingMenuUserDropdown == !route().current('user.*')"
                            class="text-sm font-semibold my-2 ml-4 mr-2 rounded ">
                            <li>
                                <Link :href="route('user.list')">
                                <div class="px-3 py-2"
                                    :class="{ 'dark:bg-gray-s200 bg-gray-100 dark:text-white rounded': route().current('user.list') }">
                                    List
                                </div>
                                </Link>
                            </li>
                            <li>
                                <Link :href="route('user.data.list')">
                                <div class="px-3 py-2"
                                    :class="{ 'dark:bg-gray-s200 bg-gray-100 dark:text-white rounded': route().current('user.data.list') }">
                                    Data
                                </div>
                                </Link>
                            </li>
                            <li>
                                <Link :href="route('user.data.list')">
                                <div class="px-3 py-2"
                                    :class="{ 'dark:bg-gray-s200 bg-gray-100 dark:text-white rounded': route().current('user.data.list') }">
                                    Setting
                                </div>
                                </Link>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="max-h-screen p-4" :class="{ 'ml-0 md:ml-64': openSide, 'ml-0 md:ml-64': !openSide }">
            <nav
                class="dark:text-white-smooth stiky bg-white dark:bg-gray-s200 px-3 md:px-5 py-2 shadow-md rounded-md text-gray-800 flex justify-between place-items-center">
                <button class="p-2 text-gray-800 rounded md:hidden" @click="openSide = !openSide">
                    <font-awesome-icon icon="fa-solid fa-bars" class="dark:text-white-smooth text-xl" />
                </button>
                <font-awesome-icon icon="fa-solid fa-magnifying-glass" class="dark:text-white-smooth text-xl" />
                <div class="flex">
                    <ul class="flex space-x-3 place-items-center">
                        <li>
                            <button class="p-2" @click="toggleDark()">
                                <font-awesome-icon icon="fa-doutone fa-moon" class="text-xl" />
                            </button>
                        </li>
                        <li>
                            <font-awesome-icon icon="fa-solid fa-bell" class="text-xl" />
                        </li>
                        <li>
                            <Dropdown>
                                <template #trigger>
                                    <button class="flex rounded-md">
                                        <img class="w-10 h-10 rounded-full"
                                            src="https://www.kibrispdr.org/data/312/gambar-cewek2-cantik-4.jpg" />
                                        <div class="flex flex-col mx-2">
                                            <div class="text-md font-bold">
                                                {{ $page.props.auth.user.name }}
                                            </div>
                                            <div class="text-xs font-semibold">
                                                Admin
                                            </div>
                                        </div>
                                    </button>
                                </template>
                                <template #content>
                                    <DropdownLink :href="route('logout')" method="post" as="button">
                                        <div class="flex flex-wrap space-x-2">
                                            <div>
                                                <font-awesome-icon icon="fa-regular fa-user" />
                                            </div>
                                            <div>Profile</div>
                                        </div>
                                    </DropdownLink>
                                    <DropdownLink :href="route('logout')" method="post" as="button">
                                        <div class="flex flex-wrap space-x-2">
                                            <div>
                                                <font-awesome-icon icon="fa-solid fa-arrow-right-from-bracket" />
                                            </div>
                                            <div>Log Out</div>
                                        </div>
                                    </DropdownLink>
                                </template>
                            </Dropdown>
                        </li>
                    </ul>
                </div>
            </nav>
            <main>
                <slot />
            </main>
        </div>
    </div>
    <!-- <div>
        <div class="min-h-screen bg-gray-100">
            <nav class="bg-white border-b border-gray-100">

                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <div class="shrink-0 flex items-center">
                                <Link :href="route('dashboard')">
                                <ApplicationLogo class="block h-9 w-auto" />
                                </Link>
                            </div>

                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
                                    Dashboard
                                </NavLink>
                            </div>
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <div class="ml-3 relative">
                                <Dropdown align="right" width="48">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                                {{ $page.props.auth.user.name }}

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <DropdownLink :href="route('logout')" method="post" as="button">
                                            Log Out
                                        </DropdownLink>
                                    </template>
                                </Dropdown>
                            </div>
                        </div>
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button @click="showingNavigationDropdown = !showingNavigationDropdown"
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path
                                        :class="{ 'hidden': showingNavigationDropdown, 'inline-flex': !showingNavigationDropdown }"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16" />
                                    <path
                                        :class="{ 'hidden': !showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div :class="{ 'block': showingNavigationDropdown, 'hidden': !showingNavigationDropdown }"
                    class="sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                            Dashboard
                        </ResponsiveNavLink>
                    </div>

                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="px-4">
                            <div class="font-medium text-base text-gray-800">{{ $page.props.auth.user.name }}</div>
                            <div class="font-medium text-sm text-gray-500">{{ $page.props.auth.user.email }}</div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <ResponsiveNavLink :href="route('logout')" method="post" as="button">
                                Log Out
                            </ResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </nav>

            <header class="bg-white shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <main>
                <slot />
            </main>
        </div>
    </div> -->
</template>
