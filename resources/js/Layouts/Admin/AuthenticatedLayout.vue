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
const showingMenuApplicationDropdown = ref(false);

const openSide = ref(false);

const isDark = useDark();
const toggleDark = useToggle(isDark);

</script>

<template>
    <div class="min-h-screen w-full bg-gray-50 dark:bg-gray-s100">
        <aside
            class="overflow-scroll bg-white dark:bg-gray-s100 scroll-smooth fixed inset-y-0 z-20 flex flex-col flex-shrink-0 max-h-screen shadow-xl"
            :class="{ 'w-64': openSide, 'hidden md:block md:w-64': !openSide }">
            <div class="flex justify-between place-items-center dark:text-white-smooth py-5 md:py-8 px-3">
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
                                Dashboard Admin
                            </div>
                        </div>
                        </Link>
                    </li>
                    <li class="font-bold">
                        <div @click="showingMenuApplicationDropdown = !showingMenuApplicationDropdown"
                            class="px-4 py-2 rounded mx-2 flex justify-between place-items-center hover:bg-gray-100 hover:dark:bg-gray-s200 hover:text-gray-800 hover:dark:text-white"
                            :class="{ 'dark:bg-gray-s200 bg-gray-100 dark:text-white': route().current('application.*'), 'text-white-s200 dark:text-white-smooth': !route().current('application.*') }">
                            <div class="flex space-x-2 place-items-center">
                                <font-awesome-icon icon="fa-solid fa-rocket" />
                                <span>Application</span>
                            </div>
                            <div v-if="showingMenuApplicationDropdown">
                                <font-awesome-icon icon="fa-solid fa-chevron-down" />
                            </div>
                            <div v-else>
                                <font-awesome-icon icon="fa-solid fa-chevron-right" />
                            </div>
                        </div>
                        <ul v-show="showingMenuApplicationDropdown == !route().current('application.*')"
                            class="text-sm font-semibold my-2 ml-4 mr-2 rounded ">
                            <li>
                                <Link :href="route('application.list')">
                                <div class="px-5 py-2"
                                    :class="{ 'dark:bg-gray-s200 bg-gray-100 dark:text-white rounded': route().current('application.list') }">
                                    List
                                </div>
                                </Link>
                            </li>
                            <li>
                                <Link :href="route('application.setting')">
                                <div class="px-5 py-2"
                                    :class="{ 'dark:bg-gray-s200 bg-gray-100 dark:text-white rounded': route().current('application.setting') }">
                                    Setting
                                </div>
                                </Link>
                            </li>
                        </ul>
                    </li>
                    <li class="font-bold">
                        <Link href="/tutorial">
                        <div class="px-4 py-2 rounded mx-2 flex place-items-center space-x-2 hover:bg-gray-100 hover:dark:bg-gray-s200 hover:text-gray-800 hover:dark:text-white"
                            :class="{ 'dark:bg-gray-s200 bg-gray-100 dark:text-white': route().current('tutorial.*'), 'text-gray-s200 dark:text-white-smooth': !route().current('tutorial.*') }">
                            <div>
                                <font-awesome-icon icon="fa-solid fa-book-open" />
                            </div>
                            <div>
                                Tutorial
                            </div>
                        </div>
                        </Link>
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
                                <div class="px-5 py-2"
                                    :class="{ 'dark:bg-gray-s200 bg-gray-100 dark:text-white rounded': route().current('user.list') }">
                                    List
                                </div>
                                </Link>
                            </li>
                            <li>
                                <Link :href="route('user.data.list')">
                                <div class="px-5 py-2"
                                    :class="{ 'dark:bg-gray-s200 bg-gray-100 dark:text-white rounded': route().current('user.data.list') }">
                                    Data
                                </div>
                                </Link>
                            </li>
                            <li>
                                <Link :href="route('user.data.list')">
                                <div class="px-5 py-2"
                                    :class="{ 'dark:bg-gray-s200 bg-gray-100 dark:text-white rounded': route().current('user.data.list') }">
                                    Setting
                                </div>
                                </Link>
                            </li>
                        </ul>
                    </li>
                    <li class="font-bold">
                        <Link href="/tutorial">
                        <div class="px-4 py-2 rounded mx-2 flex place-items-center space-x-2 hover:bg-gray-100 hover:dark:bg-gray-s200 hover:text-gray-800 hover:dark:text-white"
                            :class="{ 'dark:bg-gray-s200 bg-gray-100 dark:text-white': route().current('tutorial.*'), 'text-gray-s200 dark:text-white-smooth': !route().current('tutorial.*') }">
                            <div>
                                <font-awesome-icon icon="fa-solid fa-gear" />
                            </div>
                            <div>
                                Setting
                            </div>
                        </div>
                        </Link>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="mix-h-screen p-4" :class="{ 'ml-0 md:ml-64': openSide, 'ml-0 md:ml-64': !openSide }">
            <nav
                class="dark:text-white-smooth bg-white dark:bg-gray-s200 px-3 md:px-5 py-2 shadow-md rounded-md text-gray-800 flex justify-between place-items-center">
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
                                    <button class="flex rounded-md place-items-center">
                                        <img class="w-10 h-10 rounded-full"
                                            src="https://www.kibrispdr.org/data/312/gambar-cewek2-cantik-4.jpg" />
                                        <div class="mx-2">
                                            {{ $page.props.auth.user.name }} </div>
                                    </button>
                                </template>
                                <template #content>
                                    <DropdownLink :href="route('logout')" method="post" as="button">
                                        <div class="flex flex-wrap space-x-2">
                                            <div>
                                                <font-awesome-icon icon="fa-solid fa-user" />
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
</template>

<style scoped>
/* width */
::-webkit-scrollbar {
    width: 5px;
}

/* Track */
::-webkit-scrollbar-track {
    background: #f1f1f1;
}

/* Handle */
::-webkit-scrollbar-thumb {
    background: #888;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
    background: #555;
}
</style>
