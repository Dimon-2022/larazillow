<template>
    <div class="mb-4">
        <Link :href="route('realtor.listing.index')">Go back to Listings</Link>
    </div>
    <section class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4">
        <Box class="flex md:col-span-7 items-center" v-if="!hasOffers">
            <div class="w-full text-center font-medium text-gray-500">
                No offers
            </div>
        </Box>

        <div v-else class="md:col-span-7 flex flex-col gap-4">
            <Offer
                v-for="offer in props.listing.offers"
                :key="offer.id" :offer="offer"
                :listing-price="props.listing.price"
                :is-sold="listing.sold_at != null"/>
        </div>

        <div class="md:col-span-5">
            <Box>
                <template #header>Basic Info</template>
                <Price :price="props.listing.price" class="text-2xl font-bold"/>

                <ListingSpace :listing="props.listing" class="text-lg"/>
                <ListingAddress :listing="props.listing" class="text-gray-500"/>
            </Box>
        </div>
    </section>
</template>

<script setup>
import {Link} from "@inertiajs/vue3";
import Box from "@/Components/UI/Box.vue";
import Price from "@/Components/Price.vue";
import ListingSpace from "@/Components/ListingSpace.vue";
import ListingAddress from "@/Components/ListingAddress.vue";
import {computed} from "vue";
import listing from "@/Pages/Listing/Index/Components/Listing.vue";
import Offer from "@/Pages/Realtor/Show/Components/Offer.vue";

const hasOffers = computed(() => props.listing.offers.length);

const props = defineProps({
    listing: Object,
})
</script>
