<template>
    <div class="container sticky-top popular mt-5 ">
        <div class="row">
            <h3 class="col border-bottom p-header">
                Popular on IdeaTalk
            </h3>
        </div>
        <div class="row mt-3">
            <div class="col-2 p-number">
                01
            </div>
            <div class="col-10">
                <pop-article></pop-article>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-2 p-number">
                02
            </div>
            <div class="col-10">
                <pop-article></pop-article>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-2 p-number">
                03
            </div>
            <div class="col-10">
                <pop-article></pop-article>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-2 p-number">
                04
            </div>
            <div class="col-10">
                <pop-article></pop-article>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-2 p-number">
                05
            </div>
            <div class="col-10">
                <pop-article></pop-article>
            </div>
        </div>
    </div>
</template>

<script>
    import PopularArticle from "./PopularArticle";
    export default {
        components:{
            'pop-article':PopularArticle
        },
        mounted() {
        },
    }
</script>
