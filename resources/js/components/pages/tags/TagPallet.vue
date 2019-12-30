<template>
    <div class="container">
        <div class="row">
            <h1 class="col">{{this.tag.name}}</h1>
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
