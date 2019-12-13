<template>
    <div class="container mb-5 mt-5"  >
        <div class="row mb-5 mt-5" v-for="article in this.articles">
            <div class="col container" style="max-height: 130px">
                <div class="row">
                    <div class="col ar-middle-tag">Data Science</div>
                </div>
                <div class="row">
                    <h2 class="col ar-middle-header">{{article.header}}</h2>
                </div>
                <div class="row">
                    <div class="col ar-middle-description">{{article.description}}</div>
                </div>
                <div class="row mt-3">
                    <a class="col ar-middle-author" :href="'/profile/'+article.userToken">{{article.userName}}</a>
                </div>
                <div class="row justify-content-start">
                    <div class="col article-date text-left">{{article.date}}</div>
                </div>
            </div>
            <div class="col-3">
                <img src="https://picsum.photos/150" alt="">
        </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'articles',
        ],
        mounted() {
        },
    }
</script>
