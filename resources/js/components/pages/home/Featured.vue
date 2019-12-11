<template>
    <div class="container">
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
        <div class="row border-bottom ml-auto mr-auto justify-content-end" style="width: 85%">
            <div class="col-auto text-right mt-2 mb-3 pr-0">
                <a href="#" class="featured-link">SEE ALL FEATURED </a>
            </div>
            <div class="col-auto text-right pl-0 orange-text">
                <i class="material-icons md-14 arrow-m">arrow_forward_ios</i>
            </div>
        </div>
        <div class="row border-bottom ml-auto mr-auto justify-content-end" style="width: 85%">
            <div class="col-8">
                <mid-article></mid-article>
                <mid-article></mid-article>
                <mid-article></mid-article>
                <mid-article></mid-article>
                <mid-article></mid-article>
                <mid-article></mid-article>
                <mid-article></mid-article>
                <mid-article></mid-article>
                <mid-article></mid-article>
            </div>
            <div class="col-4">
                <popular></popular>
            </div>
        </div>
    </div>
</template>

<script>
    import bigArticle from './BigArticle.vue'
    import smallArticle from './SmallArticle'
    import midArticle from './MidArticle'
    import Popular from './Popular'
    export default {
        components:{
            'big-article':  bigArticle,
            'small-article': smallArticle,
            'mid-article':midArticle,
            'popular':Popular
        },
        mounted() {
        },
    }
</script>
