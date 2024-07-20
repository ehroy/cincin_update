<template>
    <Navbar :Categoris="Categoris" />
    <div
        class="container mx-auto p-6 text-center font-primary bg-blue-400 mt-12"
    >
        <img
            src="assets/images/logo.jpeg"
            alt="Logo"
            w-full
            h-full
            class="mx-auto mb-6 w-32 h-32"
        />
        <h1 class="text-3xl font-primary mb-6">Contact Us</h1>
        <div class="flex justify-center space-x-6">
            <Link
                v-for="(social, index) in Social"
                :key="index"
                :href="social.url"
                target="_blank"
                class="text-gray-700 hover:text-gray-900 border p-2"
            >
                <img
                    :src="helpers.imageUrl(social.icons)"
                    alt="social.type"
                    class="w-12 h-12 rounded-full"
                />
                <p>{{ social.type }}</p>
            </Link>
        </div>
    </div>
    <Galery />
    <Footer />
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import Navbar from "../Components/Navbar.vue";
import Galery from "../Components/Galery.vue";
import Footer from "../Components/Footer.vue";
import { inject } from "vue";
const helpers = inject("helper");
defineProps({
    Social: Object,
    Categoris: Object,
});
// export default {
//     name: "ContactPage",
// };
</script>

<style scoped>
img {
    display: inline-block;
}
.bg-contact {
    background-image: url("assets/images/herosectionnew.jpg");
}
</style>
