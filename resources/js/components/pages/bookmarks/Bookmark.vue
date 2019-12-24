<template>
    <div class="container mb-5 border-bottom pb-2">
            <div class="row">
                <div class="col container bm-container">
                    <div class="row">
                        <div class="col ar-middle-tag">
                            <span v-for="tag in this.article.tagList" v-text="tag" class="mr-2"></span>
                        </div>
                    </div>
                    <a class="row ar-link" :href="'/idea/'+this.article.token">
                        <h2 class="col ar-middle-header">{{this.article.header}}</h2>
                    </a>
                    <a class="row ar-link mt-2" :href="'/idea/'+this.article.token">
                        <div class="col ar-middle-description">{{this.article.description}}</div>
                    </a>
                    <div class="row mt-2">
                        <div class="col container">
                            <div class="row">
                                <a class="col-auto ar-middle-author" :href="'/profile/'+this.article.user.token">{{this.article.user.name}}</a>
                                <div class="col-auto pl-sm-0 article-date text-left">{{this.article.date}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="col-3  ar-link " v-bind:style="{ 'background-image': 'url(' + this.article.images.image_150 + ')', 'background-repeat':'no-repeat' }"
                   :href="'/idea/'+this.article.token">
                </a>
            </div>
            <div class="row mt-1">
                <div class="col remove pointer" @click="unbookmark">
                    Remove
                </div>
            </div>
        </div>
</template>

<script>
    export default {
        props: {
            article: {}
        },
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        },
        mounted() {
            console.log(this.article);
        },
        methods: {
            unbookmark() {
                axios.post('/bookmark',{
                    _token:this.csrf,
                    article_id:this.article.id
                }).then(()=>{
                    this.$emit('bookmarkRemoved',this.article.id);
                })
            }
        },
    }
</script>
