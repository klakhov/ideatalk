<template>
    <div class="container tag-container">
        <div class="row justify-content-start">
            <h1 class="col-auto tag-title mb-5">{{this.tag.name}}</h1>
        </div>
        <div class="row">
            <div class="col">
                <tag-timeline :tag="this.tag"></tag-timeline>
            </div>
        </div>
    </div>
</template>

<script>
    import TagTimeline from "./TagTimeline";
    export default {
        props: {
            tag: {},
        },
        components:{
            TagTimeline
        },
        mounted() {
        },
    }
</script>
