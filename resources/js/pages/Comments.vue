<template>
    <div>
        <div class="row pt-4">
            <div class="col-12">
                <div class="card rounded-xl shadow-md">
                    <div class="card-header">
                        <h3 class="card-title" style="font-weight: bold;">Comments</h3>
                    </div>
                    <div class="card-body">
                        
                        <div class="row py-4">
                            <div class="col-12">
                                <input type="text" placeholder="Search..." class="form-control rounded-2xl focus:ring focus:ring-blue-300" v-model="search">
                            </div>
                        </div>

                        <Pagination :data="pages" :limit="5" @pagination-change-page="getComments"></Pagination>
                        
                        <div class="table-responsive pt-3">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Post title</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Body</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="comment in comments" :key="comment.id">
                                        <td class="w-1/12">{{ comment.id }}</td>
                                        <td class="w-2/12">{{ comment.post_title }}</td>
                                        <td class="w-2/12">{{ comment.name }}</td>
                                        <td class="w-2/12">{{ comment.email }}</td>
                                        <td class="w-3/12">{{ comment.body }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <Pagination :data="pages" :limit="5" @pagination-change-page="getComments"></Pagination>

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
            comments: [],
            pages: {},
            search: '',
        }
    },

    mounted() {
        this.getComments();
    },
    
    watch: {
        search: function()  {
            this.getComments();
        }
    },

    methods: {
        getComments: async function(page) {
            if (typeof page === 'undefined') {
                page = 1;
            }
            axios.get('/api/comments', { params: { page: page, search: this.search }}) 
            .then((res) => {
                this.comments = res.data.data;
                this.pages = res.data;
                // console.log(this.pages);
                // console.log(this.comments);
            })
            .catch((error) => {
                console.log(error);
            });
        },
    }
}
</script>