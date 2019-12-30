<template>
    <div class="col-4 container mb-5">
        <div class="row justify-content-center blink p-0">
            <a class="col-auto  p-0 ar-link d-300-200" v-bind:style="{ 'background-image': 'url(' + this.article.images.image_300_200 + ')',
            'background-repeat':'no-repeat' }"
               :href="'/idea/'+this.article.token">
            </a>
        </div>
        <a :href="'/idea/'+this.article.token" class="row justify-content-start ar-link blink">
            <h1 class="col article-header text-left p-0">{{this.article.header}}</h1>
        </a>
        <a :href="'/idea/'+this.article.token" class="row ar-link justify-content-start blink p-0">
            <h2 class="col article-description text-left p-0">{{this.article.description}}</h2>
        </a>
        <div class="row">
            <user-info :user="this.article.user" :article="this.article " class="p-0"></user-info>
            <div class="col"></div>
        </div>
    </div>
</template>

<script>
    import UserInfo from "../profile/UserInfo";
    export default {
        components:{
            UserInfo
        },
        props: {
            article: {},
        },
        mounted() {
        },
    }
</script>
