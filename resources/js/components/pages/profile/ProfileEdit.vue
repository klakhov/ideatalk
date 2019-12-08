<template>
    <div class="container profile-container">
        <form action="/profile/edit" method="post" enctype="multipart/form-data">
            <div class="row mt-2">
                <div class="col-8 container">
                    <div class="row align-middle">
                        <div class="col-auto user-name"><strong>{{this.user.name}}</strong></div>
                    </div>
                    <div class="row">
                        <div class="col text-gray">There will be bio</div>
                    </div>
                </div>
                <div class="col-4 text-right">
                    <input type="file" id="file" name="avatar">
                    <label for="file" class="file-label" v-bind:style="{ backgroundImage: 'url(' + image + ')' }">
                        <i class="material-icons md-light md-48" v-bind:class="{'md-inactive':inactive}" id="file-icon">
                            photo_camera
                        </i>
                    </label>
                    <label for="file" class="file-label file-label-dark" id="file-label"
                           title="Upload an avatar image"></label>
                </div>
            </div>
            <div class="row">
                <div class="col-auto pr-0">
                    <button class="button-primary button-profile" type="submit">Save</button>
                </div>
                <div class="col-auto">
                    <a href="/profile" class="border-link link-profile">Cancel</a>
                </div>
            </div>
            <input type="hidden" name="_token" :value="csrf">
        </form>
    </div>
</template>

<script>
    export default {
        props: [
            'user'
        ],
        data() {
            return {
                image: this.user.avatar,
                inactive: true,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        },
        mounted() {
            $('#file-label').hover(() => {
                this.inactive = false;
            });
            $('#file-label').mouseleave(() => {
                this.inactive = true;
            });

            $('#file-icon').hover(() => {
                this.inactive = false;
            });
            $('#file-icon').mouseleave(() => {
                this.inactive = true;
            })
        },
    }
</script>
