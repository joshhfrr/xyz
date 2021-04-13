<template>
    <div>
        <div class="row pt-4">
            <div class="col-12">
                <div class="card rounded-xl shadow-md">
                    <div class="card-header">
                        <h3 class="card-title" style="font-weight: bold;">Posts</h3>
                    </div>
                    <div class="card-body">
                        
                        <div class="row py-4">
                            <div class="col-12">
                                <input type="text" placeholder="Search..." class="form-control rounded-2xl focus:ring focus:ring-blue-300" v-model="search">
                            </div>
                        </div>

                        <Pagination :data="pages" @pagination-change-page="getPosts"></Pagination>

                        <div class="table-responsive pt-3">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name of User</th>
                                        <th>Title</th>
                                        <th>Body</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="post in posts" :key="post.id">
                                        <td class="w-1/12">{{ post.id }}</td>
                                        <td class="w-3/12">{{ post.user_name }}</td>
                                        <td class="w-3/12">{{ post.title }}</td>
                                        <td class="w-5/12">{{ post.body }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <Pagination :data="pages" @pagination-change-page="getPosts"></Pagination>

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
            posts: [],
            pages: {},
            search: '',
        }
    },

    mounted() {
        this.getPosts();
    },
    
    watch: {
        search: function()  {
            this.getPosts();
        }
    },

    methods: {
        getPosts: async function(page) {
            if (typeof page === 'undefined') {
                page = 1;
            }
            axios.get('/api/posts', { params: { page: page, search: this.search }}) 
            .then((res) => {
                this.posts = res.data.data;
                this.pages = res.data;
                // console.log(this.pages);
                // console.log(this.posts);
            })
            .catch((error) => {
                console.log(error);
            });
        },
    }
}
</script>