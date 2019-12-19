<template>
    <div class="container">
        <featured></featured>
        <timeline></timeline>
    </div>
</template>

<script>
    import Featured from './home/Featured.vue';
    import Timeline from "./home/Timeline";
    export default {
        components:{
            featured:Featured,
            timeline:Timeline
        },
        mounted() {
        },
    }
</script>
