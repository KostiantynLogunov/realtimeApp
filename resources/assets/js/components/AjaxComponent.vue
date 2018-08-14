<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!--<button v-on:click=""></button>-->
                <!--OR-->
                <button @click="update" class="btn btn-default text mb-1" v-if="!is_refresh">Refresh {{ id }}..</button>
                <span v-if="is_refresh" class="badge badge-primary mb-1">Refreshing...</span>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Url</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="url in urldata">
                            <td>{{ url.title }}</td>
                            <td>{{ url.url }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                urldata: [],
                is_refresh: false,
                id: 0
            }
        },
        mounted() {
            // console.log('Component mounted.');
            this.update();
        },
        methods: {
            update: function() {

                this.is_refresh = true;
                axios.get('/start/get-json').then((response) => {
                    // console.log(response);
                   this.urldata = response.data;
                   this.is_refresh = false;
                   this.id++;
                });

                        // OR
                /*var app = this;
                axois.get('/start/get-json').then( function (response) {
                    console.log(response);
                    app.urldata = response.data;
                    app.is_refresh = false;
                    app.id++;
                });*/
            }
        },
    }
</script>
