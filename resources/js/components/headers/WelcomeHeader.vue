<template>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="">
                Idea Talk
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="">Share an idea</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" @click="" id="nav-button" data-toggle="modal" data-target="#loginModal">Sign in</a>
                    </li>
                    <li class="nav-item">
                        <button  data-toggle="modal" data-target="#registerModal" class="button-primary button-primary-header">Get started</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
    export default {
        mounted() {
            $('#nav-button').click(function(event){
                event.preventDefault();
            })
        },
        methods:{
          register(){
            $(location).attr('href',this.$root.register);
          },
        }
    }
</script>
