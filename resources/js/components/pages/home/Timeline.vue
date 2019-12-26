<template>
    <div class="container">
        <div class="row border-bottom justify-content-end addition-margin">
            <div class="col-auto col-xl-8">
                <div class="container mt-5">
                    <div class="row" v-for="article in midArticles">
                        <div class="col">
                            <mid-article :article="article" :key="article.token"></mid-article>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 d-none d-xl-block">
                <popular></popular>
            </div>
        </div>
        <observer v-on:intersect="intersected"></observer>
    </div>
</template>

<script>
    import Popular from "./Popular";
    import MidArticle from "./MidArticle";
    import Observer from "./Observer";
    export default {
        components:{
            'popular':Popular,
            'mid-article':MidArticle,
            'observer':Observer,
        },
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                midArticles: [],
            }
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
