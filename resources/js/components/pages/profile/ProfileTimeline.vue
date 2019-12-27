<template>
<div class="container profile-articles">
    <article-card v-for="article in articles" v-bind:article="article"
                  v-bind:user="user" v-bind:key="article.id"
                  v-bind:is-bookmarked="article.bookmarked"
                  v-bind:is-pointed="article.pointed"
                  v-bind:points-count="article.points_count"></article-card>
    <observer></observer>
</div>
</template>

<script>
    import ArticleCard from "./ArticleCard";
    import Observer from "../home/Observer";
    export default {
        components:{
            ArticleCard,
            Observer
        },
        props: {
            user: {
                type: Object,
                default: null
            },
        },
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                articles:[],
            }
        },
        mounted() {
            console.log(this.user);
            axios.get('/profile/publications/?_token='+this.csrf+'&amount='+this.articles.length+'&token='+this.user.profile_token)
                .then((response)=>{
                    this.articles = response.data;
                    console.log(this.articles)
                })
        },

    }
</script>
