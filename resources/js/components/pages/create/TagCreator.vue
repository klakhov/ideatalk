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
                            <div class="col text-left search-result-folder" v-text="tag.name" @click="addTag(tag)"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tag-list container mt-3">
                <div class="tag d-inline-block pl-2 pr-1" v-for="tag in tags">
                        <div class="tag-name d-inline-block">{{tag.name}}</div>
                        <button type="button" class="close d-inline-block ml-1 mr-1" aria-label="Close" @click="removeTag(tag)">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
            </div>
        </div>
</template>

<script>
    import CreateModal from "../../modals/CreateModal";
    export default {
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                searching:"",
                isSearching:false,
                found:[],
                tags:[],
            }
        },
        mounted() {
            const search = $('#tag-search');
            const result = $('#search-result');

            result.css({'width':search.scrollWidth+'px'});

            search.on('keyup',()=>{
                if(search.val().length){
                    axios.get('/tag/search?_token='+this.csrf+'&name='+search.val())
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
        methods: {
            addTag(tag) {
                let ids = this.tags.map((element)=>{return element.id;});
                if(!ids.includes(tag.id)){
                    this.tags.push(tag);
                    this.tagListChange();
                }
                $('#search-result').fadeOut('d-none');
                this.isSearching=false;
                this.searching = "";
            },
            removeTag(tag){
                let ids = this.tags.map((tag)=>{return tag.id;});
                let id = ids.indexOf(tag.id);
                this.tags.splice(id,1);
                this.tagListChange();
            },
            tagListChange(){
                this.$emit('tagChange',this.tags);
            }
        },
    }
</script>
