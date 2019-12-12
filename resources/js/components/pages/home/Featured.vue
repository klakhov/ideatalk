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
                <mid-article :articles="midArticles"></mid-article>
            </div>
            <div class="col-4">
                <popular></popular>
            </div>
        </div>
        <observer v-on:intersect="intersected"></observer>
    </div>
</template>

<script>
    import bigArticle from './BigArticle.vue'
    import smallArticle from './SmallArticle'
    import midArticle from './MidArticle'
    import Popular from './Popular'
    import Observer from "./Observer";
    export default {
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                midArticles: [],
            }
        },
        components:{
            'big-article':  bigArticle,
            'small-article': smallArticle,
            'mid-article':midArticle,
            'popular':Popular,
            'observer':Observer
        },
        mounted() {
            axios.get('/article?_token='+this.csrf+'&amount='+this.midArticles.length)
                .then((response)=>{
                    const articles = response.data;
                    this.midArticles = [...this.midArticles, ...articles];
                })
        },
        methods: {
            intersected() {
                axios.get('/article?_token='+this.csrf+'&amount='+this.midArticles.length)
                    .then((response)=>{
                        const articles = response.data;
                        this.midArticles = [...this.midArticles, ...articles];
                    })
            }
        },
    }
</script>
