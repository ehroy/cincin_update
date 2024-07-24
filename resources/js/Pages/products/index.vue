<template>
    <Navbar :Categoris="Categori" />
    <Product :ProductsAll="ProductsAll" class="min-h-screen" />
    <Footer />
</template>

<script setup>
import { ref, computed } from "vue";
import Navbar from "../../Components/Navbar.vue";
import Product from "../../Components/ProductPage.vue";
import Footer from "../../Components/Footer.vue";
defineProps({
    ProductsAll: Object,
    Categori: Object,
});
</script>

<style scoped>
/* Add any additional custom styles here */
</style>
