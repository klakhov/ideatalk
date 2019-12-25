<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 f-title">Featured</div>
        </div>
        <div class="row justify-content-center mb-5">
            <div class="col-8 f-sub-title">
                Today's best ideas
            </div>
        </div>
        <div class="row justify-content-center" v-for="article in articles">
            <div class="col-8">
                <mid-article :article="article" :key="article.token" :is-featured="true"></mid-article>
            </div>
        </div>
    </div>
</template>

<script>
    import MidArticle from "../home/MidArticle";
    export default {
        components:{
          MidArticle
        },
        props: {
            articles: {},
        },
        data() {
            return {
                img: "/uploads/previews/img150.jpg"
            }
        },
        mounted() {
        },
    }
</script>
