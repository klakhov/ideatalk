<template>
    <div class="container">
        <div class="row border-bottom ml-auto mr-auto justify-content-end" style="width: 85%">
            <div class="col-8">
                <div class="container mt-5">
                    <div class="row" v-for="article in midArticles">
                        <div class="col">
                            <mid-article :article="article" :key="article.token"></mid-article>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
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
