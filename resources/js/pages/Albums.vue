<template>
    <div>
        <div class="row pt-4">
            <div class="col-12">
                <div class="card rounded-xl shadow-md">
                    <div class="card-header">
                        <h3 class="card-title" style="font-weight: bold;">Albums</h3>
                    </div>
                    <div class="card-body">
                        
                        <div class="row py-4">
                            <div class="col-12">
                                <input type="text" placeholder="Search..." class="form-control rounded-2xl focus:ring focus:ring-blue-300" v-model="search">
                            </div>
                        </div>

                        <Pagination :data="pages" :limit="5" @pagination-change-page="getAlbums"></Pagination>
                        
                        <div class="table-responsive pt-3">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name of User</th>
                                        <th>Album Title</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="album in albums" :key="album.id">
                                        <td class="w-1/12">{{ album.id }}</td>
                                        <td class="w-2/12">{{ album.user_name }}</td>
                                        <td class="w-2/12">{{ album.title }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <Pagination :data="pages" :limit="5" @pagination-change-page="getAlbums"></Pagination>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Pagination from "laravel-vue-pagination";

export default {
    components: {
        Pagination
    },
    data() {
        return {
            albums: [],
            pages: {},
            search: '',
        }
    },

    mounted() {
        this.getAlbums();
    },
    
    watch: {
        search: function()  {
            this.getAlbums();
        }
    },

    methods: {
        getAlbums: async function(page) {
            if (typeof page === 'undefined') {
                page = 1;
            }
            axios.get('/api/albums', { params: { page: page, search: this.search }}) 
            .then((res) => {
                this.albums = res.data.data;
                this.pages = res.data;
                // console.log(this.pages);
                // console.log(this.albums);
            })
            .catch((error) => {
                console.log(error);
            });
        },
    }
}
</script>