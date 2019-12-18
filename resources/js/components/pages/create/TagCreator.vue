<template>
    <div class="col tag-creator">
        <div class="container">
            <div class="row mt-2">
                <div class="col">
                    <input type="text" v-model="searching" id="tag-search" placeholder="Add a tag" autocomplete="off">
                    <span class="d-none" id="search-model"></span>
                </div>
            </div>
            <div class="row" id="search-result">
                <div class="col container">
                    <div class="row justify-content-start" v-for="tag in found">
                        <div class="col text-left search-result-folder" v-text="tag.name"></div>
                    </div>
                </div>

            </div>
        </div>

        <div class="tag-list container mt-3">
            <div class="tag d-inline-block pl-2 pr-1">
                    <div class="tag-name d-inline-block">Tag Name hello</div>
                    <button type="button" class="close d-inline-block ml-1 mr-1" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="tag d-inline-block pl-2 pr-1">
                <div class=" tag-name d-inline-block">hello</div>
                <button type="button" class="close d-inline-block ml-1 mr-1" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="tag d-inline-block pl-2 pr-1">
                <div class=" tag-name d-inline-block">bue</div>
                <button type="button" class="close d-inline-block ml-1 mr-1" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="tag d-inline-block pl-2 pr-1">
                <div class=" tag-name d-inline-block">Data science</div>
                <button type="button" class="close d-inline-block ml-1 mr-1" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                searching:"",
                isSearching:false,
                found:[],
            }
        },
        mounted() {
            const search = $('#tag-search');
            const result = $('#search-result');

            result.css({'width':search.scrollWidth+'px'});

            search.on('keyup',()=>{
                if(search.val().length){
                    axios.get('/tag?_token='+this.csrf+'&name='+search.val())
                        .then((response)=>{
                            this.found = Object.values(response.data);
                        });
                    if(!this.isSearching){
                        result.css({'width':search.outerWidth(true)+'px'});
                        result.fadeToggle('d-none');
                        this.isSearching = true;
                    }
                }else{
                    result.fadeOut('d-none');
                    this.isSearching=false;
                }
            });
            $(document).on('click',(event)=>{
                if(!event.target.classList.contains('search-result-folder')&&this.isSearching){
                    result.fadeToggle('d-none');
                    this.isSearching=false;
                }
            })
        },
    }
</script>
