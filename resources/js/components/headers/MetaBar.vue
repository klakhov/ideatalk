<template>
    <div class="sticky-top container-fluid bg-white" style="z-index: 100" id="meta-bar">
        <div id="meta-menu" class="d-flex mt-3">
            <div id="previous" class="arrow text-gray unclickable">
                <i class="material-icons md-18 mt-05 noselect">arrow_back_ios</i>
            </div>
            <div id="meta-list" >
                <a :href="'/tag/'+tag.name" class="meta-item" v-for="tag in tags">{{tag.name}}</a>
            </div>
            <div id="next" class="arrow text-gray">
                <i class="material-icons md-18 ml-1 mt-05 noselect">arrow_forward_ios</i>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                tags:[],
            }
        },
        mounted() {
            axios.get('/tag?_token'+this.csrf)
                .then((response)=>{
                    this.tags = response.data;
                })
            let list = $('#meta-list');
            let toogler = list.get(0);
            let previous = $('#previous');
            let next = $('#next');
            previous.click(function(){
               list.animate({scrollLeft:"-=100px"});
               next.removeClass("unclickable");
               if(list.scrollLeft() === 0){
                  previous.addClass("unclickable");
               }
            });
            next.click(function(){
                list.animate({scrollLeft:"+=100px"});
                previous.removeClass("unclickable");
                if((list.scrollLeft() + list.width())>toogler.scrollWidth){
                    next.addClass("unclickable");
                }
            });
            $(window).scroll(function() {
                if ($(this).scrollTop() > 5){
                    $('#meta-bar').addClass("bb-2");
                }
                else{
                    $('#meta-bar').removeClass("bb-2");
                }
            });
        },
    }
</script>
