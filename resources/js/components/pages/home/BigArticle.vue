<template>
    <div class="container">
        <div class="row justify-content-center">
            <img :src="this.article.images.image_300_200" alt="">
        </div>
        <div class="row justify-content-start">
            <h1 class="col article-header text-left ml-2">{{this.article.header}}</h1>
        </div>
        <div class="row justify-content-start">
            <h2 class="col article-description text-left ml-2">{{this.article.description}}</h2>
        </div>
        <div class="row justify-content-start mt-1">
            <div class="col article-author text-left ml-2">{{this.article.user.name}}</div>
        </div>
        <div class="row justify-content-start">
            <div class="col article-date text-left ml-2">{{this.article.date}}</div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            article:{}
        },
        data() {
            return {
            }
        },
        mounted() {
            console.log(this.article);
        },
    }
</script>
