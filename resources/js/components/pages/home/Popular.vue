<template>
    <div class="container sticky-top popular mt-5 ">
        <div class="row">
            <h3 class="col border-bottom p-header">
                Popular on IdeaTalk
            </h3>
        </div>
        <div class="row mt-3" v-for="article in popularArticles">
            <div class="col-2 p-number">
                {{article.number}}
            </div>
            <div class="col-10">
                <pop-article v-bind:article="article" :key="article.id"/>
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
        data() {
            return {
                popularArticles: [],
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        },
        mounted() {
            axios.get('/popular?_token='+this.csrf)
            .then((response)=>{
                let counter = 1;
                let temp = Object.values(response.data);
                for(let article of temp){
                    article.number = '0'+(counter++).toString();
                }
                this.popularArticles = temp;
            });
        },
    }
</script>
