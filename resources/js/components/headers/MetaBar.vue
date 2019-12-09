<template>
    <div class="sticky-top container">
        <div id="meta-menu" class="d-flex mt-3">
            <div id="previous" class="arrow text-gray unclickable">
                <i class="material-icons md-18 mt-05 noselect">arrow_back_ios</i>
            </div>
            <div id="meta-list" >
                <a href="" class="meta-item">Lorem.</a><a href="" class="meta-item">Tenetur?</a><a href=""
                                                                                                   class="meta-item">Sed.</a><a
                href="" class="meta-item">Facilis.</a><a href="" class="meta-item">Quae.</a><a href=""
                                                                                               class="meta-item">Repellat.</a><a
                href="" class="meta-item">Doloremque?</a><a href="" class="meta-item">Illo.</a><a href=""
                                                                                                  class="meta-item">In.</a><a
                href="" class="meta-item">Quam!</a><a href="" class="meta-item">Placeat.</a><a href=""
                                                                                               class="meta-item">Nobis?</a><a
                href="" class="meta-item">Officia.</a><a href="" class="meta-item">Dolorum.</a><a href=""
                                                                                                  class="meta-item">Hic.</a><a
                href="" class="meta-item">Necessitatibus.</a><a href="" class="meta-item">Nisi?</a><a href=""
                                                                                                      class="meta-item">Exercitationem?</a><a
                href="" class="meta-item">Libero!</a><a href="" class="meta-item">Laboriosam.</a>
                <a href="" class="meta-item">Lorem.</a><a href="" class="meta-item">Tenetur?</a><a href=""
                                                                                                   class="meta-item">Sed.</a><a
                href="" class="meta-item">Facilis.</a><a href="" class="meta-item">Quae.</a><a href=""
                                                                                               class="meta-item">Repellat.</a><a
                href="" class="meta-item">Doloremque?</a><a href="" class="meta-item">Illo.</a><a href=""
                                                                                                  class="meta-item">In.</a><a
                href="" class="meta-item">Quam!</a><a href="" class="meta-item">Placeat.</a><a href=""
                                                                                               class="meta-item">Nobis?</a><a
                href="" class="meta-item">Officia.</a><a href="" class="meta-item">Dolorum.</a><a href=""
                                                                                                  class="meta-item">Hic.</a><a
                href="" class="meta-item">Necessitatibus.</a><a href="" class="meta-item">Nisi?</a><a href=""
                                                                                                      class="meta-item">Exercitationem?</a><a
                href="" class="meta-item">Libero!</a><a href="" class="meta-item">Laboriosam.</a>
            </div>
            <div id="next" class="arrow">
                <i class="material-icons md-18 ml-1 mt-05 noselect">arrow_forward_ios</i>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
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
        },
    }
</script>
