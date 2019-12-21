<template>
    <div class="container ar-padding">
        <div class="row justify-content-sm-start">
            <h1 class="col-auto ar-plain-header">{{this.article.header}}</h1>
        </div>
        <div class="row justify-content-sm-start">
            <h2 class="col-auto ar-plain-description pl-4 pr-4">{{this.article.description}}</h2>
        </div>
        <div class="row mb-5 mt-4">
            <div class="col container">
                <div class="row">
                    <div class="col-auto">
                        <img :src="this.article.user.avatar" alt="" width="50" height="50" class="br-50">
                    </div>
                    <div class="col container">
                        <div class="row">
                           <div class="col-auto">
                               <span class="ar-plain-username">{{this.article.user.name}}</span>
                           </div>
                            <div class="col-auto p-0">
                                <div class="plain-button ar-plain-button text-center mt-05">Follow</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col ar-plain-date">{{this.article.date}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col">
                <img :src="this.article.images.image_def" alt="" class="img-fluid">
            </div>
        </div>
        <div class="row">
            <div class="col ar-plain-body">
                {{this.article.body}}
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            article: {
                type: Object,
                default: null
            },
        },
        mounted() {
            console.log(this.article);
        },
    }
</script>
