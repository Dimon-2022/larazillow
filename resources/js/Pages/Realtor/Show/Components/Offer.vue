<template>
    <Box>
        <template #header>Offer #{{ props.offer.id }} <span v-if="props.offer.accepted_at" class="dark:bg-green-900 dark:text-green-200 bg-green-200 text-green-900 p-1 rounded-md uppercase ml-1">accepted</span></template>

        <section class="flex items-center justify-between">
            <div>
                <Price :price="props.offer.amount" class="text-xl"/>
                <div class="text-gray-500">
                    Difference: <Price :price="difference" class="text-sm"/>
                </div>

                <div class="text-gray-500 text-sm">
                    {{props.offer.bidder.name}}
                </div>

                <div class="text-gray-500 text-sm">
                    Made on {{madeOn}}
                </div>
            </div>
            <div>
                <Link v-if="!isSold" method="put" class="btn-outline text-xs font-medium" as="button" :href="route('realtor.offer.accept', {offer: offer.id})">Accept</Link>
            </div>
        </section>
    </Box>
</template>

<script setup>
    import Box from "@/Components/UI/Box.vue";
    import {Link} from "@inertiajs/vue3";
    import Price from "@/Components/Price.vue";
    import {computed} from "vue";

    const props = defineProps({
        offer: Object,
        listingPrice: Number,
        isSold: Boolean,
    })

    const difference = computed(() => props.offer.amount - props.listingPrice)

    const madeOn = computed(()=> new Date(props.offer.created_at).toDateString())
</script>
