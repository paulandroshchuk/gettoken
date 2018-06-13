<template>
    <div class="card card-default">
        <div class="card-header">Create Project</div>

        <div class="card-body">
            <form v-on:submit.prevent="createProject()">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name">
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                organizations: []
            }
        },
        methods: {
            createProject: function () {
                alert('q')
            }
        },
        mounted() {
            let self = this;

            axios.get('/api/v1/organizations')
                .then(function (response) {
                    self.organizations = response.data.data
                });
        }
    }
</script>
