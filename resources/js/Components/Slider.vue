<template>
    <!-- Slider Container -->

    <div
        class="mx-auto h-[30vh] lg:h-[70vh] flex justify-center items-center mt-20 m-8"
    >
        <button @click="prevSlide" class="left-0 z-10">
            <svg
                class="h-6 w-6 text-gray-800"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M15 19l-7-7 7-7"
                />
            </svg>
        </button>
        <div class="w-full h-[30vh] lg:h-[70vh]">
            <div class="w-full flex-shrink-0 h-[30vh] lg:h-[70vh]">
                <img
                    :src="slides[currentSlide].image"
                    :alt="slides[currentSlide].title"
                    class="w-full rounded-xl object-cover h-[30vh] lg:h-[70vh] transition-transform duration-500"
                />
                <!-- <p
                        class="text-center mt-2 bg-white bg-opacity-50 absolute bottom-0 w-full"
                    >
                        {{ slides[currentSlide].title }}
                    </p> -->
            </div>
        </div>
        <button @click="nextSlide" class="right-0 z-10">
            <svg
                class="h-6 w-6 text-gray-800"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9 5l7 7-7 7"
                />
            </svg>
        </button>
    </div>
</template>

<script setup>
import { ref } from "vue";

const slides = ref([
    { title: "Slide 1", image: "assets/images/herosectionnew.jpg" },
    { title: "Slide 2", image: "assets/images/herosection.jpg" },
    { title: "Slide 3", image: "assets/images/kursi satu set meja.jpg" },
]);

const currentSlide = ref(0);

const nextSlide = () => {
    currentSlide.value = (currentSlide.value + 1) % slides.value.length;
};

const prevSlide = () => {
    currentSlide.value =
        (currentSlide.value - 1 + slides.value.length) % slides.value.length;
};
</script>

<style scoped>
body {
    margin: 0;
    overflow: hidden;
}
</style>
