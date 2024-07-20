<template>
    <div class="font-primary">
        <Navbar :Categoris="Categoris" />
        <HeroSection />
        <Atribute />
        <ProductRecomended :ProductsPopuller="ProductsPopuller" />
        <Promo />
        <Galery />
        <ProductPage :ProductsAll="ProductsAll" />
        <Testimonials />
        <Footer />
    </div>
</template>

<script setup>
import Navbar from "../Components/Navbar.vue";
import HeroSection from "../Components/HeroSection.vue";
import Galery from "../Components/Galery.vue";
import ProductPage from "../Components/ProductPage.vue";
import ProductRecomended from "../Components/ProductRecomended.vue";
import Testimonials from "../Components/Testimonials.vue";
import Footer from "../Components/Footer.vue";
import Promo from "../Components/Promo.vue";
import Atribute from "../Components/Atribute.vue";

defineProps({
    ProductsAll: Object,
    ProductsPopuller: Object,
    Categoris: Object,
});
</script>
