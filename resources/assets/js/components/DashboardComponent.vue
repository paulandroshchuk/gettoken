<template>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    Projects
                    <!--<a href="#" class="badge badge-success">New project</a>-->
                </div>
                <ul class="list-group list-group-flush token-navigation-menu">
                    <a class="list-group-item" href="#" v-for="project in projects">{{ project.name }}</a>
                    <a class="list-group-item" href="javascript:void(0)"
                       v-if="projects.length === 0" v-on:click="tab='create-project'">
                        <i class="fas fa-plus"></i> New project
                    </a>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <create-project v-if="tab === 'create-project'"></create-project>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                tab: 'create-project',
                projects: [],
            };
        },
        mounted() {

        }
    }
</script>
