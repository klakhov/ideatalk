<template>
    <div class="container">
        <a class="row ar-link" :href="'/idea/'+this.article.token">
            <div class="col pop-header">
               {{this.article.header}}
            </div>
        </a>
        <div class="row">
            <a class="col-auto pop-author pr-1 ar-link" :href="'/profile/'+this.article.user.profile_token">
                {{this.article.user.name}}
            </a>
            <span class="col-auto p-0 pr-1 pop-author">in</span>
            <a :href="'/tag/'+article.render_tag.name" class="col-auto p-0 pop-author ar-link">{{this.article.render_tag.name}}</a>
        </div>
        <div class="row">
            <div class="col article-date">
                {{this.article.date}}
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            article: {
                type: Object,
                default: 0
            },
        },
        mounted() {
        },
    }
</script>
