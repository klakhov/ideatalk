<template>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <big-article v-for="article in bigArticle1" :article="article" :key="article.id"/>
            </div>
            <div class="col-4">
                <small-article v-for="article in smallArticles" :article="article" :key="article.id"/>
            </div>
            <div class="col-4">
                <big-article v-for="article in bigArticle2" :article="article" :key="article.id"/>
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
    </div>
</template>

<script>
    import bigArticle from './BigArticle.vue'
    import smallArticle from './SmallArticle'
    export default {
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                bigArticle1:[],
                bigArticle2:[],
                smallArticles:[],
            }
        },
        components:{
            'big-article':  bigArticle,
            'small-article': smallArticle,
        },
        mounted() {
            axios.get('/featured?_token='+this.csrf)
                .then((response)=>{
                    let articles = Object.values(response.data);
                    let big = Object.values(articles[0]);
                    this.bigArticle1.push(big[0]);
                    this.bigArticle2.push(big[1]);
                    const small = Object.values(articles[1]);
                    for(let val of small){
                        this.smallArticles.push(val);
                    }
                });
        }
    }

</script>
