<template>
    <div>
        <div class="row">
            <ul v-if="errors && errors.length" class="list-unstyled">
                <li v-for="error in errors">
                    <div class="alert alert-danger">
                        <strong>Danger! </strong>{{error.message}}
                    </div>
                </li>
            </ul>
        </div>

        <div class="row">
            <form ref="uploadForm">
                <div class="form-group input-group">
                    <input type="text" class="form-control" v-bind:value="this.fileName">
                    <span class="input-group-btn">
                        <label class="btn btn-default">
                            <input name="upload" type="file" v-on:change="onChange($event)" style="display: none">
                            Browse
                        </label>
                    </span>
                </div>
                <button class="btn btn-default" v-on:click="upload()" type="button">Next</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                fileName: '',
                errors: []
            }
        },

        methods: {
            onChange: function (event) {
                this.fileName = event.target.files[0].name;
            },

            // axios has been set up with the csrf token
            upload: function() {
                axios.post('api/upload', this.$refs.uploadForm, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then(response => {
                    // todo handle response
                }).catch(e => {
                    this.errors.push(e)
                })
            }
        }
    }

</script>
