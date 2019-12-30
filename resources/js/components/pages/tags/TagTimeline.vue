<template>
        <div class="container">
            <div class="row">
                <tag-article v-for="article in articles" :article="article" :key="article.id"></tag-article>
            </div>
            <div class="row">
                <div class="col">
                    <observer v-on:intersect="intersected"></observer>
                </div>
            </div>
        </div>
</template>

<script>
    import Observer from "../home/Observer";
    import TagArticle from "./TagArticle";
    export default {
        components:{
            Observer,
            TagArticle
        },
        props: {
            tag: {},
        },
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                articles:[],
            }
        },
        mounted() {
            axios.get('/tag/load?_token='+this.csrf+'&name='+this.tag.name+'&amount='+this.articles.length)
                .then((response)=>{
                    this.articles = [...this.articles,...response.data];
                })
        },
        methods: {
            intersected() {
                axios.get('/tag/load?_token='+this.csrf+'&name='+this.tag.name+'&amount='+this.articles.length)
                    .then((response)=>{
                        this.articles = [...this.articles,...response.data];
                    }).catch((error)=>{})
            }
        },
    }
</script>
