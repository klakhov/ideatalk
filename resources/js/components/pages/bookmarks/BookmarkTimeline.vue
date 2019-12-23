<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                Dont forget why you creating for
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8">
                <bookmark v-for="bookmark in bookmarks"
                          v-bind:key="bookmark.id" v-bind:article="bookmark.article"
                            v-on:bookmarkRemoved="remove"
                ></bookmark>
            </div>
        </div>
        <observer v-on:intersect="intersected"></observer>
    </div>
</template>

<script>
    import Bookmark from "./Bookmark";
    import Observer from "../home/Observer";
    export default {
        components:{
            Bookmark,
            Observer
        },
        data() {
            return {
                bookmarks: [],
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        },
        mounted() {
            axios.get('/bookmark?_token='+this.csrf+'&amount='+this.bookmarks.length)
                .then((response)=>{
                    const bookmarks = response.data;
                    this.bookmarks = [...this.bookmarks,...bookmarks];
                });

        },
        methods: {
            intersected() {
                if(this.bookmarks.length !== 0){
                    axios.get('/bookmark?_token='+this.csrf+'&amount='+this.bookmarks.length)
                        .then((response)=>{
                            const bookmarks = response.data;
                            this.bookmarks = [...this.bookmarks,...bookmarks];
                        });
                }
            },
            remove(article_id){
                for (let i=0; i<this.bookmarks.length; i++){
                    if(this.bookmarks[i].article.id === article_id){
                        this.bookmarks.splice(i,1);
                        break;
                    }
                }
            }
        },
    }
</script>
