<template>
    <div class="container border-bottom">
        <div class="row">
            <div class="col-4">
                <big-article></big-article>
            </div>
            <div class="col-4">
                <small-article></small-article>
                <small-article></small-article>
                <small-article></small-article>
            </div>
            <div class="col-4">
                <big-article></big-article>
            </div>
        </div>
        <div class="row">
            <div class="col text-right">
                <a href="#" class="featured-link mt-2 mb-3 d-block">SEE ALL FEATURED</a>
            </div>
        </div>
    </div>
</template>

<script>
    import bigArticle from './BigArticle.vue'
    import smallArticle from './SmallArticle'
    export default {
        components:{
            'big-article':  bigArticle,
            'small-article': smallArticle
        },
        mounted() {
        },
    }
</script>
