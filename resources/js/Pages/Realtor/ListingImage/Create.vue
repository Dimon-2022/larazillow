<template>
    <form :action="route('realtor.listing.image.store', {listing: listing.id})" method="post" enctype="multipart/form-data">
        <input type="file" multiple name="images[]"/>
        <button type="submit">Send</button>
    </form>
</template>

<script setup>
    defineProps({
        listing: Object
    })
</script>
