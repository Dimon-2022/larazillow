<template>
    <header class="border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 w-full">
        <div class="container mx-auto">
            <nav class="p-4 flex items-center justify-between">
                <div class="text-lg font-medium">
                    <Link :href="route('listing.index')" class="nav-item">
                        Listings
                    </Link>
                </div>
                <div class="text-xl text-indigo-600 dark:text-indigo-300 font-bold text-centered">
                    <Link :href="route('listing.index')">LaraZillow</Link>
                </div>
                <div class="flex items-center gap-4" v-if="user">
                    <Link :href="route('notification.index')" class="text-gray-500 relative pr-2 py-2 text-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>
                        <div v-if="notificationCount" class="absolute right-0 top-0 w-5 h-5 bg-red-700 dark:bg-red-400 text-white font-medium border border-white dark:border-gray-900 rounded-full text-xs text-center">
                            {{notificationCount}}
                        </div>
                    </Link>
                    <Link class="text-sm text-gray-500" :href="route('realtor.listing.index')">
                        {{user.name}}
                    </Link>
                    <Link :href="route('realtor.listing.create')"
                          class="btn-primary">+ New Listing
                    </Link>
                    <div>
                        <Link :href="route('logout')" method="delete" as="button">Logout</Link>
                    </div>
                </div>
                <div v-else class="flex items-center gap-2">
                    <Link :href="route('user-account.create')">Register</Link>
                    <Link :href="route('login')">Sign in</Link>
                </div>
            </nav>
        </div>
    </header>

    <main class="container mx-auto p-4 w-full">
        <div v-if="flashSuccess" class="mb-4 border rounded-md shadow-sm border-green-200 dark:border-green-800 bg-green-50 dark:bg-green-900 p-2">
            {{ flashSuccess }}
        </div>
        <slot>Default</slot>
    </main>
</template>


<script setup>
import {computed} from 'vue'
import {Link, usePage} from "@inertiajs/vue3"

const page = usePage();
const flashSuccess = computed(() => page.props.flash?.success)

const user = computed(() => page.props.user)

const notificationCount = computed(() => Math.min(page.props.user.notificationCount, 9))

// import {ref} from 'vue'
//
// const timer = ref(0);
// setInterval(() => timer.value++, 1000)
</script>

