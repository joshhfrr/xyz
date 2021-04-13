<template>
    <div>
        <div class="row pt-4">
            <div class="col-12">
                <div class="card rounded-xl shadow-md">
                    <div class="card-header">
                        <h3 class="card-title" style="font-weight: bold;">Photos</h3>
                    </div>
                    <div class="card-body">
                        
                        <div class="row py-4">
                            <div class="col-12">
                                <input type="text" placeholder="Search..." class="form-control rounded-2xl focus:ring focus:ring-blue-300" v-model="search">
                            </div>
                        </div>

                        <Pagination :data="pages" :limit="5" @pagination-change-page="getPhotos"></Pagination>
                        
                        <div class="table-responsive pt-3">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Album Title</th>
                                        <th>Photo Title</th>
                                        <th>Picture</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="photo in photos" :key="photo.id">
                                        <td class="w-1/12">{{ photo.id }}</td>
                                        <td class="w-2/12">{{ photo.album_title }}</td>
                                        <td class="w-2/12">{{ photo.title }}</td>
                                        <td class="w-2/12"><img :src="photo.thumbnail_url" width="150" height="150" alt="thumbnail_url"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <Pagination :data="pages" :limit="5"  @pagination-change-page="getPhotos"></Pagination>

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
            photos: [],
            pages: {},
            search: '',
        }
    },

    mounted() {
        this.getPhotos();
    },
    
    watch: {
        search: function()  {
            this.getPhotos();
        }
    },

    methods: {
        getPhotos: async function(page) {
            if (typeof page === 'undefined') {
                page = 1;
            }
            axios.get('/api/photos', { params: { page: page, search: this.search }}) 
            .then((res) => {
                this.photos = res.data.data;
                this.pages = res.data;
                // console.log(this.pages);
                // console.log(this.photos);
            })
            .catch((error) => {
                console.log(error);
            });
        },
    }
}
</script>